<?php
//use DB\dbSvc;
// use \db\DB\dbSvc; 
namespace Router;

use databaseConfig\database;

require_once  'db/dbMysqlSvc.php';
require_once  'repositories/login.php';
require_once  'controllers/loginController.php';
require_once  'repositories/blog.php';
require_once  'controllers/blogController.php';
require_once  'config/database.php';


class Router {

    private $loginCtrl;
    private $blogCtrl;

    public function __construct() {
        $objConfig = new database();
        $db = new  \DB\MysqlDBSvc($objConfig);
        $loginRepo = new \Repository\LoginRepository($db);
        $blogRepo = new \blogrepository\BlogRepository($db);
        $this->loginCtrl = new \login\LoginController($loginRepo);
        $this->blogCtrl = new \blog\BlogController($blogRepo);
    }

    public function handle()
    {
       
        $act = isset($_GET['act']) ? $_GET['act'] : NULL;
        switch ($act)
        {


            case 'loginView' :
                $this->loginCtrl->loginView();
                break;
            case 'login' :
                $this->loginCtrl->login();
                break;
//            case 'add' :
//                $this->loginCtrl->signUp();
//                break;
            case 'insert' :
                $this->blogCtrl->insertData();
                break;
            case 'insertView' :
                $this->blogCtrl->insertView();
                break;
            case 'update' :
                $this->blogCtrl->updateData();
                break;
            case 'updateInfo' :
                $this->blogCtrl->updateInfo();
                break;
            case 'delete' :
                $this->blogCtrl->deleteData();
                break;
            default:
               //$this->loginCtrl->loginView();
                $this->blogCtrl->getBlogList();
        }
    }

}