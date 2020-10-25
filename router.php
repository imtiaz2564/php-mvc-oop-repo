<?php

//use DB\dbSvc;
// use \db\DB\dbSvc; 
namespace Router;

require_once  'db/dbMysqlSvc.php';
require_once  'repositories/login.php';
require_once  'controllers/loginCtrl.php';
require_once  'repositories/blog.php';
require_once  'controllers/blogController.php';


class Router {

    private $loginCtrl;

    public function __construct() {

        // $db = new  \DB\DbSvc("localhost", "root" , "sportsmvc" , " ");
        $db = new  \DB\MysqlDBSvc("localhost", "root" , "sportsmvc" , " ");
        $loginRepo = new \Repository\LoginRepository($db);
        $blogRepo = new \blogrepository\BlogRepository($db);
        $this->loginCtrl = new \ctrl\LoginCtrl($loginRepo);
        $this->blogCtrl = new \blogctrl\BlogController($blogRepo);
    }

    public function handle()
    {
       
        $act = isset($_GET['act']) ? $_GET['act'] : NULL;
        switch ($act)
        {
           
            case 'login' :
                $this->loginCtrl->login();
                break;
            case 'add' :
                $this->loginCtrl->SignUp();
                break;
            case 'insert' :
                $this->blogCtrl->insertData();
                break;
            case 'update' :
                $this->blogCtrl->updateData();
                break;
            case 'updateinfo' :
                $this->blogCtrl->updateInfo();
                break;
            case 'delete' :
                $this->blogCtrl->deleteData();
                break;
            default:
               $this->loginCtrl->loginView();
        }
    }

}