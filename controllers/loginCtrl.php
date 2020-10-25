<?php

namespace ctrl;
session_start();

use Model;
use Repository\ILogin;
require_once  'models/user.php';

class LoginCtrl
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
            //return false;
            include "view/insert.php";
            //$blog->list();
            //include "view/list.php";
    
        }
        else{
            $error = 'error';
            include "view/login.php"; 
            die();
        }

        // return true;
    } 

}