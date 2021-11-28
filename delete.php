<?php 

require 'database_connection.php';



class delete{

     $id = $_GET['id'];    //error here
    

    public function delete(){

    if (validation($id , 4)) {
        
        $sql = "delete from users where id = $id ";

        $operation = mysqli_query($conn,$sql);
        if ($operation) {
            $msg = "Record is deleted";
        }else {
            $msg = "Error try again";
        }

    }else {
        $msg = "Invalid id number";
    }

    $_SESSION['message'] = $msg;     
    header("location: read.php");
}

}

$obj = new delete;
$obj -> delete();

?>