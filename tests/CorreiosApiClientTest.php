
<?php
use PHPUnit\Framework\TestCase;

class CorreiosApiClientTest extends TestCase
{
    public function testGetMethod()
    {
        $client = $this->getMockBuilder(CorreiosApiClient::class)
                       ->setConstructorArgs(['http://fakeapi.com', 'fake_token'])
                       ->setMethods(['get'])
                       ->getMock();
        $client->expects($this->once())
               ->method('get')
               ->with('/test')
               ->willReturn(['status' => 'success']);

        $this->assertEquals(['status' => 'success'], $client->get('/test'));
    }

    public function testPostMethod()
    {
        $client = $this->getMockBuilder(CorreiosApiClient::class)
                       ->setConstructorArgs(['http://fakeapi.com', 'fake_token'])
                       ->setMethods(['post'])
                       ->getMock();
        $client->expects($this->once())
               ->method('post')
               ->with('/test', ['data' => 'value'])
               ->willReturn(['status' => 'success']);

        $this->assertEquals(['status' => 'success'], $client->post('/test', ['data' => 'value']));
    }
}
?>
