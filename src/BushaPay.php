<?php

namespace Busha\BushaPay;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Unicodeveloper\Paystack\Exceptions\IsNullException;
use Unicodeveloper\Paystack\Exceptions\PaymentVerificationFailedException;

class BushaPay
{
    /**
     * Get Base Url from Paystack config file
     */
    public function setBaseUrl()
    {
        $this->baseUrl = Config::get('bushapay.paymentUrl');
    }
    /**
     * Get secret key from BushaPay config file
     */
    public function setKey()
    {
        $this->secretKey = Config::get('bushapay.secretKey');
    }
}
