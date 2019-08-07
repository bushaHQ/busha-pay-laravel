<?php

return [
    /**
     * Api Key From Busha Pay Dashboard
     *
     */
    'apiKey' => env('BUSHAPAY_API_KEY'),

    /**
     * Api Version For Busha Pay
     *
     */
    'apiVersion' => env('BUSHAPAY_API_Version', "2019-06-30"),

    /**
     * Api Url For Busha Pay Service
     *
     */
    'apiUrl' => env('BUSHAPAY_API_URL', 'api.pay.busha.co'),
];