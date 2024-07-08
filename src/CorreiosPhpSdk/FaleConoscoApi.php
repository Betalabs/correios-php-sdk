<?php

namespace CorreiosPhpSdk;

class FaleConoscoApi extends CorreiosApiClient
{
    public function criarPedidoInformacao($data)
    {
        return $this->post("/pedido-informacao/v1", $data);
    }

    public function consultarPedidoInformacao($id)
    {
        return $this->get("/pedido-informacao/v1/{$id}");
    }
}
?>
