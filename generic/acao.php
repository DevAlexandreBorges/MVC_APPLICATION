<?php

namespace generic;

class Acao {
    private $class;
    private $metodo;

    public function __construct($class, $metodo)
    {
        $this->class = $class;
        $this->metodo = $metodo;
    }

    public function executar(){
        $obj = new $this->class();
        $obj->{$this->metodo}();
    }
}