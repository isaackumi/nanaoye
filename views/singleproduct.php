 <?php     
//connect to the core file for general configuration
require("../settings/core.php");

//check for login in the core file
//check_login();
session_start();

?>

<!-- html to display the form with details in it -->
<!DOCTYPE html>
<html>
<head>
	<title>Update Product</title>
  <meta charset="utf-8">
  
  <!--CDN Bootstrap and Jquery-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<!------ Include the above in your HEAD tag ---------->
	<style>
				.productbox {
		    background-color:#ffffff;
			padding:10px;
			margin-bottom:10px;
			-webkit-box-shadow: 0 8px 6px -6px  #999;
			   -moz-box-shadow: 0 8px 6px -6px  #999;
			        box-shadow: 0 8px 6px -6px #999;
		}

			.producttitle {
			    font-weight:bold;
				padding:5px 0 5px 0;
			}

			.productprice {
				border-top:1px solid #dadada;
				padding-top:5px;
			}

			.pricetext {
				font-weight:bold;
				font-size:1.4em;
		}
	</style>


</head>
<body>
	 <div class="container">
    <div class="jumbotron">
      <h1>Welcome Our Adminstrator</h1> 
      <p>Recycling Glass to form amazing Products. Lets Explore together, Purchase made in Ghana as you also save and protect the environment</p> 
    </div>
  </div>
		<!-- menu for the page -->
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Lets Recycle</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="../admin_index.php">Home</a></li>
          <li><a href="../admin/Brand.php">Add Brand</a></li>
          <li ><a href="../actions/update_brand.php">Edit Brand</a></li>
          <li><a href="../admin/add_categ.php">Add Category</a></li>
          <li><a href="../actions/update_categ.php">Edit Category</a></li>
          <li><a href="../actions/product.php">Add Product</a></li>
          <li class="active"><a href="../actions/update_product.php">Update Product</a></li>
    
        </ul>
        <ul class="nav navbar-nav navbar-right">
          </ul>
      </div>
    </nav>
	  <?php

	  	echo (isset($_SESSION["customer_id"]))? "<a href='../login/logout.php'><span class='glyphicon glyphicon-log-in'></span>Logout</a>" : "<a href='../login/login.php'><span class='glyphicon glyphicon-log-in'></span>Login</a>";

	  ?>

	</div>

	<!-- php for the processing og the data that would be input -->
	<?php
		//include the customer controller
		require('../controllers/brand_controller.php');

		//variable for customer list
		$list;
		global $list; 
			//run the function to return all customer list
		$product_list = view_all_product_z();

		
		
		//Page title depending on search or general brand list
		echo "<ul class='list-group'>";
		echo "<li><a href='#' class='list-group-item active'>";
		echo (isset($_GET['bsearch']))? 'Search Result' : 'Product List';
		echo "</a></li>";
		
		//check permission if user id an admin or not 
		$u_perm = check_permission();
		

		//checking if customer details was found
		if ($product_list) {
			//run through returned list of details 
			foreach ($product_list as $product) {
				//get customer id
				$product_id = $product['product_id'];
		//if (isset($_SESSION['customer_id'])){

			$cid =  $_SESSION['customer_id'];

			//echo "$cid";
		//}
				

				
				echo " 
						<div class='col-md-2 column productbox'>
				      <img src=$product[product_image] class='img-responsive'>
				    <div class='producttitle'>$product[product_title]</div>
				    <div class='productcat'>$product[product_cat]</div>
				    <div class='productbrand'>$product[product_brand]</div>
				    <div class='productdesc'>$product[product_desc]</div>
				    <div class='productprice'><div class='pull-right'><a href='../actions/add_to_cart.php?pid=$product_id&cid=$cid' class='btn btn-danger btn-sm' role='button'>Add to Cart</a></div><div class='pricetext'>$product[product_price]</div></div>
					</div>
                 ";
				
			}
		}else{
			echo "<li>No record found</li>";
		}
		//end of list
		echo "</ul>";

		

	?>


</body>
</html>