<?php 


$name_err =  $email_err =  $email_form_err =  $pass_err = $pass_len_err = $address_err = $address_len_err = $linkedinURL_err = $url_err =$gender_err = "";

function clean($input){
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripcslashes($input);
    return $input;
    
}

 if($_SERVER['REQUEST_METHOD'] == "POST"){
     $_SESSION['name'] = clean($_POST['name']);
     $_SESSION['pass'] = clean($_POST['password']);
     $_SESSION['email'] = clean($_POST['email']);
     $_SESSION['address'] = clean($_POST['address']);
     $_SESSION['linkedinURL'] = clean($_POST['l-url']);
     $_SESSION['gender']= $_POST['gender'];
 


   if(empty($_SESSION['name'])){                              
        $name_err =  ' *Enter your name '; 
    }if(empty( $_SESSION['email'])){
        $email_err = ' *Enter your email '; 
    }
    elseif (!filter_var( $_SESSION['email'] , FILTER_VALIDATE_EMAIL)) {
        $email_form_err = ' *wrong email' ;
    }
    
    if(empty($_SESSION['pass'])){
        $pass_err =' *Enter your password'; 
    }
    elseif (strlen($_SESSION['pass']) < 6) {
        $pass_len_err =  ' *weak password';
    }
    if(empty($_SESSION['address'])){
        $address_err =  ' *Enter your address'; 
    }
     elseif (strlen($_SESSION['address'])>10 || strlen($_SESSION['address'])<10) {
        $address_len_err = ' *your address should be 10 characters';
    }
    if(empty($_SESSION['linkedinURL'])){
        $linkedinURL_err = ' *Enter your linkedin URL'; 
    }
    elseif (!filter_var($_SESSION['linkedinURL'] , FILTER_VALIDATE_URL)) {
        $url_err = ' *wrong url';
    }
    if(empty($_SESSION['gender'])){
        $gender_err =  ' *Choose your Gender'; 
    }
    if (!empty($_FILES['file']['name'])) {
        $t_name =$_FILES['file']['tmp_name'];  
        $name = $_FILES['file']['name'];     
        $size = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];     

        $file_ex = explode('.',$name);
        $update_ex = strtolower(end($file_ex));  
        $allowed_ex = ["png" , "jpg"];
        if (in_array($update_ex , $allowed_ex )) {
            $finalName = rand().time(). "." .$update_ex;  

            $dispath = './update/'.$finalName;
            if (move_uploaded_file($t_name,$dispath)) {
                echo 'impage updated';
            }else {
                echo 'cannot updated';
            }

        }else {
            echo 'invalid file';
        }

 }
}
?>