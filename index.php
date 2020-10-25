<?php
	//session_unset();
    // require_once  'controller/sportsController.php';
  //  require_once  'controller/loginController.php';			
    // $controller = new sportsController();	
    // $controller->mvcHandler();
//    $loginController = new loginController();
//    $loginController->mvcHandler();
     require_once  'router.php';
     //use Router\Router;
     $router = new Router\Router();
     $router->handle();

?>