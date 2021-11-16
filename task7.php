<?php 
require 'task7_DB.php';
require 'blogFunctionHelper.php';

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
  
    $sql = "insert into blogusers(title,description,sdate,edate) values ('$title' , '$description' , '$startdate' , '$enddate')";  //if inserted data is string put it in single quote
    #execute this query
    $operation = mysqli_query($conn,$sql);
    if ($operation) {
        echo 'Data inserted successfully!';
    }else {
        echo 'Error Try again!';
    }

}

$_SESSION['enddate'] = $enddate;

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
  <h2>Sign UP</h2>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="needs-validation" novalidate>
    <div class="form-group">
      <label for="uname">title:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter tilte" name="title" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="uname">description:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter description" name="description" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd">start date:</label>
      <input type="date" class="form-control" id="pwd" placeholder="Enter start date" name="sdate" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="uname">linkedIn:</label>
      <input type="date" class="form-control" id="uname" placeholder="Enter URL" name="edate" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">submit</button>
  </form>
</div>



</body>
</html>
