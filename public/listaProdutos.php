<?php

use controller\RouteController;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="<?= RouteController::RootRoute(); ?>/public/style.css">
</head>

<div id="">
    <a href="<?= RouteController::RootRoute(); ?>/produtos/cadastrar">Cadastrar</a>
    <table>
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php
               if(sizeof($param["listaProdutos"]) == 0){
            ?>
                <tr>
                    <td colspan="8">Sem produtos cadastrados!</td>
                </tr>
            <?php
               }else{
                foreach($param["listaProdutos"] as $v) {
            ?>
                <tr>
                    <td><?= $v['id'] ?></td>
                    <td><?= $v['nome'] ?></td>
                    <td><?= $v['descricao'] ?></td>
                    <td><?= $v['quantidade'] ?></td>
                    <td><?= $v['preco'] ?></td>
                    <td><?= $v['categoria'] ?></td>
                    <td><a href="<?= RouteController::RootRoute(); ?>/produtos/editar?id=<?= $v['id'] ?>">Editar</a></td>
                    <td><a href="<?= RouteController::RootRoute(); ?>/produtos/excluir?id=<?= $v['id'] ?>">Excluir</a></td>
                </tr>
            <?php 
                }
            }
            ?>
        </tbody>
    </table>
</div>