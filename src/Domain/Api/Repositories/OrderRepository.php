<?php namespace Domain\Api\Repositories;

use Domain\Api\Models\Order;

/**
 * Class OrderRepository
 * @package Domain\Repositories
 */
class OrderRepository extends Repository
{
    /**
     * @var Order
     */
    protected $order;


    /**
    * OrderRepository constructor.
    * @param Order $order
    */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
    * Find an Order
    * @param integer $id
    * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|static
    */
    public function findOrder($id)
    {
        return $this->order->findOrFail($id);
    }

  /**
   * Find all Orders
   * @param integer $id
   * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|static
   */
  public function findAllOrders()
  {
      return $this->order->get();
  }

  /**
   * Creates an Order
   * @param array $attribute
   * @return \Illuminate\Database\Eloquent\Model|static
   */
  public function createOrder(array $attribute)
  {
      return Order::create($attribute);
  }

    /**
     * Get all records from a repository
     * @return mixed
     */
    public function all()
    {
        return $this->findAllOrders();
    }
}
