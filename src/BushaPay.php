<?php

namespace Busha\BushaPay;

use Busha\Concerns\HandleRequest;

class BushaPay
{
    use HandleRequest;

    public function __construct()
    {
        $this->setBaseUrl();
        $this->setApiKey();
        $this->setApiVersion();
        $this->setRequestOptions();
    }

    public function showCharge($charge)
    {
        $this->get('/charges/'.$charge);
    }

    public function listCharge($page,$limit)
    {
        $this->get('/charges', compact($page,$limit));
    }

    public function createCharge($data)
    {
        $this->post('/charges', $data);
    }

    public function cancelCharge($charge)
    {
        $this.post('/charges/'. $charge .'/cancel');
    }

    public function resolveCharge($charge)
    {
        $this.post('/charges/'. $charge .'/resolve');
    }
}