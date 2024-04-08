<?php

namespace controller;

use service\LoginService;
use view\loginView;

class LoginController {

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


    public function login(){
        if(LoginController::sessionLogout()){
            header("location: produtos/lista");
            return;
        }

        $view = new loginView();
        $view->login();
    }

    public function validarLogin(){
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $service = new LoginService();
        $return = $service->buscarUser($user);

        if(sizeof($return) > 0 && $return[0]["nome"] === $user && $return[0]["senha"] === $pass){
            //Logado com sucesso
            if(!LoginController::session_start()){
                LoginController::sessionLogout();
                session_start();
            }

            $_SESSION[SESSION_USERID] = $return[0]["id"];
            $_SESSION[SESSION_USERNAME] = $return[0]["nome"];
            header("location: produtos/lista");
            return;
        }

        //Falha no login
        LoginController::sessionLogout();
        header("location: login?error=1");
    }

    public function logout(){
        LoginController::sessionLogout();
        header("location: login");
    }

}