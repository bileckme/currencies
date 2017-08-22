<?php namespace Domain\Api\Subscribers;

use Domain\Api\Models\Currency;
use Domain\Api\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Events\Dispatcher as Event;

/**
 * Class OrderSubscriber
 * @package Domain\Api\Subscribers
 */
class OrderSubscriber
{

    /**
     * Sends an email
     * @param $result
     */
    public function sendEmail(Order $order)
    {
        $user['email'] = 'bileckme@gmail.com';
        $user['name'] = 'Biyi Akinpelu';
        $user['subject'] = 'Order notification';

        $views = 'api::emails.notification';

        $data['user'] = $user['name'];
        $data['orderNo'] = $order->id;
        $data['currency'] = $order->currency;
        $data['exchangeRate'] = $order->exchange_rate;
        $data['surcharge'] = $order->surcharge;
        $data['charged'] =  $order->amount_surcharge;
        $data['purchased'] =  $order->amount_purchased;
        $data['paid'] = $order->amount_paid;
        $data['date'] = $order->created_at;

        Mail::send($views, $data, function($message) use ($user){
            $message
              ->to(trim($user['email']), $user['name'])
              ->subject($user['subject']);
        });
    }

    /**
     * Applies a discount
     * @param Order $order
     */
    public function applyDiscount(Order $order, $currencies)
    {
        $currency = new Currency();
        $discounts = $currency->getDiscounts();
        $discount = $discounts[$currencies] / 100 * $order->amount_purchased;
        $order->amount_purchased = $order->amount_purchased - $discount;
        $order->save();
    }
    
    /**
     * @param array|mixed
     */
    public function onSave(Order $order)
    {
        switch($order->currency)
        {
            case 'GBP':
                $this->sendEmail($order);
                break;

            case 'EUR':
                $this->applyDiscount($order, $order->currency);
                break;
        }
    }

    /**
     * Subscribe to events
     * @param Event $event
     */
    public function subscribe(Event $event)
    {
        $event->listen(['order.saved',], 'Domain\Api\Subscribers\OrderSubscriber@onSave');
    }
}