<?php

namespace Repository;

use DB\IDB;
use Model\User;
require_once  'interfaces/iLogin.php';

class LoginRepository implements  ILogin {


    private $dbSvc;

    public function __construct(IDB $dbSvc) {
        $this->dbSvc = $dbSvc;
    }

    // public function SignUp(User $user) {
    //     $this->dbSvc->SaveUser($user);
    // }

    public function loginUser(User $user){
        return $this->dbSvc->loginUser($user);
    }
}