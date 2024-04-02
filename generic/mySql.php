<?php  
    class mySql{
        private static $instance;
        private $conexaoPDO = null;
        private $db = 'dbname=gerenciador_estoque';
        private $username = 'root';
        private $pass = '';


        private function __construct(){
            
            if($this->conexaoPDO == null){
                $this->conexaoPDO = new PDO($this->username,$this->pass,$this->db);
                $this->conexaoPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        }
        
        public static function getIntance(){
            
            if(self::$instance==null){
                self::$instance = new mySql();
            }
            return self::$instance;
        }
            
        
    }
?>