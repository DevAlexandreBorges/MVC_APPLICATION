<?php

namespace service;

use dao\mysql\LoginDAO;

class LoginService extends loginDAO {

    public static function session_start(){
        try {
            if(!isset($_SESSION)){
                session_start();
                return true;
            }
            return false;
            } catch (\Throwable $th) {
            }
    }

    public static function logued(){
        self::session_start();
        try {
            if(isset($_SESSION[SESSION_USERID]) && isset($_SESSION[SESSION_USERNAME]) && $_SESSION[SESSION_USERID] != "" && $_SESSION[SESSION_USERNAME] != ""){
                return true;
            }
            return false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function sessionLogout(){
        self::session_start();
        try {
            session_unset();
            session_destroy();
        } catch (\Throwable $th) {
        }
    }

    public function buscarUser($user){
        $retorno = parent::buscarUserLogin($user);
        return $retorno;
    }

}