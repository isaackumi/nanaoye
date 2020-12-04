 <?php     
//connect to the core file for general configuration
require("../settings/core.php");

//check for login in the core file
//check_login();

?>

<!-- html to display the form with details in it -->
<!DOCTYPE html>
<html>
<head>
	<title>Update Brand</title>
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
		<!-- menu for the page -->
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Lets Recycle</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="../admin_index.php">Home</a></li>
          <li><a href="../admin/Brand.php">Add Brand</a></li>
          <li class="active"><a href="../EcomAssig_25612021/actions/update_brand.php">Edit Brand</a></li>
          <li><a href="..//admin/add_categ.php">Add Category</a></li>
          <li><a href="../actions/update_categ.php">Edit Category</a></li>    
        </ul>
        <ul class="nav navbar-nav navbar-right">
          </ul>
      </div>
    </nav>
	  <?php

	  	echo (isset($_SESSION["user_id"]))? "<a href='../login/logout.php'><span class='glyphicon glyphicon-log-in'></span>Logout</a>" : "<a href='../login/login.php'><span class='glyphicon glyphicon-log-in'></span>Login</a>";

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
		$brand_list = viewBrand_z();

		
		
		//Page title depending on search or general brand list
		echo "<ul class='list-group'>";
		echo "<li><a href='#' class='list-group-item active'>";
		echo (isset($_GET['bsearch']))? 'Search Result' : 'Brand List';
		echo "</a></li>";
		
		//check permission if user id an admin or not 
		$u_perm = check_permission();
		

		//checking if customer details was found
		if ($brand_list) {
			//run through returned list of details 
			foreach ($brand_list as $brand) {
				//get customer id
				$brandid = $brand['brand_id'];
				$brand_name = $brand['brand_name'];
				// checking for the permission to proced
				if ($u_perm == 1) { 
					// for admin the following process
						# code...
						// giving different edit page for users since there is admin and custmers
						// below is for customers
						echo "<li class='list-group-item'>".$brand['brand_name']." <a href='../admin/Brand.php?upid=$brandid'>edit</a> </li>";
 
					
				}else{
					//standard user, this would be worked on so they get to update profile
					echo "<li class='list-group-item'>".$brand['brand_name']." <a href='../admin/Brand.php?upid=$brandid'>edit</a> </li>";
 
				//	echo "<li class='list-group-item'>".$brand['brand_name']." You cannot edit/delete </li>";
				}
				
			}
		}else{
			echo "<li>No record found</li>";
		}
		//end of list
		echo "</ul>";

		

	?>


</body>
</html>