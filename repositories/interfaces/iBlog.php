<?php

namespace blogrepository;


use Model;

interface IBlog {
    public function insertData(Model\Blog $blog);
    public function updateInfo(Model\Blog $blog);
    // public function getData();
    //public function deleteData();
}