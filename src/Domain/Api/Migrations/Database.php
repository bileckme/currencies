<?php namespace Domain\Api\Migrations;
use Illuminate\Database\DatabaseManager as DBM;
use Illuminate\Database\DatabaseConnection as DBC;
use Illuminate\Support\Facades\DB;

/**
 * Class DomainApiDatabase
 * @package Domain\Api
 */
class Database
{
    /** @var Illuminate\Database\DatabaseConnection */
    protected $connection;

    /**
     * DomainApiDatabase constructor.
     * @param string $driver
     * @internal param $connection
     */
    public function __construct($driver='mysql')
    {
        $this->connection = DB::connection($driver);
    }

    public function create($database){
        $query = "CREATE DATABASE IF NOT EXISTS `".$database."`";
        return $this->connection->statement($query);
    }

    public function drop($database){
        $query = "DROP DATABASE IF EXISTS `".$database."`";
        return $this->connection->statement($query);
    }
}