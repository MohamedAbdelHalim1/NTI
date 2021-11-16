<?php 

require 'blogDataBaseConnection.php';
require 'blogFunctionHelper.php';


$id = $_GET['id'];
$todayDate = new Date();
if (validation($id , 4)) {
    if($_SESSION['enddate']>$todayDate){
        $sql = "delete from blogusers where id = $id ";

        $operation = mysqli_query($conn,$sql);
        if ($operation) {
            $msg = "Record is deleted";
        }else {
            $msg = "Error try again";
        }
    }
}else {
    $msg = "Invalid id number";
}

$_SESSION['message'] = $msg;      //to share this msg in blog_CRUD_read
header("location: task7_read.php");


?>