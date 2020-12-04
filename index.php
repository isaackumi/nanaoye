<?php
	//start session
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>LAB ASSIGNMENT</title>
	<meta charset="utf-8">
	
	<!--CDN Bootstrap and Jquery-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
</head>
<body>
	<!--Header-->
	<div class="container">
	  <div class="jumbotron">
	  	<h1>Lets Purchase REcycle Materials</h1> 
	    <p>Recycling Glass to form amazing Products. Lets Explore together, Purchase made in Ghana as you also save and protect the environment</p> 
	  </div>
	</div>

	!--Menu-->
	<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">Lets Recycle</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="../index.php">Home</a></li>
		      <li><a href=""></a></li>
		      <li><a href="../EcomAssig_25612021/views/allproduct.php">All Products</a></li>
		      <li><a href="../EcomAssig_25612021/views/singleproduct.php">Single Products</a></li>
		      <li><a href="../EcomAssig_25612021/actions/product.php">Products</a></li>
		      <li><a href="../EcomAssig_25612021/views/searchresult.php">Search Products</a></li>
		      <li><a href="../EcomAssig_25612021/views/cart.php">Add to Cart</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		      <li>

		     <?php 
		      //show login or logout
		      echo (isset($_SESSION["user_id"]))? "<a href='login/logout.php'><span class='glyphicon glyphicon-log-in'></span>Logout</a>" : "<a href='login/login.php'><span class='glyphicon glyphicon-log-in'></span>Login</a>";?>
		      </li>
		    </ul>
		    <!--Search form-->
		    <form class="navbar-form navbar-left" action="view/search.php">
		      <div class="form-group">
		        <input type="text" name="searcht" class="form-control" placeholder="Search">
		      </div>
		      <button type="submit" name="csearch" class="btn btn-default">Search</button>
		    </form>
		  </div>
	</nav> 

	
	
</body>
</html>