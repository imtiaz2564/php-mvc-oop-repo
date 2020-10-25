<?php

namespace Model;

class Blog {
    private $name;
    private $category;
    private $id;

    public function __construct($name, $cate , $id) {
        $this->blogname = $name;
        $this->category = $cate;
        $this->id = $id;
    }

    public function getBlogname() {
        return $this->blogname;
    }
    public function getCategory() {
        return $this->category;
    }
    public function getID() {
        return $this->id;
    }
//
//    public function isNameEmpty() {
//        return $this->name != "";
//    }
}