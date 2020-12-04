<!-- <?php  
//start session 
//session_start();
?>
 -->
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <title>Add Brand</title>
  <meta charset="utf-8">
  
  <!--CDN Bootstrap and Jquery-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
</head>
  <body>

    <div class="container">
    <div class="jumbotron">
      <h1>Welcome Our Adminstrator</h1> 
      <p>Recycling Glass to form amazing Products. Lets Explore together, Purchase made in Ghana as you also save and protect the environment</p> 
    </div>
  </div>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Lets Recycle</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="../admin_index.php">Home</a></li>
          <li class="active"><a href="../admin/Brand.php">Add Brand</a></li>
          <li><a href="../actions/update_brand.php">Edit Brand</a></li>
          <li><a href="../admin/add_categ.php">Add Category</a></li>
          <li><a href="../actions/update_categ.php">Edit Category</a></li>
    
        </ul>
        <ul class="nav navbar-nav navbar-right">
          </ul>
      </div>
    </nav>
     


  <?php
    //include the customer controller
    require('../controllers/brand_controller.php');
        
    //check if action is an update
    if (isset($_GET['upid'])) {
      //get contact id
      $brand_id = $_GET['upid'];
      //run the function to get one contact
      $result = viewone_Brand_z($brand_id);
      //store in varible
      $brand_id = $result[0]['brand_id'];
      $brand_name = $result[0]['brand_name'];
      
    }
  ?>

<?php

if (isset($_GET['upid'])) {
  # code...

  echo "<h1> Update Brand</h1>";
}else{
  echo "<h1>  Add Brand</h1>";
}



?>

  
  <article class="card-body">
  <form method="POST" action="../actions/add_brand.php">
    <div class="form-row">
      <div class="col form-group">   
        <label for="myfile" class="col-form-label col-md-2 col-sm-2 label-align"> Name</label>
        <input type="text" id="brand_name" name="brand_name" value="<?php echo (isset($brand_name))? $brand_name : '';?>" id="bname" required>

        <input type="hidden" name="brand_id" value="<?php echo (isset($brand_id))? $brand_id : '';?>" required>

    </div> 
  <div class="form-group">
        <button type="submit" name="<?php echo (isset($brand_id))? 'upbrand' : 'brand';?>" > <?php echo (isset($brand_id))? 'Update Brand' : 'Add Brand';?></button>
        
    </div>

</article>
</body>
</html>
