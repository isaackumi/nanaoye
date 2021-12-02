<!-- <?php  
//start session 
//session_start();
?>
 -->
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <title>Add Category</title>
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
          <li ><a href="../admin/Brand.php">Add Brand</a></li>
          <li><a href="../actions/update_brand.php">Edit Brand</a></li>
          <li class="active"><a href="../admin/add_categ.php">Add Category</a></li>
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
      $categ_id = $_GET['upid'];
      //run the function to get one contact
      $result = viewone_Cat_z($categ_id);
      //store in varible
      $cat_id = $result[0]['cat_id'];
      $cat_name = $result[0]['cat_name'];
      
    }
  ?>

<?php

if (isset($_GET['upid'])) {
  # code...

  echo "<h1> Update Category</h1>";
}else{
  echo "<h1>  Add Category</h1>";
}



?>

  
  <article class="card-body">
  <form method="POST" action="../actions/add_brand.php">
    <div class="form-row">
      <div class="col form-group">   
        <label for="myfile" class="col-form-label col-md-2 col-sm-2 label-align"> Name</label>
        <input type="text" id="cat_name" name="cat_name" value="<?php echo (isset($cat_name))? $cat_name : '';?>" id="bname" required>

        <input type="hidden" name="cat_id" value="<?php echo (isset($cat_id))? $cat_id : '';?>" required>

    </div> 
  <div class="form-group">
        <button type="submit" name="<?php echo (isset($cat_id))? 'upcat' : 'cat';?>" > <?php echo (isset($cat_id))? 'Update Category' : 'Add Category';?></button>
        
    </div>

</article>
</body>
</html>
