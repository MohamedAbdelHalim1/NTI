<?php 
require 'database_connection.php';
require 'validation.php';

$id = $_GET['id'];
$sql = "select * from users where id = $id";
$operation = mysqli_query($conn,$sql);

if (mysqli_num_rows($operation) == 1) {    //return 1 if any thing returned and 0 if nothing returned
    //code
   $data = mysqli_fetch_assoc($operation);


}else {
    header("location: read.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = clean($_POST['name']) ;
    $email = clean($_POST['email']) ;

    $sql = "update users set name='$name' , email='$email'  where id= $id ";
    
    $operation = mysqli_query($conn,$sql);
    if ($operation) {
        header("location: read.php");
    }else {
        echo 'Error Try again!';
    }

}

mysqli_close($conn);




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
  <h2>Edit</h2>
  <form action="edit.php?id=<?php echo $data['id']; ?>" method="post" class="needs-validation" novalidate>
    <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="name" value="<?php echo $data['name']; ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="uname">Email:</label>
      <input type="email" class="form-control" id="uname" placeholder="Enter Email" name="email" value="<?php echo $data['email']; ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Update</button>
  </form>
</div>



</body>
</html>



