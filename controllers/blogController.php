<?php
namespace blog;

use Model\Blog;
use blogrepository\IBlog;
require_once  'models/blog.php';

class BlogController
{

    private $blogRepo;

    public function __construct(IBlog $blogRepo)
    {
        $this->blogRepo = $blogRepo;
    }
    public function insertView()
    {
        include "view/insert.php";
    }
    public function insertData()
    {   
       $blog = new Blog(htmlspecialchars($_POST['name']) ,htmlspecialchars($_POST['category']) , '');
       $res = $this->blogRepo->insertData($blog);
       $this->getBlogList();
    }
    public function getBlogList()
    {
        $result = $this->blogRepo->getData(0);
        include 'view/list.php';
    }
    public function updateData()
    {   
        $result = $this->blogRepo->getData($_GET['id']);
        include 'view/update.php';

    }
    function updateInfo()
    {
        $blog = new Blog(htmlspecialchars($_POST['name']) , htmlspecialchars($_POST['category']) , htmlspecialchars($_POST['id']));
        $res = $this->blogRepo->updateInfo($blog);
        $this->getBlogList();
    }
    public function deleteData()
    {
        $this->blogRepo->deleteData($_GET['id']);
        $result = $this->blogRepo->getData(0);
        include 'view/list.php';
    }    

}