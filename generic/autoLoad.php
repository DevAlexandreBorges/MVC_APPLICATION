<?php
spl_autoload_register(function ($class){
    include $_SERVER["DOCUMENT_ROOT"]."/MVC_APPLICATION/".$class.".php";
});