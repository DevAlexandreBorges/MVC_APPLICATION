<?php

namespace controller;

use service\ProdutoService;
use view\CadastrarView;
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

    public function cadastrarProduto(){
        //Verificar se está logado
        if(!LoginController::logued()){
            header("location: ./");
        }

        $view = new CadastrarView();
        $view->cadastrarProduto();
    }

    public function editarProduto(){
        //Verificar se está logado
        if(!LoginController::logued()){
            header("location: ./");
        }
        
        //Verifica se exite um id
        if(!isset($_GET['id']) | $_GET['id'] == ""){
            header("location: ".RouteController::RootRoute()."/produtos/lista");
        }

        $view = new CadastrarView();
        $view->editarProduto($_GET['id']);
    }

    public function salvarNovoProduto(){
        
        if(!(isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["quantidade"]) && isset($_POST["preco"]) && isset($_POST["categoria"]))){
            header("location: ".RouteController::RootRoute()."/produtos/cadastrar");
        }

        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $quantidade = $_POST["quantidade"];
        $preco = $_POST["preco"];
        $categoria = $_POST["categoria"];

        //Verifica se preenchido
        if($nome == "" | $descricao == "" | $quantidade == "" | $preco == "" | $categoria == ""){
            header("location: ".RouteController::RootRoute().`/produtos/cadastrar?error=1&nome={$nome}&desc={$descricao}&quant={$quantidade}&preco={$preco}&cat={$categoria}`);
        }

        //Se válido
        $service = new ProdutoService();
        $service->salvarNovoProduto($nome, $descricao, $quantidade, $preco, $categoria);
        header("location: ".RouteController::RootRoute()."/produtos/lista?sucessCreate");
    }

}