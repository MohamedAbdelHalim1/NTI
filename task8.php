<?php 
//require 'blogDataBaseConnection.php';
require 'task8_Validation.php';

            if (isset($_POST['submit']) && isset($_FILES['file'])) {
                $title = clean($_POST['title']) ;
                $content = clean($_POST['content']) ;
            if (!empty($_FILES['file']['name'])) {
                $t_name =$_FILES['file']['tmp_name'];  
                $name = $_FILES['file']['name'];     
                $size = $_FILES['file']['size'];
                $type = $_FILES['file']['type'];     
        
                $file_ex = explode('.',$name);
                $update_ex = strtolower(end($file_ex));  
              
                $allowed_ex = ["png" , "pdf" , "jpg"];
        
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
        
        
        
        
            }else{
                echo 'image is required';
            }
            



#validation...
$errors = [];
if (!validation($title,1)) {    //function validation return true or false
    $errors['title'] = "Field required";
}
if (!validation($content,1)) {    
    $errors['content'] = "Field required";
}
// elseif (!validation($content,2)) {
//     $errors['content'] = "too small content";
// }



if (count($errors) > 0) {
    foreach ($errors as $value) {
        echo '* '. $value . "<br>";
    }
}
// else {

//     $sql = "select * from blogusers where email='$email' and password='$password'";  
//     #execute this query
//     $operation = mysqli_query($conn,$sql);

//     if (mysqli_num_rows($operation) == 1) {   //mean only one user returned from data base
//         $data = mysqli_fetch_assoc($operation);
//         $_SESSION['user'] = $data;       //carry data returned from database is session variable called user to be readable in all pages
//         header("location: blog_CRUD_read.php");
//     }else {
//         echo 'Error Try again!';
//     }

// }

// mysqli_close($conn);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>creat Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Log In</h2>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate >

    <div class="form-group">
      <label for="uname">title:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter Text" name="title" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd">content:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Content" name="content" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Image:</label>
      <input type="file" class="form-control" id="pwd"  name="file" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
 
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>



</body>
</html>
