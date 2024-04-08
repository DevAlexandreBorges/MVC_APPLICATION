<?php

namespace controller;

use service\ProdutoService;
use view\ProdutosView;

class ProdutoController {

    public function listarProdutos(){
        //Verificar se está logado
        if(!LoginController::logued()){
            header("location: ./");
        }

        $view = new ProdutosView();
        $service = new ProdutoService();
        $retorno = $service->listarProdutos();
        $view->listarProdutos($retorno);
    }

}