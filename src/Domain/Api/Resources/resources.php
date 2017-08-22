<?php

$app['router']->resource('domain/api/alerts', 'Domain\Api\Controllers\AlertController');
$app['router']->resource('domain/api/currencies', 'Domain\Api\Controllers\CurrencyController');
$app['router']->resource('domain/api/users', 'Domain\Api\Controllers\UserController');
