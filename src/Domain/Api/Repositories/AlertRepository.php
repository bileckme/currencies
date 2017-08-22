<?php namespace Domain\Api\Repositories;

use Domain\Api\Models\Alert;

/**
 * Class AlertRepository
 * @package Domain\Repositories
 */
class AlertRepository extends Repository
{
    protected $alert;


  /**
   * AlertRepository constructor.
   * @param Alerts $alert
   */
  public function __construct(Alert $alert)
  {
      $this->alert = $alert;
  }

  /**
   * Find an Alert
   * @param integer $id
   * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|static
   */
  public function findAlert($id)
  {
      return $this->alert->findOrFail($id);
  }

  /**
   * Find all Alerts
   * @param integer $id
   * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|static
   */
  public function findAllAlerts()
  {
      return $this->alert->get();
  }

  /**
   * Creates an Alert
   * @param array $attribute
   * @return \Illuminate\Database\Eloquent\Model|static
   */
  public function createAlert(array $attribute)
  {
      return Alert::create($attribute);
  }

    /**
     * Get all records from a repository
     * @return mixed
     */
    public function all()
    {

    }
}
