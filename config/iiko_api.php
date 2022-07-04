<?php

return [
    'domain' => env('IIKO_DOMAIN_API', ''),

    'lists' => env('IIKO_LISTS_API', ''),
    'order' => env('IIKO_ORDER_API', ''),
    'dashboard' => env('IIKO_DASHBOARD_API', ''),

    'lists_api' => env('IIKO_DOMAIN_API', '') . env('IIKO_LISTS_API', ''),
    'order_api' => env('IIKO_DOMAIN_API', '') . env('IIKO_ORDER_API', ''),
    'dashboard_api' => env('IIKO_DOMAIN_API', '') . env('IIKO_DASHBOARD_API', ''),
];
