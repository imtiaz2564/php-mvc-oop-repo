<?php
namespace databaseConfig;

class database
{
    public $host;
    public $user;
    public $pass;
    public $db;
    function __construct() {
        $this->host = "localhost";
        $this->user  = "root";
        $this->pass = "root";
        $this->db = "blog";
    }
}

