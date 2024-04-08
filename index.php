<?php

use generic\Controller;

include_once "generic/autoLoad.php";

const SESSION_USERID = "userId";
const SESSION_USERNAME = "userName";


if(isset($_GET['param'])){
    $controller = Controller::getInstance();
    $controller->verificarCaminhoRota($_GET["param"]);
}else{
    header("location: login");
    
    //Teste de pagina
    //include "public/cadastroView.php";
}
