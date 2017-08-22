<?php

$app['router']->any('api/', function ($app) {

  /**
   * Handle any redirect requests
   */

});


$app['router']->get('api/xrates', array('uses' => 'Domain\Api\Controllers\ApiController@getExchangeRates'));
$app['router']->get('api/discounts', array('uses' => 'Domain\Api\Controllers\ApiController@getDiscounts'));
$app['router']->get('api/surcharges', array('uses' => 'Domain\Api\Controllers\ApiController@getSurcharges'));