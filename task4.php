<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
  
}

* {
  box-sizing: border-box;
  margin : auto;
  padding: auto;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
  height : 100%;
}

/* Full-width input fields */
input[type=text], input[type=password] ,  input[type=url]{
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus , input[type=url]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<?php 
session_start();
include 'validation.php';

?>


<form action="task4_profile.php" method="post" enctype="multipart/form-data">
  <div class="container">
    <h1>Register</h1>
    <hr>
    <label for="psw-repeat"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" ><?php echo $name_err; ?><br>
 
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email"><?php echo $email_err . $email_form_err; ?><br>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw"><?php echo $pass_err . $pass_len_err; ?><br>

    <label><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" ><?php echo $address_err .$address_len_err ; ?><br>

    <label><b>Linkedin</b></label>
    <input type="url" placeholder="Enter your URL" name="l-url"  ><?php echo $linkedinURL_err .$url_err ; ?><br>


    <label><b>Gender :</b></label>
    male:<input type="radio"  name="gender" > 
    female:<input type="radio"  name="gender" > <?php echo $gender_err; ?><br><br>
    
   
    
    <label><b>Profile Picture :</b></label>
    <input type="file"  name="file" > 
    <hr>

    <input type="submit" class="registerbtn" value="Log In">
  </div>
  
  
</form>



</body>
</html>








