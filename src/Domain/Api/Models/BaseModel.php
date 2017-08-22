<?php namespace Domain\Api\Models;

/**
 * Class BaseModel
 * @package Domain\Api\Entities
 */
class BaseModel extends AbstractModel
{
    public function getConnection()
    {
        return static::resolveConnection('api');
    }
}