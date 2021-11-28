<?php 

require 'database_connection.php';
require 'validation.php';

class User{
  
    private $name ;
    private $email;
    private $password;
   

    public  function __construct($val1,$val2,$val3){

      $this->name     = $val1;
      $this->email    = $val2;
      $this->password = $val3;
  
    }


   
 public function Register(){

$validate = new validator;
   

$name     = $validate->Clean($this->name);
$email    = $validate->Clean( $this->email );
$password = $validate->Clean( $this->password);



$errors = [];


if(!$validate->validate($name,1)){
   $errors['Name'] = "Field Required";
}

if(!$validate->validate($email,1)){
 $errors['Email'] = "Field Required";
  
 }elseif(!$validate->validate($email,2)){
    
     $errors['Email'] = "Invalid Email";
 }

 if(!$validate->validate($password,1)){
     $errors['Password'] = "Field Required";
  }elseif(!$validate->validate($password,4)){
     $errors['Password'] = "Invalid Length , Length Must Be >= 6 ch";
  }



  if(count($errors) > 0){

     foreach($errors as $key => $error){
         echo "* ".$key." : ".$error."<br>";
     }

  }else{


        $db = new Database();

        $sql = "insert into users (name,email,password) values ('$this->name','$this->email','$this->password')";

        $result = $db->doQuery($sql);

          if($result){
              header("location: read.php");
          }else{
              echo "Error Try Again";
          }

        }


    }



}


?>