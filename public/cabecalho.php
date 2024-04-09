<?php

use controller\RouteController;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="<?= RouteController::RootRoute(); ?>/public/style.css">
    <script src="<?= RouteController::RootRoute(); ?>/public/msgBox.js"></script>
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