<?php

namespace Fused\Extend;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;

class Extend
{
    private $apiKey;

    private $client;

    private $sandbox = false;

    private $storeId;

    private $version;
    
    public function __construct(string $apiKey, string $storeId, bool $sandbox = false, string $version = '2020-08-01')
    {
        $this->apiKey = $apiKey;
        $this->sandbox = $sandbox;
        $this->setStoreId($storeId);
        $this->version = $version;

        $this->setClient();
    }

    public function delete(string $endpoint)
    {
        return $this->decodeResponse(
            $this->client->delete($this->replaceStoreId($endpoint))
        );
    }

    public function get(string $endpoint, array $params = [])
    {
        return $this->decodeResponse(
            $this->client->get($this->replaceStoreId($endpoint), [
                'query' => $params,
            ])
        );
    }

    public function post(string $endpoint, array $data)
    {
        return $this->decodeResponse(
            $this->client->post($this->replaceStoreId($endpoint), [
                RequestOptions::JSON => $data,
            ])
        );
    }

    public function put(string $endpoint, array $data)
    {
        return $this->decodeResponse(
            $this->client->put($this->replaceStoreId($endpoint), [
                RequestOptions::JSON => $data,
            ])
        );
    }

    public function disableSandbox()
    {
        $this->sandbox = false;

        $this->setClient();
    }

    public function enableSandbox()
    {
        $this->sandbox = true;

        $this->setClient();
    }

    public function setStoreId(string $storeId)
    {
        $this->storeId = $storeId;
        
        $this->setClient();
    }

    private function setClient()
    {
        $this->client = new Client([
            'base_uri' => $this->sandbox ? 'https://api-demo.helloextend.com' : 'https://api.helloextend.com',
            'headers' => [
                'Accept' => 'application/json; version=' . $this->version,
                'Content-Type' => 'application/json',
                'X-Extend-Access-Token' => $this->apiKey,
            ],
        ]);
    }

    private function decodeResponse(Response $response)
    {
        return json_decode((string) $response->getBody());
    }

    private function replaceStoreId(string $endpoint)
    {
        return preg_replace('/({store_?[i|I]{1}[d|D]{1}})/', $this->storeId, $endpoint);
    }
}
