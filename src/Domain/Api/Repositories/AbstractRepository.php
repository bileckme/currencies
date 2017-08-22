<?php namespace Domain\Api\Repositories;

/**
 * Class AbstractRepository
 * @package Domain\Repositories
 */
abstract class AbstractRepository implements RepositoryInterface
{
    public $model;

  /**
   * @param int $limit
   */
  public function get()
  {
      return $this->model->get();
  }

  /**
   * @param $id
   * @return mixed|void
   */
  public function findById($id)
  {
      return $this->model->findOrFail($id);
  }
}
