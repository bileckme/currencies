<?php namespace Domain\Api\Repositories;

/**
 * Interface RepositoryInterface
 * @package Domain\Repositories
 */
interface RepositoryInterface
{
    /**
   * Get a record from a repository by identifier
   * @param int $limit
   * @return mixed
   */
  public function findById($id);

  /**
   * Get a list of records from a repository
   * @param int $limit
   * @return mixed
   */
  public function get();

  /**
   * Get all records from a repository
   * @return mixed
   */
  public function all();
}
