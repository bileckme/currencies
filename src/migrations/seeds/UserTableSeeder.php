<?php namespace Domain\Api\Seeders;

use Domain\Api\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
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
        $this->app['db']->table('users')->truncate();
        $password = Hash::make('bar');

        User::create(
          [
            'email'    => 'foo@bar.com',
            'username' => 'foo',
            'password' => $password
          ]
        );
    }
}