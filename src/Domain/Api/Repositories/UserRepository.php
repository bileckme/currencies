<?php namespace Domain\Api\Repositories;

use Domain\Api\Models\User;

/**
 * Class UserRepository
 * @package Domain\Api\Repositories\User
 */
class UserRepository extends Repository implements UserRepositoryInterface, RepositoryInterface
{
    /**
     * @var User
     */
    protected $user;

    /**
     * UserRepository constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Get users by page
     * @param $page
     * @param $limit
     */
    public function getByPage($page, $limit)
    {
        return $this->user->all()->skip($page)->take($limit);
    }

    /**
     * Find the User by identifier
     *
     * @param $id
     * @return mixed
     */
    public function findUserById($id)
    {
        return $this->findById($id);
    }

    /**
     * Find the User by username
     *
     * @param $username
     * @return mixed
     */
    public function findUserByUsername($username)
    {
        return $this->user->where('username', '=', $username);
    }

    /**
     * Add the User
     *
     * @param User $user
     * @return mixed
     */
    public function add(User $user)
    {
        $this->user = $user;
        $this->user->save();
    }

    /**
     * Remove the User
     *
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->user->find($id)->delete();
    }

    /**
     * Get a record from a repository by identifier
     * @param int $limit
     * @return mixed
     */
    public function findById($id)
    {
        return $this->user->find($id);
    }

    /**
     * Get a list of records from a repository
     * @param int $limit
     * @return mixed
     */
    public function get()
    {
        return $this->user->get();
    }

    /**
     * Get all records from a repository
     * @return mixed
     */
    public function all()
    {
        return $this->user->get();
    }
}