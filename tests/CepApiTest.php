
<?php
use PHPUnit\Framework\TestCase;

class CepApiTest extends TestCase
{
    public function testGetEndereco()
    {
        $client = $this->getMockBuilder(CepApi::class)
                       ->setConstructorArgs(['http://fakeapi.com', 'fake_token'])
                       ->setMethods(['get'])
                       ->getMock();
        $client->expects($this->once())
               ->method('get')
               ->with('/cep/v1/enderecos/01001000')
               ->willReturn(['cep' => '01001000', 'logradouro' => 'Praça da Sé']);

        $this->assertEquals(['cep' => '01001000', 'logradouro' => 'Praça da Sé'], $client->getEndereco('01001000'));
    }
}
?>
