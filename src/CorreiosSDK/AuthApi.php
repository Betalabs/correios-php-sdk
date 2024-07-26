<?php
namespace CorreiosSDK;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class AuthApi
{
    private $baseUrl;
    private $clientId;
    private $clientSecret;
    private $client;

    public function __construct($baseUrl, $clientId, $clientSecret)
    {
        $this->baseUrl = $baseUrl;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->client = new Client();
    }

    public function getToken()
    {
        $url = $this->baseUrl . '/oauth/token';
        $data = [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret
        ];

        try {
            $response = $this->client->post($url, [
                'form_params' => $data,
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ]
            ]);
            $responseData = json_decode($response->getBody(), true);

            if (isset($responseData['access_token'])) {
                return $responseData['access_token'];
            } else {
                throw new \Exception('Invalid response from token endpoint');
            }
        } catch (RequestException $e) {
            throw new \Exception('Failed to get token: ' . $e->getMessage());
        }
    }
}
?>
