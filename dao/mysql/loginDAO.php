<?php

namespace dao\mysql;

use generic\MysqlFactory;
use dao\interface\ILoginDAO;

class LoginDAO extends MysqlFactory implements ILoginDAO {

    public function buscarUserLogin($user){
        
        $sql = "SELECT id, nome, senha FROM usuarios WHERE nome =  :name";
        $param = array(
            "name" => $user
        );
        $retorno = $this->banco->executar($sql,$param);
        return $retorno;

    }

    public function buscarUser($id)
    {
        
    }

}