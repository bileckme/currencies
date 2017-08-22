<?php namespace Domain\Api\Seeders;

use Domain\Api\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Application;

class RoleTableSeeder extends Seeder
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * UserTableSeeder constructor.
     */
    public function __construct(Application $application)
    {
        $this->app = $application;
    }

    public function run()
    {
        $this->app['db']->table('roles')->truncate();
        $this->createAdministrator();
        $this->createMember();
    }

    protected function createAdministrator()
    {
        Role::create(
          ['name'    => 'Administrator']
        );
    }

    protected function createMember()
    {
        Role::create(
          ['name'    => 'Member']
        );
    }
}