<?php

namespace controller;

use view\loginView;

class LoginController {

    public function login(){
        $view = new loginView();
        $view->login();
    }

}