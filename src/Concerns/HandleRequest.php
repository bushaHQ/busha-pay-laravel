<?php

namespace Busha\Concerns;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use IsNullException;

trait HandleRequest
{
    /**
     * Issue Api Key from your BushaPay Dashboard
     * @var string
     */
    protected $apiKey;

    /**
     * Issue Api Key from your BushaPay Dashboard
     * @var string
     */
    protected $apiVersion;

    /**
     * BushaPay API base Url
     * @var string
     */
    protected $baseUrl;

    /**
     * Instance of Guzzle Client
     * @var Client
     */
    protected $client;

    /**
     *  Response from requests made to BushaPay
     * @var mixed
     */
    protected $response;

    private $supportedHttpMethods = [
        "GET",
        "POST"
    ];
    
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
        $this->apiVersion = Config::get('bushapay.apiVersion');
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

    /**
     * @param string $method
     * @param string $relativeUrl
     * @param array $body
     * @return BushaPay
     * @throws IsNullException
     */
    private function setHttpResponse($method, $relativeUrl, $body = [])
    {
        if (is_null($method)) {
            throw new IsNullException("Empty method not allowed");
        }
        $this->response = $this->client->{strtolower($method)}(
            $this->baseUrl . $relativeUrl,
            ["body" => json_encode($body)]
        );
        return $this;
    }

    function __call($method, $args)
    {
        if(in_array(strtoupper($method), $this->supportedHttpMethods))
        {
            return $this->setHttpResponse($method, ...$args);
        }
    }
}
