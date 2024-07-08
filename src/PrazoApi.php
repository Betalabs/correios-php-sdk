
<?php
class PrazoApi extends CorreiosApiClient
{
    public function getPrazo($coproduto, $cepOrigem, $cepDestino)
    {
        return $this->get("/prazo/v1/nacional/{$coproduto}?cepOrigem={$cepOrigem}&cepDestino={$cepDestino}");
    }
}
?>
