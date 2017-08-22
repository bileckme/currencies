<?php namespace Domain\Api\Models;

/**
 * Class Alert
 * @package Domain\Api\Entities
 */
class Alert extends BaseModel
{
    /**
     * @var
     */
    protected $table = 'alerts';

    /**
     * @var
     */
    protected $primaryKey = 'id';
}