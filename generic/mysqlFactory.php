<?php

namespace generic;

class MysqlFactory {

    public ?MySql $banco;

    public function __construct() 
    {
        $this->banco = MySql::getIntance();
    }

}