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
          'USDZAR' => 'South African Rand (ZAR)',
          'USDGBP' => 'British Pound (GBP)',
          'USDEUR' => 'Euro (EUR)',
          'USDKES' => 'Kenyan Shillings (KES)',
        ];
    }

    public function getExternalExchangeRates()
    {
        $accessPoint = "http://apilayer.net/api/live?access_key=cb56ae87034271a39b64192fdb1046a4&currencies=ZAR,GBP,EUR,KES&source=USD&format=1";

        $json = json_decode(file_get_contents($accessPoint), true);
        return ($json['quotes']);
    }

    /**
     * Gets exchange rates
     * @return array
     */
    public function getExchangeRates()
    {
        return [
          'USDZAR' => 13.3054,
          'USDGBP' => 0.651178,
          'USDEUR' => 0.884872,
          'USDKES' => 103.860,
        ];
    }

    /**
     * Gets surcharges
     * @return array
     */
    public function getSurcharges()
    {
        return [
          'USDZAR' => 7.5,
          'USDGBP' => 5,
          'USDEUR' => 5,
          'USDKES' => 2.5,
        ];
    }

    /**
     * Gets discounts
     * @return array
     */
    public function getDiscounts()
    {
        return [
          'USDZAR' => 0,
          'USDGBP' => 0,
          'USDEUR' => 2,
          'USDKES' => 0,
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