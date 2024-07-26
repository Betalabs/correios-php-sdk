<?php


use PHPUnit\Framework\TestCase;
use CorreiosSDK\PrazoApi;

class PrazoApiTest extends TestCase
{
    public function testGetPrazo()
    {
        $client = $this->getMockBuilder(PrazoApi::class)
                       ->setConstructorArgs(['http://fakeapi.com', 'fake_token'])
                       ->setMethods(['get'])
                       ->getMock();
        $client->expects($this->once())
               ->method('get')
               ->with('/prazo/v1/nacional/03220?cepOrigem=70002900&cepDestino=05311900')
               ->willReturn(['prazo' => '3']);

        $this->assertEquals(['prazo' => '3'], $client->getPrazo('03220', '70002900', '05311900'));
    }
}
?>
