<?php

namespace CorreiosPhpSdk;

class PrecoApi extends CorreiosApiClient
{
    public function getPreco($params)
    {
        $query = http_build_query($params);
        return $this->get("/preco/v1?{$query}");
    }
}
?>
