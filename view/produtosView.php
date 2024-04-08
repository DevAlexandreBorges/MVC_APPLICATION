<?php

namespace view;

use generic\View;

class ProdutosView extends View {

    public function listarProdutos($lista){
        $param = array(
            "listaProdutos" => $lista
        );
        $this->conteudo("public/listaProdutos.php", $param);
    }

}