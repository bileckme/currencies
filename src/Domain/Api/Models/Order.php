<?php namespace Domain\Api\Models;

/**
 * Class Order
 * @package Domain\Api\Models
 */
class Order extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['currency',
                           'exchange_rate',
                           'surcharge',
                           'amount_purchased',
                           'amount_paid',
                           'amount_surcharge'];
}