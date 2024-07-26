<?php
namespace CorreiosSDK;

class RastroApi extends CorreiosApiClient
{
    public function getRastreamento($codigo)
    {
        return $this->get("/rastro/v1/objetos/{$codigo}");
    }
}
?>
