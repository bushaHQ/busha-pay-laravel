<?php

namespace Busha\Concerns;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

trait HandleRequest
{
    /**
     * Get Base Url from BushaPay config file
     */
    public function setBaseUrl()
    {
        $this->baseUrl = Config::get('bushapay.apiUrl');
    }

    /**
     * Get api key from BushaPay config file
     */
    public function setApiKey()
    {
        $this->apiKey = Config::get('bushapay.apiKey');
    }

    /**
     * Get api key from BushaPay config file
     */
    public function setApiVersion()
    {
        $this->apiKey = Config::get('bushapay.apiVersion');
    }

    /**
     * Set options for making the Client request
     */
    private function setRequestOptions()
    {
        $this->client = new Client(
            [
                'base_uri' => $this->baseUrl,
                'headers' => [
                    'X-BP-Api-Key' => $this->apiKey,
                    'X-BP-Version' => $this->apiVersion,
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json'
                ]
            ]
        );
    }
}
