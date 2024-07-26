
<?php
use PHPUnit\Framework\TestCase;

use CorreiosSDK\FaleConoscoApi;

class FaleConoscoApiTest extends TestCase
{
    public function testCriarPedidoInformacao()
    {
        $client = $this->getMockBuilder(FaleConoscoApi::class)
                       ->setConstructorArgs(['http://fakeapi.com', 'fake_token'])
                       ->setMethods(['post'])
                       ->getMock();
        $data = ['mensagem' => 'Gostaria de saber sobre...'];
        $client->expects($this->once())
               ->method('post')
               ->with('/pedido-informacao/v1', $data)
               ->willReturn(['status' => 'success']);

        $this->assertEquals(['status' => 'success'], $client->criarPedidoInformacao($data));
    }

    public function testConsultarPedidoInformacao()
    {
        $client = $this->getMockBuilder(FaleConoscoApi::class)
                       ->setConstructorArgs(['http://fakeapi.com', 'fake_token'])
                       ->setMethods(['get'])
                       ->getMock();
        $client->expects($this->once())
               ->method('get')
               ->with('/pedido-informacao/v1/123')
               ->willReturn(['status' => 'em andamento']);

        $this->assertEquals(['status' => 'em andamento'], $client->consultarPedidoInformacao(123));
    }
}
?>
