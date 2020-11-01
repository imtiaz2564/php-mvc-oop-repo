<?php

namespace DB;

use \Model\User;
use \Model\Blog;

require_once  'db/interfaces/iDB.php';
class MysqlDBSvc implements IDB {

    private $conn;
    private $host;
    private $dbName;
    private $user;
    private $dbPass;

//    public function __construct($host , $user , $dbName, $dbPass) {
//
//        $this->host = $host;
//        $this->user = $user;
//        $this->dbName = $dbName;
//        $this->dbPass = $dbPass;
//
//        //$this->open_db();
//    }
public function __construct($objConst) {

    $this->host = $objConst->host;
    $this->user = $objConst->user;
    $this->dbName = $objConst->db;
    $this->dbPass = $objConst->pass;
//echo $objConst->host;
//echo $objConst->user;
//echo $objConst->db;
//echo $objConst->pass;
//die();
 //   $this->open_db();
}
//die();
    private function open_db() {

        // connection open
        // set to conn variable
        $this->conn = new \mysqli($this->host , $this->user , $this->dbPass , $this->dbName);
        if ($this->conn->connect_error) 
        {
            die("Error in connection: " . $this->conn->connect_error);
        }
    }

    private function close_db() {
        $this->conn->close();
    }
    
    public function loginUser(User $user) {
       $userName = $user->getUsername();
       $password = $user->getPassword();
      
        try{	
            $this->open_db();
            $query=$this->conn->prepare("SELECT username , password FROM login WHERE username=? and password=?");
            $query->bind_param("ss",$userName,$password);
            $query->execute();
            $res= $query->get_result();
            $query->close();
            $this->close_db();
            $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
            $count = mysqli_num_rows($res);
            return $count;
        }
        catch (Exception $e) 
        {
            $this->close_db();	
            throw $e;
        }
        

    }

    public function insertData(Blog $blog) {
        $blogname =  $blog->getBlogname();
        $category =  $blog->getCategory();
        try
        {	
            $this->open_db();
            $query=$this->conn->prepare("INSERT INTO sports (category,name) VALUES (?, ?)");
            $query->bind_param("ss",$category,$blogname);
            $query->execute();
            $res= $query->get_result();
            $last_id=$this->conn->insert_id;
            $query->close();
            $this->close_db();
            return $last_id;
        }
        catch (Exception $e) 
        {
            $this->close_db();	
            throw $e;
        }

    }
    // select record     
		
    public function getDataList($id) {
       
        try
        {
            $this->open_db();
            if($id>0)
            {
             	
                $query=$this->conn->prepare("SELECT * FROM sports WHERE id=?");
                $query->bind_param("i",$id);
            }
            else
            {
                $query=$this->conn->prepare("SELECT * FROM sports");	
            }		
            
            $query->execute();
            $res=$query->get_result();	
            $query->close();				
            $this->close_db();                
            return $res;
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
			       
    }

    public function deleteData($id) {
        // echo $id;
        // die();
        try{
            $this->open_db();
            $query=$this->conn->prepare("DELETE FROM sports WHERE id=?");
            $query->bind_param("i",$id);
            $query->execute();
            $res=$query->get_result();
            $query->close();
            $this->close_db();
            return true;	
        }
        catch (Exception $e) 
        {
            $this->closeDb();
            throw $e;
        }	
    }
    public function updateInfo(Blog $blog) {
        $blogname =  $blog->getBlogname();
        $category =  $blog->getCategory();
        $id =  $blog->getID();
        try
        {	
            $this->open_db();
            $query=$this->conn->prepare("UPDATE sports SET category=?,name=? WHERE id=?");
            $query->bind_param("ssi", $category , $blogname , $id);
            $query->execute();
            $res=$query->get_result();						
            $query->close();
            $this->close_db();
            return true;
        }
        catch (Exception $e) 
        {
            $this->close_db();
            throw $e;
        }
        
    }
    public function SaveUser(User $user) {

        $query = "INSERT INTO user(name) VALUES(" . $user->getName() . ");";


        $this->conn->prepare();

    }
}