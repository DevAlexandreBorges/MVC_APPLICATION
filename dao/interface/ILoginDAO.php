<?php

namespace dao\interface;

interface ILoginDAO {
    public function buscarUserLogin($user);
    public function buscarUser($id);
}