<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        Name :<input type='text' name='name' /> <br><br>
        e-mail :<input type='email' name='email' /> <br><br>
        Password :<input type='password' name='password' /> <br><br>
        Address :<input type='text' name='address' /> <br><br>
        linkedin-URL :<input type='url' name='l-url' /> <br><br>
        <input type='submit' name='submit' /> <br>

    </form>
    
</body>
</html>


<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //fetched value from form
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $linkedinURL = $_POST['l-url'];

  
    if(empty($name)){
        echo 'Invalid data , enter your name'; 
    }elseif(empty($email)){
        echo 'Invalid data , enter your email'; 
    }elseif(empty($pass)){
        echo 'Invalid data , enter your password'; 
    }elseif(empty($address)){
        echo 'Invalid data , enter your address'; 
    }elseif(empty($linkedinURL)){
        echo 'Invalid data , enter your linkedin URL'; 
    }elseif (strlen($pass) < 6) {
        echo 'weak password';
    }elseif (strlen($address)>10 || strlen($address)<10) {
        echo 'your address should be 10 characters';
    }
    else{
        echo $name . '<br>' . $email . '<br>' . $pass . '<br>' . $address .'<br>' . $linkedinURL ;
    }

}


?>