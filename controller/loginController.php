<?php

namespace controller;

use view\loginView;

class Controller {

    public function login(){
        $view = new loginView();
        $view->login();
    }

}