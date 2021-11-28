<?php 


 class Database{

   var  $localhost = "localhost";
   var  $dbName = "shopping_blog";
   var  $User = "root";
   var  $Password = "";
   var  $conn    = null;
   
   
      function __construct(){
         
        $this->conn =  mysqli_connect($this->localhost,$this->User,$this->Password,$this->dbName);

        if(!$this->conn){
            echo mysqli_connect_error();
         }
      }



      function doQuery($sql){

        $operation =   mysqli_query($this->conn,$sql);
        return $operation; 
    }


    function __destruct(){
        mysqli_close($this->conn);
    }



 }





?>