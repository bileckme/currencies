# README
This is the demo app for Mukuru currencies and exchange rates

Installation
============
To deploy the application, run the following command:

`git clone https://github.com/bileckme/mukuru-currencies.git`

`cd mukuru-currencies`

To install the code, run command:

`composer install`

Once the composer installation is complete, launch the laravel web server:

`sudo php artisan serve --host=localhost --port=80`

Go to [Currencies](http://localhost/domain/api/currencies) on your web browser.


Database
========
The database use is sqlite database, but a MySQL database can be use simply by changing the configuration under the path
`src/config/database.php`

Change the default driver to mysql to switch to a mysql database server.

e.g

```
return array(
  'default' => 'api',
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
```

API Calls
=========
```
Currencies GET - http://localhost/api/currencies
Discounts GET - http://localhost/api/discounts
Surcharges GET - http://localhost/api/surcharges
Exchange Rates GET - http://localhost/api/xrates
```