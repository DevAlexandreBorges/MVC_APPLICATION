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

<?php
$nome = ($param["type"] == 2) ?  $param["produto"][0]["nome"] : ((isset($_GET['nome'])) ? $_GET['nome'] : "");
$descricao = ($param["type"] == 2) ?  $param["produto"][0]["descricao"] : ((isset($_GET['desc'])) ? $_GET['desc'] : "");
$quantidade = ($param["type"] == 2) ?  $param["produto"][0]["quantidade"] : ((isset($_GET['quant'])) ? $_GET['quant'] : "");
$preco = ($param["type"] == 2) ?  $param["produto"][0]["preco"] : ((isset($_GET['preco'])) ? $_GET['preco'] : "");
$categoria = ($param["type"] == 2) ?  $param["produto"][0]["categoria"] : ((isset($_GET['cat'])) ? $_GET['cat'] : "");
?>

<div id="" class="formsCadastro">
    <form action="<?= ($param["type"] == 1) ? RouteController::RootRoute() . "/produtos/cadastrar/salvar" : (($param["type"] == 2) ? RouteController::RootRoute() . "/produtos/editar/salvar" : RouteController::RootRoute() . "/404"); ?>" method="post" id="Cadastro">
        <h1>Cadastro de produtos</h1>
        <div class="boxfixing">
            <?php
            if ($param["type"] == 2) {
            ?>
                <input name="id" value="<?= $param["produto"][0]["id"] ?>" readonly hidden>
            <?php
            }
            ?>
            <div class="input1">
                <label for="">Nome:</label>
                <input id="nameInput" class="inputNameDescricao" type="text" name="nome" value="<?= $nome  ?>" required>
                <label for="">Descrição:</label>
                <input id="descriptionInput" class="inputNameDescricao" type="text" name="descricao" value="<?= $descricao ?>" required>
            </div>
            <div class="input2">
                <label for="">Quantidade:</label>
                <input id="quantInput" type="number" name="quantidade" value="<?= $quantidade ?>" required>
                <label for="">Valor:</label>
                <input id="valueInput" type="number" step="0.01" name="preco" value="<?= $preco ?>" required>
            </div>
            <div class="input3">
                <label for="">Categoria:</label>
                <input id="selectInput" class="inputCategoria" type="text" name="categoria" value="<?= $categoria ?>" required>
                <!-- <select  id="selectInput" name="categoria" id=""  required>
            <option selected></option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
            </select>
            <?php /* Colocar value no select do form */ echo "<script>document.getElementById('selectInput').value = " . $categoria . "</script>" ?> -->
            </div>
            <div class="btns">
                <?php
                if ($param["type"] == 1) {
                ?>
                    <input id="btnSalvar" type="submit" value="Salvar">
                <?php
                }
                ?>
                <?php
                if ($param["type"] == 2) {
                ?>
                    <input id="btnEditar" type="submit" value="Editar">
                <?php
                }
                ?>
                <a id="btnCancelar" href="<?= RouteController::RootRoute(); ?>/produtos/lista">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php
//Menssagens
if (isset($_GET['error']) && $_GET['error'] == "") {
    echo "<script>
        window.onload = function(){ 
            var msgErro = new MsgBox();
            msgExcluir.showInLine({_idName: 'msgError', _type: msgExcluir.SET_TYPE_TEXT('" . substr(RouteController::RootRoute(), 1) . "'), _menssagem: 'Ocorreu um erro não indentificdo.<br>Se o problema persistir, contacte um adminstrador do sistema.', _title: 'Erro', _btnOkName: 'Ok', _btnFecharView: false});
        }
        </script>";
}

if (isset($_GET['error']) && $_GET['error'] == ERROR_FORM_IMCOMPLETO) {
    echo "<script>
        window.onload = function(){ 
            var msgIncompleto = new MsgBox();
            msgIncompleto.showInLine({_idName: 'msgIncomplet', _type: msgIncompleto.SET_TYPE_TEXT('" . substr(RouteController::RootRoute(), 1) . "'), _title: 'Preencha todos os campos!', _btnOkName: 'Ok', _btnFecharView: false});
        }
        </script>";
}

if (isset($_GET['error']) && $_GET['error'] == ERROR_EXCLUIR) {
    echo "<script>
        window.onload = function(){ 
            var msgExcluir = new MsgBox();
            msgExcluir.showInLine({_idName: 'msgDelete', _type: msgExcluir.SET_TYPE_TEXT('" . substr(RouteController::RootRoute(), 1) . "'), _menssagem: 'Ocorreu um erro ao excluir, se o problema persistir contacte um adminstrador.', _title: 'Erro ao excluir', _btnOkName: 'Ok', _btnFecharView: false});
        }
        </script>";
}

?>