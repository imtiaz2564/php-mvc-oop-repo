<?php

namespace blogrepository;

use DB\IDB;
use Model\Blog;
require_once  'interfaces/iBlog.php';

class BlogRepository implements  IBlog {


    private $dbSvc;

    public function __construct(IDB $dbSvc) {
        $this->dbSvc = $dbSvc;
    }
    public function insertData(Blog $blog){
        return $this->dbSvc->insertData($blog);
    }
    public function getData($id) {
        return $this->dbSvc->getDataList($id);
    }
    public function updateInfo(Blog $blog){
        return $this->dbSvc->updateInfo($blog);
    }
    public function deleteData($id) {
        return $this->dbSvc->deleteData($id);
    }
    public function getViewData($id) {
        return $this->dbSvc->getViewData($id);
    }
}