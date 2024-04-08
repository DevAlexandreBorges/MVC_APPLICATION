<?php

namespace service;

use dao\mysql\LoginDAO;

class LoginService extends loginDAO {

    public function buscarUser($user){
        $retorno = parent::buscarUserLogin($user);
        return $retorno;
    }

}