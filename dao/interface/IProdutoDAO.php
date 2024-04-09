<?php

namespace dao\interface;

interface IProdutoDAO {

    public function listarProdutos();

    public function getProduto($id);

    public function salvarNovoProduto($nome, $descricao, $quantidade, $preco, $categoria);

}