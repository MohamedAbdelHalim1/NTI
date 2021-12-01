
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <br>
  <h2>Create Your ToDo List</h2>
  <hr>
  <form action="{{url('/myToDo/')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

    

   
@csrf
<!-- 
@if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="images/{{ Session::get('image') }}">
@endif -->



@if ($errors->any())
<div class="alert alert-danger">
    <ul>
    <button type="button" class="close" data-dismiss="alert">×</button>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
 
    </ul>
</div>
@endif


    <div class="form-group">
      <label for="uname">Name:</label>
      <input type="text" class="form-control" id="uname" placeholder="Your name..." name="name" value="<?php echo old("name") ?>"  required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>


    <div class="form-group">
      <label for="uname">E-mail:</label>
      <input type="email" class="form-control" id="uname" placeholder="Your Email..." name="email" value="<?php echo old("email") ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <label for="uname">Password:</label>
      <input type="password" class="form-control" id="uname" placeholder="Your Password..." name="password" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
   
    <select name="gender" id="gender" class="form-control" required>
      <option value="">Gender</option>
      <option value="m">Male</option>
      <option value="f" >Female</option>                                                         
    </select> 


    <div class="form-group">
      <label for="uname">Title:</label>
      <input type="text" class="form-control" id="uname" placeholder="What's next?" name="title" value="<?php echo old("title") ?>"  required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>


    <div class="form-group">
      <label for="uname">Description:</label>
      <input type="text" class="form-control" id="uname" placeholder="More Details..." name="descript" value="<?php echo old("descript") ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <label for="uname">Start Date:</label>
      <input type="date"  class="form-control" id="uname" name="start" value="<?php echo old("start") ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>


    <div class="form-group">
      <label for="uname">Deadline:</label>
      <input type="date"  class="form-control" id="uname" name="deadline" value="<?php echo old("deadline") ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>


    <div class="form-group">
      <label for="uname">Photo:</label>
      <input type="file" class="form-control" id="uname" name="image" value="<?php echo old("image") ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

<br>


    <button type="submit" class="btn btn-primary" name="submit">Join</button>
  </form>
</div>



</body>
</html>
