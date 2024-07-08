
<?php
use PHPUnit\Framework\TestCase;
use CorreiosPhpSdk\PrePostagemApi;

class PrePostagemApiTest extends TestCase
{
    public function testCriarPrePostagem()
    {
        $client = $this->getMockBuilder(PrePostagemApi::class)
                       ->setConstructorArgs(['http://fakeapi.com', 'fake_token'])
                       ->setMethods(['post'])
                       ->getMock();
        $data = ['destinatario' => 'John Doe'];
        $client->expects($this->once())
               ->method('post')
               ->with('/prepostagem/v1', $data)
               ->willReturn(['status' => 'success']);

        $this->assertEquals(['status' => 'success'], $client->criarPrePostagem($data));
    }
}
?>
