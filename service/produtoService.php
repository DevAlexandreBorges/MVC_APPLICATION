<?php

namespace service;

use dao\mysql\ProdutoDAO;

class ProdutoService extends ProdutoDAO{

    public function listarProdutos(){
        $retorno = parent::listarProdutos();
        return $retorno;
    }

}