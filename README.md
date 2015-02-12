Laravel Country Lookup by IP Address
======================================
[![Downloads](http://img.shields.io/packagist/dt/smalldogs/ip2country.svg?style=flat)](https://packagist.org/packages/smalldogs/ip2country)
[![License](http://img.shields.io/:license-bsd2-blue.svg?style=flat)](http://opensource.org/licenses/BSD-2-Clause)
![Version](http://img.shields.io/github/tag/smalldogs/ip2country.svg?style=flat)
[![TravisCI](http://img.shields.io/travis/smalldogs/ip2country.svg?style=flat)](https://travis-ci.org/smalldogs/ip2country)


Laravel package to lookup the country associated with an IPv4 address. Developed with an eye to keeping it as lightweight and lookups as fast as possible. Creates and populates a **local database** table, 
so there are **no external requests** being made during runtime.

This package includes GeoLite data created by MaxMind, available from
<a href="http://www.maxmind.com">http://www.maxmind.com</a>. The updated free downloadable database is released the
first Tuesday of each month. I'll attempt to ensure to update this package each time.

Current IP Mapping Table
------------------------
Doesn't seem to change much from month to month. Current version was released by MaxMind `February 4, 2015`

How to Update Mapping DB Table
------------------------------
```bash
php artisan migrate --package="smalldogs/ip2country"
```

How to Install
--------------
1. Require the package with composer.
```bash
composer require "smalldogs/ip2country"
```

2. Create and populate the database lookup table.
```bash
php artisan migrate --package="smalldogs/ip2country"
```

3. Add the service to your providers array in <code>app/config/app.php</code>
```php
'providers' => array(
        'Smalldogs\Ip2Country\Ip2CountryServiceProvider',
        //[...]
);
```

How to Use
----------

```php
// Returns the 2 letter country code for the user, eg: 'US'
$myCountryCode = Ip2Country::get();

// Returns the full name of the country, eg: 'United States'
$myCountryName = Ip2Country::getFull();

// Get the country for someone other than user on the page
$someonesIpAddress = '192.168.0.1';
$someonesCountryCode = Ip2Country::get($someonesIpAddress);
```

Configuration
-------------
By default, if the IP address is not found in the lookup table, it will return 'US' as a country code, and 'United 
States' as a country name. You can customize this in the config.

```bash
php artisan config:publish smalldogs/ip2country
```

Then navigate to <code>app/config/packages/smalldogs/ip2country/config.php</code>.
```php
return array(
    // If IP address is not found, what country is returned
    'default_country_code' => 'US',
    'default_country_name' => 'United States',
    
    // Since our data will change, at most, once a month. Cache the Ip lookup for a day
    // Default: 1 day. Set to 0 or null to disable.
    'cache_results' => 60 * 24
);

````
If you don't want anything returned if the IP address is not found, simply set each of these to <code>=> null</code>
