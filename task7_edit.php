<?php 
require 'blogDataBaseConnection.php';
require 'blogFunctionHelper.php';

$id = $_GET['id'];
$sql = "select * from blogusers where id = $id";
$operation = mysqli_query($conn,$sql);

if (mysqli_num_rows($operation) == 1) {    //return 1 if any thing returned and 0 if nothing returned
    //code
   $data = mysqli_fetch_assoc($operation);


}else {
    header("location: task7_read.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = clean($_POST['tilte']) ;
    $description = clean($_POST['description']) ;
    $startdate = clean($_POST['sdate']) ;
    $enddate = clean($_POST['edate']) ;


#validation...
$errors = [];
if (!validation($title,1)) {    //function validation return true or false
    $errors['title'] = "Field required";
}
if (!validation($description,1)) {    //function validation return true or false
    $errors['description'] = "Field required";
}
if (!validation($startdate,1)) {    
    $errors['startdate'] = "Field required";
}
if (!validation($enddate,1)) {    
    $errors['enddate'] = "Field required";
}



if (count($errors) > 0) {
    foreach ($errors as $key => $value) {
        echo '* '.$key . ' : ' . $value . "<br>";
    }
}else {
    #DB code....
    $sql = "update blogusers set title='$title' , description='$description' , sdate='$startdate' , edate='$enddate' where id= $id ";
    #execute this query
    $operation = mysqli_query($conn,$sql);
    if ($operation) {
        echo 'Data Updated successfully!';
    }else {
        echo 'Error Try again!';
    }

}

mysqli_close($conn);

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
  <h2>Edit</h2>
  <form action="blog_CRUD_edit.php?id=<?php echo $data['id']; ?>" method="post" class="needs-validation" novalidate>
    <div class="form-group">
      <label for="uname">title:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter title" name="name" value="<?php echo $data['title']; ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="uname">description:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter description" name="description" value="<?php echo $data['description']; ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd">start date:</label>
      <input type="date" class="form-control" id="pwd" placeholder="Enter start date" name="sdate" value="<?php echo $data['sdate']; ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="uname">end date:</label>
      <input type="date" class="form-control" id="uname" placeholder="Enter end date" name="edate" value="<?php echo $data['edate']; ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Update</button>
  </form>
</div>



</body>
</html>
