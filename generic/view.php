<?php

namespace generic;

class View {

    private function cabecalho(){
        include "public/cabecalho.php";
    }

    private function rodape(){
        include "public/rodape.php";
    }

    public function conteudo($caminho, $param = array()){
        echo $this->cabecalho();
        include $caminho;
        echo $this->rodape();
    }

}