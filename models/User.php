<?php

namespace Model;

class User {
    private $name;
    private $password;

    public function __construct($name, $pass) {
        $this->name = $name;
        $this->password = $pass;
    }

    public function getUsername() {
        return $this->name;
    }
    public function getPassword() {
        return $this->password;
    }
//
//    public function isNameEmpty() {
//        return $this->name != "";
//    }
}