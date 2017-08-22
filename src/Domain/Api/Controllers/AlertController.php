<?php namespace Domain\Api\Controllers;

use BaseController;
use Domain\Api\Validators\AlertValidator;
use Illuminate\Foundation\Application as Laravel;
use Domain\Api\Repositories\Alert\AlertRepository as Alert;
use Domain\Api\Validators\AlertsValidator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class AlertController
 * @package Alerts
 */
class AlertController extends BaseController
{
    /**
   * @var AlertRepository
   */
  protected $alert;

  /**
   * @var Request
   */
  private $request;
  /**
   * @var Response
   */
  private $response;

  /**
   * AlertController constructor.
   * @param Request $request
   * @param Response $response
   * @param AlertRepository $alert
   *
   */
  public function __construct(Laravel $app, Request $request, Response $response, Alert $alert)
  {
      parent::__construct($app);
      $this->alert = $alert;
      $this->request = $request;
      $this->response = $response;
  }

  /**
   * Index request
   *
   */
  public function index()
  {
      $parameters = $this->request->input();

      $validator = (new AlertValidator())->validate($parameters);

      if ($validator->fails()) {
          return Collection::make(
            [
              'error'   => 'Bad request',
              'code'    => 400,
              'message' => $validator->getMessageBag(),
            ]
          );
      }

      $alert = $this->alert->findAlertByEmail($parameters['email']);
      $type = null;
      if (is_object($alert)) {
          $type = 'guest';
      }
      $alert = $this->alert->createAlert($parameters, $type);
      return $alert;
  }

  /**
   * Store request database
   *
   */
  public function store()
  {
      return $this->index();
  }

  /**
   * Edit request
   * @param $id
   */
  public function edit($id)
  {
  }

  /**
   * Update request
   * @param $id
   */
  public function update($id)
  {
  }

  /**
   * Destroy request
   * @param $id
   */
  public function destroy($id)
  {
  }
}
