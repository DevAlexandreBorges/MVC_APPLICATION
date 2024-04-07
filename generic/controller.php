<?php

namespace generic;

class Controller {

    private static $intance;
    private $arrayRotas = [];

    private function __construct()
    {
        $this->arrayRotas = [
            "login" => new acao("controller/loginController.php","login"),
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
        //chamar tela 404...
    }


}