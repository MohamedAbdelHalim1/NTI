<?php 
    session_start();
    include 'validation.php';

    if(isset($_POST['submit'])) {  
    if($name_err == "" && $email_err == "" && $email_form_err == "" && $pass_err == "" && $$pass_len_err == "" && $address_err == "" && $address_len_err == "" && $linkedinURL_err == ""  && $url_err == "" && $gender_err == "") {  
        echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$_SESSION['name'];  
        echo "<br>";  
        echo "Email: " .$_SESSION['email'];  
        echo "<br>";  
        echo "password: " .md($_SESSION['pass']);  
        echo "<br>";  
        echo "Address: " .$_SESSION['address'];  
        echo "<br>";  
        echo "Gender: " .$_SESSION['gender'];  
        echo "<br>";
        echo "Linkedin URL: " .$_SESSION['linkedinURL'];  

    } else {  
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
    }  
    }  
?>  

