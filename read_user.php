<?php 

require 'database_connection.php';


class read{
  

   
 public function display(){

        $db = new Database();

        $sql = "select * from users";

        $operation = $db->doQuery($sql);

        return $operation;

        

 }


    }






?>