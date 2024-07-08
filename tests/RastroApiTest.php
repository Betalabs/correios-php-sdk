
<?php
use PHPUnit\Framework\TestCase;
use CorreiosPhpSdk\RastroApi;

class RastroApiTest extends TestCase
{
    public function testGetRastreamento()
    {
        $client = $this->getMockBuilder(RastroApi::class)
                       ->setConstructorArgs(['http://fakeapi.com', 'fake_token'])
                       ->setMethods(['get'])
                       ->getMock();
        $client->expects($this->once())
               ->method('get')
               ->with('/rastro/v1/objetos/SS123456789BR')
               ->willReturn(['status' => 'Entregue']);

        $this->assertEquals(['status' => 'Entregue'], $client->getRastreamento('SS123456789BR'));
    }
}
?>
