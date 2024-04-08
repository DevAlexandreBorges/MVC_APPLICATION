<?php

namespace controller;

class RouteController {

    public function redirectUp(){
        header("Location: ../");
    }

    public function normalizeRoute(){
        $rote = substr($_GET["param"], 0, strlen($_GET["param"]) - 1);
        header("Location: ../".$rote);
    }
}