<?php
namespace CorreiosSDK;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CorreiosApiClient
{
    private $baseUrl;
    private $token;
    protected $client;

    public function __construct($baseUrl, $token)
    {
        $this->baseUrl = $baseUrl;
        $this->token = $token;
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept' => 'application/json'
            ]
        ]);
    }

    protected function get($endpoint)
    {
        try {
            $response = $this->client->get($endpoint);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            throw new \Exception('GET request failed: ' . $e->getMessage());
        }
    }

    protected function post($endpoint, $data)
    {
        try {
            $response = $this->client->post($endpoint, [
                'json' => $data
            ]);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            throw new \Exception('POST request failed: ' . $e->getMessage());
        }
    }
}
?>
