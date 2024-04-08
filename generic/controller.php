<?php

namespace generic;

class Controller {

    private static $intance;
    private $arrayRotas = [];

    private function __construct()
    {
        $this->arrayRotas = [
            "login" => new Acao("controller\loginController","login"),
            "loginProcess" => new Acao("controller\loginController", "validarLogin"),
            "logout" => new Acao("controller\loginController", "logout"),
            "produtos" => new Acao("controller\produtoController", "listarProdutos"),
            "produtos/" => new Acao("controller\\routeController", "normalizeRoute"),
            "produtos/lista" => new Acao("controller\produtoController", "listarProdutos"),
            "produtos/cadastrar" => new Acao("controller\produtoController", "cadastrarProduto")
        ];
    }

    public static function getInstance(){
        if(self::$intance == null){
            self::$intance = new Controller();
        }
        return self::$intance;
    }

    public function verificarCaminhoRota($rota){
        if(isset($this->arrayRotas[$rota])){
            $this->arrayRotas[$rota]->executar();
            return;
        }
        
        //Não existe
        include "public/404.html";
    }


}