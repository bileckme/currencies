<?php

return array(
  'default' => 'sqlite',
  'connections' => array(

    'api'        => array(
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => 'api',
      'username'  => 'root',
      'password'  => '',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
    ),

    'sqlite' => array(
      'driver'   => 'sqlite',
      'database' => __DIR__.'/../database/api.db',
      'prefix'   => '',
    ),
  ),
  'migrations' => 'migrations'
);
