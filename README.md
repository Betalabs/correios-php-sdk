# Correios SDK PHP

Este SDK PHP permite a integração com as APIs dos Correios, incluindo operações de consulta de CEP, agências, preços, prazos, rastreamento de objetos, pré-postagem e pedidos de informação (Fale Conosco).

## Instalação

1. Faça o download do arquivo ZIP e extraia o conteúdo.
2. Navegue até o diretório do projeto e execute o comando abaixo para instalar as dependências:
composer install

## Estrutura do projeto
```bash

project-root/
├── src/
│   ├── CorreiosApiClient.php
│   ├── CepApi.php
│   ├── AgenciaApi.php
│   ├── PrecoApi.php
│   ├── PrazoApi.php
│   ├── RastroApi.php
│   ├── PrePostagemApi.php
│   ├── FaleConoscoApi.php
├── tests/
│   ├── CorreiosApiClientTest.php
│   ├── CepApiTest.php
│   ├── AgenciaApiTest.php
│   ├── PrecoApiTest.php
│   ├── PrazoApiTest.php
│   ├── RastroApiTest.php
│   ├── PrePostagemApiTest.php
│   ├── FaleConoscoApiTest.php
├── composer.json
└── phpunit.xml

```

## Utilização
Para usar o SDK, primeiro crie uma instância da classe CorreiosApiClient com a URL base da API e o token de autenticação.

```
require 'vendor/autoload.php';
$baseUrl = 'https://api.correios.com.br';
$token = 'seu_token_aqui';
$cepApi = new CepApi($baseUrl, $token);
```

## Exemplo de Uso

Consultar Endereço por CEP
```
$resultadoCep = $cepApi->getEndereco('01001000');
print_r($resultadoCep);
```

Consultar Agências

```
$agenciaApi = new AgenciaApi($baseUrl, $token);
$params = ['municipio' => 'Sao Paulo', 'uf' => 'SP'];
$resultadoAgencia = $agenciaApi->getAgencias($params);
print_r($resultadoAgencia);
```

Consultar Preço

```
$precoApi = new PrecoApi($baseUrl, $token);
$params = ['cepOrigem' => '70002900', 'cepDestino' => '05311900', 'peso' => '1'];
$resultadoPreco = $precoApi->getPreco($params);
print_r($resultadoPreco);
```

Consultar Prazo
```
$prazoApi = new PrazoApi($baseUrl, $token);
$resultadoPrazo = $prazoApi->getPrazo('03220', '70002900', '05311900');
print_r($resultadoPrazo);
```

Rastrear Objeto
```
$rastroApi = new RastroApi($baseUrl, $token);
$resultadoRastro = $rastroApi->getRastreamento('SS123456789BR');
print_r($resultadoRastro);
```

Criar Pré-Postagem
```

$prePostagemApi = new PrePostagemApi($baseUrl, $token);
$data = ['destinatario' => 'John Doe'];
$resultadoPrePostagem = $prePostagemApi->criarPrePostagem($data);
print_r($resultadoPrePostagem);
```

Criar Pedido de Informação (Fale Conosco)

```
$faleConoscoApi = new FaleConoscoApi($baseUrl, $token);
$data = ['mensagem' => 'Gostaria de saber sobre...'];
$resultadoPedidoInformacao = $faleConoscoApi->criarPedidoInformacao($data);
print_r($resultadoPedidoInformacao);
```
