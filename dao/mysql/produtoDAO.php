<?php

namespace dao\mysql;

use dao\interface\IProdutoDAO;
use generic\MysqlFactory;

class ProdutoDAO extends MysqlFactory implements IProdutoDAO{

    public function listarProdutos()
    {
        $sql = "SELECT id, nome, descricao, quantidade, preco, categoria FROM produtos";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }

}