<?php

return array(
    // If IP address is not found, what country is returned
    'default_country_code' => 'US',
    'default_country_name' => 'United States',

    // Since our data will change, at most, once a month. Cache the Ip lookups (in minutes)
    // Default: 1 day. Set to 0 or null to disable.
    'cache_results' => 60 * 24
);