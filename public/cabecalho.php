<?php

use controller\RouteController;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="<?= RouteController::RootRoute(); ?>/public/style.css">
</head>
<body>
    <!-- Cabeçalho -->
    <nav>
        <img >
        <ul>
            <a href="<?= RouteController::RootRoute()?>/produtos/lista">Lista de produtos</a>
            <a href="<?= RouteController::RootRoute()?>/logout">Sair</a>
        </ul>
    </nav>