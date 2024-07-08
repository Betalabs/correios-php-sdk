
<?php
use PHPUnit\Framework\TestCase;

class PrecoApiTest extends TestCase
{
    public function testGetPreco()
    {
        $client = $this->getMockBuilder(PrecoApi::class)
                       ->setConstructorArgs(['http://fakeapi.com', 'fake_token'])
                       ->setMethods(['get'])
                       ->getMock();
        $client->expects($this->once())
               ->method('get')
               ->with('/preco/v1?cepOrigem=70002900&cepDestino=05311900&peso=1')
               ->willReturn(['valor' => '20.00']);

        $params = ['cepOrigem' => '70002900', 'cepDestino' => '05311900', 'peso' => '1'];
        $this->assertEquals(['valor' => '20.00'], $client->getPreco($params));
    }
}
?>
