<?php

use controller\RouteController;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= RouteController::RootRoute(); ?>/public/style.css">
    <link rel="stylesheet" href="<?= RouteController::RootRoute(); ?>/public/login.css">
</head>

<body>

<div id="formulario1" class="forms">
    <form class="inputforms" action="./loginProcess" method="post">
        <h2> LOGIN</h2>
        <div class="input1">
            <input type="text" name="user" placeholder="Usuario">
        </div>
        <div  class="input2">
            <input type="password" name="pass" placeholder="Senha">
        </div>
        <div class="inputbutton">
            <input id="buttonColor" type="submit" value="Login">
        </div>
    </form>
</div>
</body>
</html>