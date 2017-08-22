<?php namespace Domain\Api\Repositories;

use Domain\Api\Models\User;

/**
 * Interface UserRepositoryInterface
 * @package Domain\Api\Repositories
 */
interface UserRepositoryInterface
{
    /**
   * Find the User by identifier
   *
   * @param $id
   * @return mixed
   */
  public function findUserById($id);

  /**
   * Find the User by username
   *
   * @param $username
   * @return mixed
   */
  public function findUserByUsername($username);

  /**
   * Add the User
   *
   * @param User $user
   * @return mixed
   */
  public function add(User $user);

  /**
   * Remove the User
   *
   * @param $id
   * @return mixed
   */
  public function remove($id);
}
