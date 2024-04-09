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
            if (sizeof($param["listaProdutos"]) == 0) {
            ?>
                <?php if(isset($_GET['error']) && $_GET['error'] == ERROR_CONNECT_DB) { ?> 
                <tr>
                    <td colspan="8">Falha ao se comunicar com o banco!</td>
                </tr>
                <?php } else { ?>
                    <tr>
                    <td colspan="8">Sem produtos cadastrados!</td>
                </tr>
                <?php } ?>
                <?php
            } else {
                foreach ($param["listaProdutos"] as $v) {
                ?>
                    <tr>
                        <td><?= $v['id'] ?></td>
                        <td><?= $v['nome'] ?></td>
                        <td><?= $v['descricao'] ?></td>
                        <td><?= $v['quantidade'] ?></td>
                        <td><?= $v['preco'] ?></td>
                        <td><?= $v['categoria'] ?></td>
                        <td><a href="<?= RouteController::RootRoute(); ?>/produtos/editar?id=<?= $v['id'] ?>">Editar</a></td>
                        <td><a onclick="msgExcluir('<?= $v['id'] ?>', '<?= $v['nome'] ?>');">Excluir</a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php
//Menssagens
if (isset($_GET['error']) && $_GET['error'] == "") {
    echo "<script>
        window.onload = function(){ 
            var msgErro = new MsgBox();
            msgErro.showInLine({_idName: 'msgError', _type: msgErro.SET_TYPE_TEXT('" . substr(RouteController::RootRoute(), 1) . "'), _menssagem: 'Ocorreu um erro não indentificdo.<br>Se o problema persistir, contacte um adminstrador do sistema.', _title: 'Erro', _btnOkName: 'Ok', _btnFecharView: false});
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

if (isset($_GET['sucessDelete'])) {
    echo "<script>
        window.onload = function(){ 
            var msgSucessDel = new MsgBox();
            msgSucessDel.showInLine({_idName: '_msgSucessDel', _type: msgSucessDel.SET_TYPE_TEXT('" . substr(RouteController::RootRoute(), 1) . "'), _title: 'Exclusão concluida com sucesso!', _btnOkName: 'Ok', _onCloseAction: 'window.location.href = \"".RouteController::RootRoute()."/produtos/lista\";', _btnFecharView: false});
        }
        </script>";
}

if (isset($_GET['sucessEdit'])) {
    echo "<script>
        window.onload = function(){ 
            var msgSucessDel = new MsgBox();
            msgSucessDel.showInLine({_idName: '_msgSucessDel', _type: msgSucessDel.SET_TYPE_TEXT('" . substr(RouteController::RootRoute(), 1) . "'), _title: 'Conteudo editado com sucesso!', _btnOkName: 'Ok', _onCloseAction: 'window.location.href = \"".RouteController::RootRoute()."/produtos/lista\";', _btnFecharView: false});
        }
        </script>";
}

if (isset($_GET['error']) && $_GET['error'] == ERROR_CONNECT_DB) {
    echo "<script>
        window.onload = function(){ 
            var msgErrorDb = new MsgBox();
            msgErrorDb.showInLine({_idName: 'msgErrDb', _type: msgErrorDb.SET_TYPE_TEXT('" . substr(RouteController::RootRoute(), 1) . "'), _menssagem: 'Ocorreu um erro na comunicação com o banco de dados!<br><br>Se o problema persistir contacte um administrador.', _title: 'Falha ao se comunicar com o banco', _btnOkName: 'Ok', _btnFecharView: false});
        }
        </script>";
}
?>

<script>
    var msgDelete;

    function msgExcluir(ip, nome) {
        msgDelete = new MsgBox();
        msgDelete.showInLine({
            _idName: 'msgDel',
            _type: msgDelete.SET_TYPE_TEXT('<?= substr(RouteController::RootRoute(), 1) ?>'),
            _menssagem: 'Tem certeza que dejesa excluir ' + nome + '?',
            _title: 'Excluir definitivamente?',
            _btnOkName: 'Sim',
            _btnOkHref: '<?= RouteController::RootRoute(); ?>/produtos/excluir?id=<?= $v['id'] ?>',
            _btnCancelName: 'Cancelar',
            _btnFecharView: false
        });
    }
</script>