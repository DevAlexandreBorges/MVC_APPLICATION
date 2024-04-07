<?php

namespace generic;

class View {

    private function cabecalho(){
        //Chamar cabeçalho...
    }

    private function rodape(){
        //Chamar rodapé...
    }

    public function conteudo($caminho, $param = array()){
        echo $this->cabecalho();
        include $caminho;
        echo $this->rodape();
    }

}