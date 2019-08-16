<?php

namespace Busha\BushaPay;

use Busha\Concerns\HandleRequest;
use Busha\Concerns\InteractsWithResponse;
use Illuminate\Support\Facades\Validator;

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

    public function listCharges($page = 1, $limit = 20)
    {
        $this->get('/charges', compact($page,$limit));
        return $this;
    }

    public function showCharge(string $codeOrId)
    {
        $this->get('/charges/'.$codeOrId);
        return $this;
    }

    public function createCharge(array $data)
    {
        $this->post('/charges', $data);
        return $this;
    }

    public function cancelCharge(string $id)
    {
        $this->post('/charges/'. $id .'/cancel');
        return $this;
    }

    public function resolveCharge($id)
    {
        $this->post('/charges/'. $id .'/resolve');
        return $this;
    }
}