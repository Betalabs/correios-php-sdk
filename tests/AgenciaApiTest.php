
<?php
use PHPUnit\Framework\TestCase;

class AgenciaApiTest extends TestCase
{
    public function testGetAgencias()
    {
        $client = $this->getMockBuilder(AgenciaApi::class)
                       ->setConstructorArgs(['http://fakeapi.com', 'fake_token'])
                       ->setMethods(['get'])
                       ->getMock();
        $client->expects($this->once())
               ->method('get')
               ->with('/agencia/v1/unidades?municipio=Sao+Paulo&uf=SP')
               ->willReturn([['id' => '00024419', 'nome' => 'AC CENTRAL DE SAO PAULO']]);

        $params = ['municipio' => 'Sao Paulo', 'uf' => 'SP'];
        $this->assertEquals([['id' => '00024419', 'nome' => 'AC CENTRAL DE SAO PAULO']], $client->getAgencias($params));
    }
}
?>
