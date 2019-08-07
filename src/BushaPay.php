<?php

namespace Busha\BushaPay;

use Busha\Concerns\HandleRequest;
use Busha\Concerns\InteractsWithResponse;

class BushaPay
{
    use HandleRequest, InteractsWithResponse;

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
        return $this;
    }

    public function listCharge($page,$limit)
    {
        $this->get('/charges', compact($page,$limit));
        return $this;
    }

    public function createCharge($data)
    {
        $this->post('/charges', $data);
        return $this;
    }

    public function cancelCharge($charge)
    {
        $this.post('/charges/'. $charge .'/cancel');
        return $this;
    }

    public function resolveCharge($charge)
    {
        $this.post('/charges/'. $charge .'/resolve');
        return $this;
    }
}