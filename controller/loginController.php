<?php

namespace controller;

use service\LoginService;
use view\loginView;

class LoginController {

    public function login(){
        if(LoginService::logued()){
            header("location: produtos/lista");
            return;
        }

        $view = new loginView();
        $view->login();
    }

    public function validarLogin(){
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        try {
            $service = new LoginService();
            $return = $service->buscarUser($user);
        } catch (\Throwable $th) {
            header("location: ".RouteController::RootRoute()."/login?error=".ERROR_CONNECT_DB);
        }

        if(sizeof($return) > 0 && $return[0]["nome"] === $user && $return[0]["senha"] === $pass){
            //Logado com sucesso
            if(!LoginService::session_start()){
                LoginService::sessionLogout();
                session_start();
            }

            $_SESSION[SESSION_USERID] = $return[0]["id"];
            $_SESSION[SESSION_USERNAME] = $return[0]["nome"];
            header("location: produtos/lista");
            return;
        }

        //Falha no login
        LoginService::sessionLogout();
        header("location: login?error=".ERROR_INVALIDLOGIN);
    }

    public function logout(){
        LoginService::sessionLogout();
        header("location: login");
    }

}