<?php

namespace service;

use dao\mysql\ProdutoDAO;

class ProdutoService extends ProdutoDAO{

    public function listarProdutos(){
        $retorno = parent::listarProdutos();
        return $retorno;
    }

    public function getProduto($id){
        return parent::getProduto($id);
    }

    public function salvarNovoProduto($nome, $descricao, $quantidade, $preco, $categoria){
        parent::salvarNovoProduto($nome, $descricao, $quantidade, $preco, $categoria);
    }

    public function salvarEdicaoProduto($id, $nome, $descricao, $quantidade, $preco, $categoria){
        parent::salvarEdicaoProduto($id, $nome, $descricao, $quantidade, $preco, $categoria);
    }

    public function excluirProduto($id){
        parent::excluirProduto($id);
    }
}