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

Go to [Currencies](http://localhost/currencies) on your web browser.


Database
========
The database use is sqlite database, but a MySQL database can be used, simply change the configuration under the path
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

Querying SQLite Database
========================
To query the database to see the orders that has been placed.

Run the command:

`sqlite3 api.db`

Then, select the records from the orders table
```
sqlite> select * from orders;
13|ZAR|13.3054|7.5|1.0|14.303305|0.997905|2017-08-21 15:26:05|2017-08-21 15:26:05
14|GBP|0.651178|5.0|20.0|13.674738|0.651178|2017-08-21 15:36:30|2017-08-21 15:36:30
```