
<?php
class AgenciaApi extends CorreiosApiClient
{
    public function getAgencias($params)
    {
        $query = http_build_query($params);
        return $this->get("/agencia/v1/unidades?{$query}");
    }
}
?>
