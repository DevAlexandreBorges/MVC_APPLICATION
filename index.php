<?php

use generic\Controller;

include_once "generic/autoLoad.php";

//Constantes
const SESSION_USERID = "userId";
const SESSION_USERNAME = "userName";

//Erros
const ERROR_INVALIDLOGIN = 1;
const ERROR_SALVAR = 2;
const ERROR_EDITAR = 4;
const ERROR_EXCLUIR = 5;
const ERROR_FORM_IMCOMPLETO = 6;
const ERROR_CONNECT_DB = 7;



if(isset($_GET['param'])){
    $controller = Controller::getInstance();
    $controller->verificarCaminhoRota($_GET["param"]);
}else{
    header("location: login");
    
    //Teste de pagina
    //include "public/cadastroView.php";
}
