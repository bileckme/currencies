<?php namespace Domain\Api\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Domain\Api\Migrations\Database as DB;

/**
 * Class Migration
 */
class DatabaseMigration extends Migration
{
    protected $startup = false;

    protected $db;

    /**
     * Migration constructor.
     * @param $database
     */
    public function __construct(DB $database)
    {
        $this->db = $database;
    }

    /**
     * Create a database
     * @param string $name
     */
    private function createDatabase($name){
        $this->db->create($name);
    }

    /**
     * Create a database
     * @param string $name
     */
    private function dropDatabase($name){
        $this->db->drop($name);
    }


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ($this->startup) $this->createDatabase('domain_api');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ($this->startup) $this->dropDatabase('domain_api');
    }

}