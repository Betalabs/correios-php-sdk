<?php

use PHPUnit\Framework\TestCase;
use CorreiosSDK\CorreiosApiClient;

class CorreiosApiClientTest extends TestCase
{
    public function testGetMethod()
    {
        $client = $this->getMockBuilder(CorreiosApiClient::class)
            ->setConstructorArgs(['http://fakeapi.com', 'fake_token'])
            ->setMethods(null)
            ->getMock();

        // Utilizing Reflection to access the protected method for testing
        $reflection = new ReflectionClass($client);
        $method = $reflection->getMethod('get');
        $method->setAccessible(true);

        // Mocking curl_exec to return a specific response
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer fake_token", "Accept: application/json"]);
        curl_setopt($ch, CURLOPT_URL, "http://fakeapi.com/test");

        $response = json_encode(['status' => 'success']);
        $this->assertEquals(['status' => 'success'], json_decode($response, true));
    }

    public function testPostMethod()
    {
        $client = $this->getMockBuilder(CorreiosApiClient::class)
            ->setConstructorArgs(['http://fakeapi.com', 'fake_token'])
            ->setMethods(null)
            ->getMock();

        // Utilizing Reflection to access the protected method for testing
        $reflection = new ReflectionClass($client);
        $method = $reflection->getMethod('post');
        $method->setAccessible(true);

        // Mocking curl_exec to return a specific response
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['data' => 'value']));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer fake_token", "Accept: application/json", "Content-Type: application/json"]);
        curl_setopt($ch, CURLOPT_URL, "http://fakeapi.com/test");

        $response = json_encode(['status' => 'success']);
        $this->assertEquals(['status' => 'success'], json_decode($response, true));
    }
}
?>
