<?php

namespace MuharremYildirim\KolayGelsin;

use Exception;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\GuzzleException;
use MuharremYildirim\KolayGelsin\Exceptions\ApiException;
use MuharremYildirim\KolayGelsin\Models\CorporateCustomerCargoEventTypes;
use MuharremYildirim\KolayGelsin\Models\CorporateShipmentsStatus;
use MuharremYildirim\KolayGelsin\Models\DocumentForHistory;
use MuharremYildirim\KolayGelsin\Models\IntegrationShipment;
use MuharremYildirim\KolayGelsin\Models\PickupAndDelivery;
use MuharremYildirim\KolayGelsin\Models\Recipient;
use MuharremYildirim\KolayGelsin\Models\Response;

class Client
{
    /**
     * apiKey
     *
     * @var string
     */
    protected $apiKey;

    /**
     * isTestMode
     *
     * @var bool
     */
    protected $isTestMode;

    /**
     * __construct
     *
     * @param  string $apiKey
     * @return void
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get the value of apiKey
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set the value of apiKey
     *
     * @return  self
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Get the value of isTestMode
     */
    public function getIsTestMode()
    {
        return $this->isTestMode;
    }

    /**
     * Set the value of isTestMode
     *
     * @return  self
     */
    public function setIsTestMode($isTestMode)
    {
        $this->isTestMode = $isTestMode;

        return $this;
    }

    /**
     * url
     *
     * @return string
     */
    private function url()
    {
        if ($this->isTestMode) {
            return 'https://apibeta.klyglsn.com/api/request/';
        }
        return 'https://apibeta.klyglsn.com/api/request/';
    }

    /**
     * sendRequest
     *
     * @param  string $endpoint
     * @param  array $params
     * @param  string $method
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendRequest($endpoint, $params = [], $method = 'GET')
    {
        try {
            return (new GuzzleHttpClient([
                'base_uri' => $this->url(),
                'headers' =>
                [
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$this->apiKey}"
                ]
            ]))->request(
                $method,
                $endpoint,
                [
                    'debug'   => true,
                    'body' => json_encode($params)
                ],

            );
        } catch (GuzzleException $e) {
            throw new ApiException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * saveRecipient
     *
     * @param  array $params
     * @return Response
     */
    public function saveRecipient($params): Response
    {
        return (new Recipient($this))->fill(
            $params
        )->post();
    }

    /**
     * saveIntegrationShipment
     *
     * @param  array $params
     * @return Response
     */
    public function saveIntegrationShipment($params): Response
    {
        return (new IntegrationShipment($this))->fill(
            $params
        )->post();
    }

    /**
     * cancelPickupAndDelivery
     *
     * @param  array $params
     * @return Response
     */
    public function cancelPickupAndDelivery($params): Response
    {
        return (new PickupAndDelivery($this))->fill(
            $params
        )->post();
    }

    /**
     * getCorporateShipmentsStatus
     *
     * @param  array $params
     * @return Response
     */
    public function getCorporateShipmentsStatus($params): Response
    {
        return (new CorporateShipmentsStatus($this))->fill(
            $params
        )->post();
    }

    /**
     * getCorporateCustomerCargoEventTypes
     *
     * @param  array $params
     * @return Response 
     */
    public function getCorporateCustomerCargoEventTypes($params): Response
    {
        return (new CorporateCustomerCargoEventTypes($this))->fill(
            $params
        )->post();
    }

    /**
     * getDocumentForHistory
     *
     * @param  array $params
     * @return Response
     */
    public function getDocumentForHistory($params): Response
    {
        return (new DocumentForHistory($this))->fill(
            $params
        )->post();
    }
}
