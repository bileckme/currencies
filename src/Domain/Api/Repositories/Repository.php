<?php
namespace Domain\Api\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository
 * @package Alerts\Repositories
 */
class Repository extends AbstractRepository
{
    public $model;

  /**
   * Repository constructor.
   * @param Model $model
   */
  public function __construct(Model $model)
  {
      $this->model = $model;
  }

  /**
   * @param int $limit
   * @return mixed
   */
  public function get($limit=20)
  {
      if ($limit) {
          $fillable = $this->model->getFillable();
          if (count($fillable)) {
              $select = $this->model->select($fillable);
          } else {
              $select = $this->model;
          }
          return $select->limit($limit)->get();
      } else {
          parent::get();
      }
  }

  /**
   * @param int $limit
   * @return Collection
   */
  public function limit($limit)
  {
      return $this->model->limit($limit);
  }

  /**
   * Get all records from a repository
   * @return mixed
   */
  public function all($limit=1000)
  {
      $this->model->get($limit);
  }
}
