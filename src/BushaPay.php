<?php

namespace Busha\BushaPay;

use Unicodeveloper\Paystack\Exceptions\IsNullException;
use Unicodeveloper\Paystack\Exceptions\PaymentVerificationFailedException;
use Busha\Concerns\HandleRequest;

class BushaPay
{
    use HandleRequest;

    public function __construct()
    {
        $this->setBaseUrl();
        $this->setApiKey();
        $this->setApiVersion();
    }
}
