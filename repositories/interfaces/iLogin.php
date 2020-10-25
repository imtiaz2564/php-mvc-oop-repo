<?php

namespace Repository;


use Model;

interface ILogin {
    //public function SignUp(Model\User $user);
    public function loginUser(Model\User $user);
}