<?php

namespace login;
session_start();

use Model;
use Repository\ILogin;
require_once  'models/user.php';

class LoginController
{

    private $loginRepo;

    public function __construct(ILogin $loginRepo)
    {
        $this->loginRepo = $loginRepo;
    }
    public function loginView()
    {
        include "view/login.php"; 
    
    }
    
    public function login()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $_SESSION['username']=$username;
        $userModel = new Model\User($_POST['username'] , md5($_POST['password']));
        $res = $this->loginRepo->loginUser($userModel);
        if ($res) {
            include "view/insert.php";
        }
        else{
            include "view/login.php"; 
        }
    }

    public function logout()
    {
        unset($_SESSION["username"]);
        $this->loginView();
    }

}