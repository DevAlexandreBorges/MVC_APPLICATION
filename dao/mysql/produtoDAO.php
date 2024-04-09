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

    public function getProduto($id){
        
    }

    public function salvarNovoProduto($nome, $descricao, $quantidade, $preco, $categoria){
        $sql  = "INSERT INTO produtos (nome, descricao, quantidade, preco, categoria) VALUES ( :nome , :descricao , :quant , :preco , :cat )";
        $param = array(
            "nome" => $nome,
            "descricao" => $descricao,
            "quant" => $quantidade,
            "preco" => $preco,
            "cat" => $categoria
        );
        $this->banco->executar($sql, $param);
    }
}