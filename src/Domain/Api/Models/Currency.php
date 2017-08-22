<?php namespace Domain\Api\Models;

class Currency
{

    /**
     * Gets currencies
     * @return array
     */
    public function getCurrencies()
    {
        return [
          'ZAR' => 'South African Rand (ZAR)',
          'GBP' => 'British Pound (GBP)',
          'EUR' => 'Euro (EUR)',
          'KES' => 'Kenyan Shillings (KES)',
        ];
    }

    /**
     * Gets exchange rates
     * @return array
     */
    public function getExchangeRates()
    {
        return [
          'ZAR' => 13.3054,
          'GBP' => 0.651178,
          'EUR' => 0.884872,
          'KES' => 103.860,
        ];
    }

    /**
     * Gets surcharges
     * @return array
     */
    public function getSurcharges()
    {
        return [
          'ZAR' => 7.5,
          'GBP' => 5,
          'EUR' => 5,
          'KES' => 2.5,
        ];
    }

    /**
     * Gets discounts
     * @return array
     */
    public function getDiscounts()
    {
        return [
          'ZAR' => 0,
          'GBP' => 0,
          'EUR' => 2,
          'KES' => 0,
        ];
    }

    /**
     * Calculates the exchange rates, surcharge and amounts due
     * @param $currency
     * @param $amount
     * @return array
     */
    public function calculate($currency, $amount)
    {
        $surcharge = $this->getSurcharges();
        $rates = $this->getExchangeRates();
        $subtotal = $amount * $rates[$currency];
        $charge = $amount * $rates[$currency] * $surcharge[$currency] / 100;
        $total = $subtotal + $charge;

        return [
          'amount'    => $amount,
          'charge'    => $charge,
          'currency'  => $currency,
          'rates'     => $rates,
          'surcharge' => $surcharge,
          'subtotal'  => $subtotal,
          'total'     => $total,
        ];
    }
}