<?php namespace Domain\Api;

use Domain\Api\Subscribers\OrderSubscriber;
use Domain\Api\Subscribers\UserSubscriber;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

/**
 * Class DomainApiServiceProvider
 * @package Domain\Api
 */
class DomainApiServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('domain/api');

        $this->requires();

        $this->setConnection();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerModels();
        $this->registerRepositories();
        $this->registerSubscribers();
        $this->registerValidators();
    }

    /**
     * Registers repositories
     */
    protected function registerRepositories()
    {
        $this->app->bindShared(
          'Domain\\Api\\Repositories\\RepositoryInterface',
          function ($app) {
              return $app->make('Domain\\Api\\Repositories\\Repository');
          }
        );

    }

    /**
     * Registers subscribers
     */
    protected function registerSubscribers()
    {
        $this->app->events->subscribe($this->app->make(OrderSubscriber::class));
    }

    /**
     * Registers models
     */
    protected function registerModels()
    {
        $this->app->bind('Domain\\Api\\Models\\AbstractModel', 'Domain\\Api\\Models\\BaseModel');
    }

    protected function registerValidators()
    {
        $this->app->bind('Domain\\Api\\Validators\\AbstractValidator', 'Domain\\Api\\Validators\\BaseValidator');
    }

    /**
     * Registers view composers
     */
    protected function registerViewComposers()
    {
        $this->app->view->composer(['users.show', 'users.index'], 'Domain\Api\Views\Composers\ViewComposer');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['api'];
    }

    /**
     * Gets Laravel Application instance
     * @return \Illuminate\Foundation\Application
     */
    protected function getApp()
    {
        return $this->app;
    }

    /**
     * Sets database connection
     */
    protected function setConnection()
    {
        $connection = $this->app['config']->get('api::database.default');

        if ($connection !== 'default'){
            $wardrobeConfig = $this->app['config']->get('api::database.connections.'.$connection);
        } else {
            $connection = $this->app['config']->get('database.default');
            $wardrobeConfig = $this->app['config']->get('database.connections.'.$connection);
        }
        $this->app['config']->set('database.connections.api', $wardrobeConfig);
        $this->app['config']->set('database.default', 'api');
    }

    /**
     * Require packages or alternate resources
     * @param null $packages
     */
    protected function requires($packages = null)
    {
        $application = $this->getApp();
        $app = $application->app;
        $resources = __DIR__.'/Resources/'.'*.php';
        $routes = __DIR__.'/Routes/'.'*.php';
        $resources = glob($resources);
        $routes = glob($routes);

        $files = array_merge($routes, $resources);
        foreach ($files as $file) {
            require $file;
        }

        if (is_array($packages)) {
            foreach ($packages as $file) {
                require $file;
            }
        } else {
            if (!is_null($packages)) {
                require $packages;
            }
        }
    }
}
