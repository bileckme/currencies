<?php
$app['router']->resource('currencies', 'Domain\Api\Controllers\CurrencyController');
$app['router']->resource('api/currencies', 'Domain\Api\Controllers\ApiController');
