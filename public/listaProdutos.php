<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>

<div id="">
    <table>
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Categoria</th>
        </thead>
        <tbody>
            <?php
               if(sizeof($param["listaProdutos"]) == 0){
            ?>
                <tr>
                    <td colspan="6">Sem produtos cadastrados!</td>
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
                </tr>
            <?php 
                }
            }
            ?>
        </tbody>
    </table>
</div>