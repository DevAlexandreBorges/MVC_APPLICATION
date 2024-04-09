<?php 

namespace view;

use generic\View;

class CadastrarView extends View {

    public function cadastrarProduto(){
        $param = array(
            "type" => 1
        );
        $this->conteudo("public/cadastro.php",$param);
    }

    public function editarProduto($produto = array()){
        $param = array(
            "type" => 2,
            "produto" => $produto
        );
        $this->conteudo("public/cadastro.php",$param);
    }

}