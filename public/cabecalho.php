<?php

use controller\RouteController;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="<?= RouteController::RootRoute(); ?>/public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= RouteController::RootRoute(); ?>/public/style.css">
    <script src="<?= RouteController::RootRoute(); ?>/public/bootstrap/css/bootstrap.js"></script>
    <script src="<?= RouteController::RootRoute(); ?>/public/msgBox.js"></script>
</head>

<body>
    <nav class="menu navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= RouteController::RootRoute() ?>/produtos/lista">
            <img class="menu-logo" src="<?= RouteController::RootRoute() ?>/public/imgs/Logo.png">
            MVC Application
        </a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?= RouteController::RootRoute() ?>/produtos/lista">Lista de produtos</a>
                <a class="nav-item nav-link" href="<?= RouteController::RootRoute() ?>/logout">Sair</a>
            </div>
        </div>
    </nav>