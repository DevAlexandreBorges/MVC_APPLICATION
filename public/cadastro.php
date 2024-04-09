<?php

use controller\RouteController;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="<?= RouteController::RootRoute(); ?>/public/style.css">
    <link rel="stylesheet" href="<?= RouteController::RootRoute(); ?>/public/cadastro.css">
</head>


<div id="" class="formsCadastro">
    <form action="<?= ($param["type"] == 1) ? RouteController::RootRoute()."/produtos/cadastrar/salvar" : (($param["type"] == 2) ? RouteController::RootRoute()."/produtos/cadatrar/editar" : RouteController::RootRoute()."/404"); ?>" method="post" id="Cadastro">
        <h1>Cadastro de produtos</h1>
        <div class="boxfixing">
        <div class="input1">
            <label  for="">Nome:</label>
            <input  id="nameInput" class="inputNameDescricao" type="text" name="nome">
            <label for="">Descrição:</label>
            <input id="descriptionInput"class="inputNameDescricao" type="text" name="descricao">
        </div>
        <div class="input2">
            <label  for="">Quantidade:</label>
            <input id="quantInput" type="number" name="quantidade">
            <label for="">Valor:</label>
            <input  id="valueInput" type="number" name="preco">
        </div>
        <div class="input3"> 
            <label for="">Categoria:</label>
            <select  id="selectInput" name="categoria" id="">
            <option selected></option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
            </select>
        </div>
        <div class="btns">
            <?php 
                if($param["type"] == 1){
            ?>
                <input  id="btnSalvar"type="submit" value="Salvar">
            <?php 
                }
            ?>
            <?php 
                if($param["type"] == 2){
            ?>
                <input id="btnEditar" type="submit" value="Editar">
            <?php 
                }
            ?>
            <a  id="btnCancelar" href="<?= RouteController::RootRoute(); ?>/produtos/lista" >Cancelar</a>        
        </div>
        </div>
    </form>
</div>