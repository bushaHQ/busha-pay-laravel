<?php

namespace Busha\Concerns;

trait InteractsWithResponse
{
    /**
     * Get the charge addresses
     * @return array
     */
    public function getAddresses()
    {
        return $this->getResponse()['data']['addresses'];
    }

    /**
     * Get charge pricing
     * @return array
     */
    public function getPricing()
    {
        return $this->getResponse()['data']['pricing'];
    }

    /**
     * Get the charge code from response
     * @return string
     */
    public function getChargeCode()
    {
        return $this->getResponse()['data']['code'];
    }

    /**
     * Get the charge id from the response
     * @return string
     */
    public function getChargeId()
    {
        return $this->getResponse()['data']['id'];
    }

    /**
     * Get the charge timeline from the response
     * @return array
     */
    public function getTimeline()
    {
       return $this->getResponse()['data']['timeline'];
    }

    /**
     * Get the metadata from the response
     * @return array
     */
    public function getMetadata()
    {
       return $this->getResponse()['data']['metadata'];
    }
    
    /**
     * Get the payments from the response
     * @return array
     */
    public function getPaymentData()
    {
        return $this->getResponse()['data']['payments'];
    }

    /**
     * Get the authorization url from the callback response
     * @return string
     */
    public function getChargeUrl()
    {
        return $this->getResponse()['data']['hosted_url'];
    }

    /**
     * Fluent method to redirect to Busha Payment Page
     */
    public function redirectNow()
    {
        return redirect($this->getResponse()['data']['hosted_url']);
    }

    /**
     * Get the whole response from a get operation
     * @return array
     */
    private function getResponse()
    {
        return json_decode($this->response->getBody(), true);
    }

   /**
     * Get the data response from a get operation
     * @return array
     */
    private function getData()
    {
        return $this->getResponse()['data'];
    }

}
