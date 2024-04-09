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
        $sql  = "SELECT id, nome, descricao, quantidade, preco, categoria FROM produtos WHERE id = :id ";
        $param = array(
            "id" => $id
        );
        return $this->banco->executar($sql, $param);
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

    public function salvarEdicaoProduto($id, $nome, $descricao, $quantidade, $preco, $categoria){
        $sql  = "UPDATE produtos SET nome = :nome ,descricao = :descricao ,quantidade = :quant ,preco = :preco ,categoria = :cat  WHERE id = :id";
        $param = array(
            "id" => $id,
            "nome" => $nome,
            "descricao" => $descricao,
            "quant" => $quantidade,
            "preco" => $preco,
            "cat" => $categoria
        );
        $this->banco->executar($sql, $param);
    }

    public function excluirProduto($id){
        $sql  = "DELETE FROM produtos WHERE id = :id";
        $param = array(
            "id" => $id
        );
        $this->banco->executar($sql, $param);
    }
}