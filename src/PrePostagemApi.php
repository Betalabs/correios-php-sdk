
<?php
class PrePostagemApi extends CorreiosApiClient
{
    public function criarPrePostagem($data)
    {
        return $this->post("/prepostagem/v1", $data);
    }

    public function emitirRotulo($data)
    {
        return $this->post("/prepostagem/v1/rotulo", $data);
    }

    public function emitirDeclaracaoConteudo($data)
    {
        return $this->post("/prepostagem/v1/declaracao", $data);
    }

    public function emitirAR($data)
    {
        return $this->post("/prepostagem/v1/aviso-recebimento", $data);
    }

    public function consultarObjeto($codigo)
    {
        return $this->get("/prepostagem/v1/objetos/{$codigo}");
    }

    public function cancelarPrePostagem($codigo)
    {
        return $this->post("/prepostagem/v1/cancelar/{$codigo}", []);
    }

    public function postagemLote($data)
    {
        return $this->post("/prepostagem/v1/lote", $data);
    }

    public function gerarRotuloPrePostagem($data)
    {
        return $this->post("/prepostagem/v1/rotulo-pre", $data);
    }
}
?>
