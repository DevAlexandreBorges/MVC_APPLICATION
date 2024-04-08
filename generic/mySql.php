<?php

namespace generic;

use PDO;

class MySql
{
    private static $instance;

    private $conexaoPDO = null;
    private $dsn = 'mysql:host=localhost;dbname=gerenciador_estoque';
    private $username = 'root';
    private $pass = '';


    private function __construct()
    {

        if ($this->conexaoPDO == null) {
            $this->conexaoPDO = new PDO($this->dsn, $this->username, $this->pass);
            $this->conexaoPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function getIntance()
    {

        if (self::$instance == null) {
            self::$instance = new mySql();
        }
        return self::$instance;
    }

    public function executar($sql, $param = array())
    {
        if ($this->conexaoPDO != null) {
            $sth = $this->conexaoPDO->prepare($sql);
            foreach ($param as $key => &$value) {
                $sth->bindParam($key, $value, PDO::PARAM_STR);
            }
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
