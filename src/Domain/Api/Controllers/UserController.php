<?php namespace Domain\Api\Controllers;

use BaseController;
use Domain\Api\Models\Presenters\Presenter;
use Domain\Api\Models\Presenters\UserPresenter;
use Domain\Api\Repositories\UserRepository as User;
use Illuminate\Support\Facades\View;

/**
 * Class UserController
 * @package Domain\Api\Controllers
 */
class UserController extends BaseController
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * @var Presenter
     */
    protected $presenter;

    /**
     * Construct
     * @param User $user
     * @param Presenter $presenter
     */
    public function __construct(User $user, Presenter $presenter)
    {
        $this->user = $user;
        $this->presenter = $presenter;
    }

    /**
     * Show user
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        $user = $this->user->findById($id);

        if($user)
        {
            $user = $this->presenter->model($user, new UserPresenter);

            return View::make('api::users.show', compact('user'));
        }

        App::abort(404);
    }

    /**
     * Index
     *
     * @return View
     */
    public function index()
    {
        $user = $this->user->all();

        $users = $this->presenter->collection($user, new UserPresenter);

        return View::make('api::users.index', compact('users'));
    }

    /**
     * Paginate
     *
     * @return View
     */
    public function paginate()
    {
        $page = Input::get('page', 1);

        $data = $this->user->getByPage($page, 50);

        $users = Paginator::make($data->items, $data->totalItems, 50);

        $users = $this->presenter->paginator($users, new UserPresenter);

        return View::make('api::users.index', compact('users'));
    }


}