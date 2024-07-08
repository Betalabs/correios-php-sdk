
<?php
class CepApi extends CorreiosApiClient
{
    public function getEndereco($cep)
    {
        return $this->get("/cep/v1/enderecos/{$cep}");
    }
}
?>
