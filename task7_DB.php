<?php 
session_start();
$localhost = "localhost";
$username = "root";
$password = "";
$db_name = "todolist";
//create connection
$conn = mysqli_connect($localhost , $username , $password , $db_name);
//check connectiom
if(!$conn){
    die('connection faild ');
}

?>