<?php

namespace service;

use dao\mysql\ProdutoDAO;

class ProdutoService extends ProdutoDAO{

    public function listarProdutos(){
        $retorno = parent::listarProdutos();
        return $retorno;
    }

    public function getProduto($id){
        
    }

    public function salvarNovoProduto($nome, $descricao, $quantidade, $preco, $categoria){
        parent::salvarNovoProduto($nome, $descricao, $quantidade, $preco, $categoria);
    }
}