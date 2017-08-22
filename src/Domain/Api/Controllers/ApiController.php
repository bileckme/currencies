<?php namespace Domain\Api\Controllers;

use BaseController;
use Illuminate\Foundation\Application as Laravel;
use Domain\Api\Models\Currency;
use Domain\Api\Validators\CurrencyValidator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ApiController
 * @package Api
 */
class ApiController extends BaseController
{
    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @var Request
     */
    private $request;
    /**
     * @var Response
     */
    private $response;

    /**
     * ApiController constructor.
     * @param Request $request
     * @param Response $response
     * @param Currency $currency
     *
     */
    public function __construct(Request $request, Response $response, Currency $currency)
    {
      $this->currency = $currency;
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

      $validator = (new CurrencyValidator())->validate($parameters);

      if ($validator->fails()) {
          return Collection::make(
            [
              'error'   => 'Bad request',
              'code'    => 400,
              'message' => $validator->getMessageBag(),
            ]
          );
      }
      $currency = new Currency();
      $currencies = $currency->getCurrencies();
      return Collection::make($currencies);
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

    /**
     * Get exchange rates
     * @return static
     */
    public function getExchangeRates()
    {
      $parameters = $this->request->input();

      $validator = (new CurrencyValidator())->validate($parameters);

      if ($validator->fails()) {
          return Collection::make(
            [
              'error'   => 'Bad request',
              'code'    => 400,
              'message' => $validator->getMessageBag(),
            ]
          );
      }
      $currency = new Currency();
      $rates = $currency->getExchangeRates();
      return Collection::make($rates);
    }

    /**
     * Get discounts
     * @return static
     */
    public function getDiscounts()
    {
        $parameters = $this->request->input();

        $validator = (new CurrencyValidator())->validate($parameters);

        if ($validator->fails()) {
            return Collection::make(
              [
                'error'   => 'Bad request',
                'code'    => 400,
                'message' => $validator->getMessageBag(),
              ]
            );
        }
        $currency = new Currency();
        $discounts = $currency->getDiscounts();
        return Collection::make($discounts);
    }

    /**
     * Get surcharges
     * @return static
     */
    public function getSurcharges()
    {
        $parameters = $this->request->input();

        $validator = (new CurrencyValidator())->validate($parameters);

        if ($validator->fails()) {
            return Collection::make(
              [
                'error'   => 'Bad request',
                'code'    => 400,
                'message' => $validator->getMessageBag(),
              ]
            );
        }
        $currency = new Currency();
        $surcharges = $currency->getSurcharges();
        return Collection::make($surcharges);
    }
}
