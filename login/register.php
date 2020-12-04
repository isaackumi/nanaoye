<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>

    <link href="" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card">
    <header class="card-header">
      <a href="" class="float-right btn btn-outline-primary mt-1">Log in</a>
      <h4 class="card-title mt-2">Create an Account</h4>
</head>
<body>

  <h1>Registeration Form</h1>
  <article class="card-body">
  <form method="POST" action="registerprocess.php">
    <div class="form-row">
      <div class="col form-group">
      <label>Full name </label>   
        <input type="text" name="fullname" class="form-control" placeholder="Name" required="required">
    </div> 
  </div> 
  <div class="form-group">
    <label>Email address</label>
    <input type="email" name="email" class="form-control" placeholder="Email" required="required">
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label>Phone Number</label>
    <input type="number" name="phonenumber" class="form-control" placeholder="Phone Number" required="required" >
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label>City</label>
      <input type="text" name="city" class="form-control" required="required">
    </div>
    <div class="form-group col-md-6">
      <label>Country</label>
      <input type="text" name="country" class="form-control" required="required">
      <input type="hidden" name="user_role" class="form-control" value="0" >
    </div> 
  </div>
  <div class="form-group">
    <label>Create password</label>
      <input class="form-control" name="createpassword" type="password" placeholder="Password" required="required">
  </div> 
  <label>Confirm password</label>
      <input class="form-control" name="confirmpassword" type="password" placeholder="Password" required="required">
  </div> 
  <div class="form-group">
        <button type="submit" name="register" class="btn btn-primary btn-block"> Register  </button>
    </div>

</article>
</body>
</html>