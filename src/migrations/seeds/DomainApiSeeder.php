<?php namespace Domain\Api\Seeders;

use Illuminate\Database\Seeder;

/**
 * Class DomainApiSeeder
 * @package Domain\Api
 */
class DomainApiSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');
    }
}