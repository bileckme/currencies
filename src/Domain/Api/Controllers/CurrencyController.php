<?php namespace Domain\Api\Controllers;

use BaseController;
use Domain\Api\Models\Currency;
use Domain\Api\Models\Order;
use Domain\Api\Repositories\OrderRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Events\Dispatcher as Event;
class CurrencyController extends BaseController
{
    /**
     * @var Event
     */
    protected $event;

    /**
     * CurrencyController constructor.
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }


    /**
     * Index
     *
     * @return View
     */
    public function index()
    {
        $currency = new Currency();
        $currencies = $currency->getCurrencies();
        return View::make('api::currencies.index', compact('currencies'));
    }

    /**
     * Store request database
     *
     */
    public function store()
    {
        // Get user input values
        $currencySelection = Input::get('currencies');
        $amount = Input::get('amount');

        // Calculate
        $currency = new Currency();
        $result = $currency->calculate($currencySelection, $amount);

        $currencies = $currency->getCurrencies();
        $exchangeRates = $currency->getExchangeRates();
        $surcharges = $currency->getSurcharges();
        $orderRepository = new OrderRepository(new Order);

        $order = $orderRepository->createOrder([
          'currency' => $currencySelection,
          'exchange_rate' => $exchangeRates[$currencySelection],
          'surcharge' => $surcharges[$currencySelection],
          'amount_purchased' => $result['amount'],
          'amount_paid' => $result['total'],
          'amount_surcharge' => $result['charge']
        ]);
        $result['order'] = $order->id;
        $this->event->fire('order.saved', [$order]);

        $values = [
          'charge'     => $result['charge'],
          'surcharge'  => $result['surcharge'],
          'subtotal'   => $result['subtotal'],
          'total'      => $result['total'],
          'currencies' => $currencies,
        ];

        return View::make('api::currencies.index', $values);
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