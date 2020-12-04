<?php

//connect to the core file for general configuration
require("../settings/core.php");

//connect to brand controller
require("../controllers/brand_controller.php");


//check for login in the core file
//check_login();

//get customer id
$customer_id = get_customer_id();

?>

<!-- html to display the form with details in it -->
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
  <meta charset="utf-8">
  
  <!--CDN Bootstrap and Jquery-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	
  </div>
		<!-- menu for the page -->
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Lets Recycle</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="../index.php">Home</a></li>
          <li><a href=></a></li>
          <li class="active"><a href="../EcomAssig_25612021/actions/product.php">Products</a></li>
          <li><a href="../actions/update_product.php">Update Products</a></li>
          
    
        </ul>
        <ul class="nav navbar-nav navbar-right">

        	<li>
		      	<?php echo (isset($_SESSION["user_id"]))? "<a href='../login/logout.php'><span class='glyphicon glyphicon-log-in'></span>Logout</a>" : " ";?>
		      </li>

          </ul>

          <!--form to enable searching-->
		    <form class="navbar-form navbar-left" action="search.php">
		      <div class="form-group">
		        <input type="text" name="searcht" class="form-control" placeholder="Search">
		      </div>
		      <button type="submit" name="csearch" class="btn btn-default">Search</button>
		    </form>
		  </div>
	</nav> 

  <?php
    //connnect to the controller
    //require("../controllers/brand_controller.php");
    //check if action is an update
    if (isset($_GET['ppid'])) {
      //get contact id
      $uuid = $_GET['ppid'];
      //run the function to get one contact
      $result = view_one_contact_z($uuid);
      //store in varible
      $pid = $result[0]['product_id'];
      $pcat = $result[0]['product_cat'];
      $pbrand= $result[0]['product_brand'];
      $ptitle = $result[0]['product_title'];
      $pprice = $result[0]['product_price'];
      $pdesc = $result[0]['product_desc'];
      $pimage = $result[0]['product_image'];
      $pkeywords = $result[0]['product_keywords'];
    }
  ?>
  
    <h1>Product Form</h1>
  <article class="card-body">
  <form method="POST" action="addproduct.php" enctype="multipart/form-data">
    <div class="form-row">
      <div class="col form-group">
      <div class="form-group">
          <label>Select Product Category</label>
        <select name="product_cat" >
          <?php 
            $cat_list = viewCat_z(); 
            if ($cat_list) {
              # code...
              foreach ($cat_list as $cat_lists) {
                # code...

                $namecat = $cat_lists['cat_name'];
                $cat_id = $cat_lists['cat_id'];
                echo '<option value="' .$cat_id. '">' .$namecat. '</option>';


              }
            }
          ?>
        </select>  
        </div> 
  </div> 
  <div class="form-group">
          <label>Select Product Brand</label>
        <select name="product_brand" >
          <?php 
            $brand_list = viewBrand_z(); 
            if ($brand_list) {
              # code...
              foreach ($brand_list as $brand_lists) {
                # code...

                $namecat = $brand_lists['brand_name'];
                $cat_id = $brand_lists['brand_id'];
                echo '<option value="' .$cat_id. '">' .$namecat. '</option>';
              }
            }
          ?>
        </select>  
        </div> 
  <div class="form-group">
      <label>Product Title</label>
    <input type="text" name="product_title" class="form-control" placeholder="" required="required" >
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label>Product Price</label>
      <input type="text" name="product_price" class="form-control" required="required">
    </div>
    <div class="form-group col-md-6">
      <label>Product Description</label>
      <input type="text" name="product_desc" class="form-control" required="required">
    </div> 
  </div>
  <div class="form-group">
    <label>Product Image</label>
      <input class="form-control" name="product_image" type="file" placeholder="" required="required">
  </div> 
  <label>Product KeyWords</label>
      <input class="form-control" name="product_keywords" type="text" placeholder="" required="required">
  </div> 
  <div class="form-group">
       <button type="submit" class="btn btn-default" name="<?php echo (isset($product_id))? 'update_product' : 'add_product';?>" > <?php echo (isset($product_id))? 'Update Product' : 'Add Product';?></button>
        <input type="hidden" name="product_id" value="<?php echo (isset($product_id))? $product_id : '';?>">
    </div>
  </form>
</article>


  



    


