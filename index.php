<?php

use generic\Controller;

include_once "generic/autoLoad.php";

if (isset($_GET["param"])) {
    $controller = Controller::getInstance();
    $controller->verificarCaminhoRota($_GET["param"]);
}
