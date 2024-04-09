<?php

namespace controller;

use service\LoginService;
use service\ProdutoService;
use view\CadastrarView;
use view\ProdutosView;

class ProdutoController
{

    public function listarProdutos()
    {
        //Verificar se está logado
        if (!LoginService::logued()) {
            header("location: ./");
        }

        $view = new ProdutosView();
        try {
            $service = new ProdutoService();
            $retorno = $service->listarProdutos();
            if(isset($_GET['error']) && $_GET['error'] == ERROR_CONNECT_DB)
                header("location: " . RouteController::RootRoute() . "/produtos/lista");
        } catch (\Throwable $th) {
            if(!isset($_GET['error']) && $_GET['error'] != ERROR_CONNECT_DB)
                header("location: " . RouteController::RootRoute() . "/produtos/lista?error=" . ERROR_CONNECT_DB);
            else
                $retorno = array();
        }
        $view->listarProdutos($retorno);
    }

    public function cadastrarProduto()
    {
        //Verificar se está logado
        if (!LoginService::logued()) {
            header("location: ./");
        }

        $view = new CadastrarView();
        $view->cadastrarProduto();
    }

    public function editarProduto()
    {
        //Verificar se está logado
        if (!LoginService::logued()) {
            header("location: ./");
        }

        //Verifica se exite um id
        if (!isset($_GET['id']) | $_GET['id'] == "") {
            header("location: " . RouteController::RootRoute() . "/produtos/lista");
        }

        $view = new CadastrarView();
        try {
            $service = new ProdutoService();
            $return = $service->getProduto($_GET['id']);
        } catch (\Throwable $th) {
            header("location: " . RouteController::RootRoute() . "/produtos/lista?error=" . ERROR_CONNECT_DB);
        }
        $view->editarProduto($return);
    }

    public function salvarNovoProduto()
    {

        if (!(isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["quantidade"]) && isset($_POST["preco"]) && isset($_POST["categoria"]))) {
            header("location: " . RouteController::RootRoute() . "/produtos/cadastrar");
            return;
        }

        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $quantidade = $_POST["quantidade"];
        $preco = $_POST["preco"];
        $categoria = $_POST["categoria"];

        //Verifica se preenchido
        if ($nome == "" | $descricao == "" | $quantidade == "" | $preco == "" | $categoria == "") {
            header("location: " . RouteController::RootRoute() . "/produtos/cadastrar?error=" . ERROR_FORM_IMCOMPLETO . "&nome=" . $nome . "&desc=" . $descricao . "&quant=" . $quantidade . "&preco=" . $preco . "&cat=" . $categoria);
            return;
        }

        //Se válido
        try {
            $service = new ProdutoService();
            $service->salvarNovoProduto($nome, $descricao, $quantidade, $preco, $categoria);
        } catch (\Throwable $th) {
            header("location: " . RouteController::RootRoute() . "/produtos/lista?error=" . ERROR_CONNECT_DB);
        }
        header("location: " . RouteController::RootRoute() . "/produtos/lista?sucessCreate");
    }

    public function salvarEdicaoProduto()
    {
        if (!(isset($_POST["id"]) && isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["quantidade"]) && isset($_POST["preco"]) && isset($_POST["categoria"]))) {
            header("location: " . RouteController::RootRoute() . "/produtos/editar");
            return;
        }

        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $quantidade = $_POST["quantidade"];
        $preco = $_POST["preco"];
        $categoria = $_POST["categoria"];

        //Verifica se preenchido
        if ($id == "" | $nome == "" | $descricao == "" | $quantidade == "" | $preco == "" | $categoria == "") {
            header("location: " . RouteController::RootRoute() . "/produtos/edita?error=" . ERROR_FORM_IMCOMPLETO . "&nome=" . $nome . "&desc=" . $descricao . "&quant=" . $quantidade . "&preco=" . $preco . "&cat=" . $categoria);
            return;
        }

        //Se válido
        try {
            $service = new ProdutoService();
            $service->salvarEdicaoProduto($id, $nome, $descricao, $quantidade, $preco, $categoria);
        } catch (\Throwable $th) {
            header("location: " . RouteController::RootRoute() . "/produtos/lista?error=" . ERROR_CONNECT_DB);
        }
        header("location: " . RouteController::RootRoute() . "/produtos/lista?sucessEdit");
    }

    public function excluirProduto()
    {
        if (!(isset($_GET["id"]) | $_GET["id"] == "")) {
            header("location: " . RouteController::RootRoute() . "/produtos/lista?error=" . ERROR_EXCLUIR);
            return;
        }

        $id = $_GET["id"];

        //Se válido
        try {
            $service = new ProdutoService();
            $service->excluirProduto($id);
        } catch (\Throwable $th) {
            header("location: " . RouteController::RootRoute() . "/produtos/lista?error=" . ERROR_CONNECT_DB);
        }
        header("location: " . RouteController::RootRoute() . "/produtos/lista?sucessDelete");
    }
}
