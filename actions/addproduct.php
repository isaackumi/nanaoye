<?php


//connect to controller
require("../controllers/brand_controller.php");

//if the add product button is click
if(isset($_POST['add_product'])){

	//grab product details 

	$product_cat = $_POST ['product_cat'];
	$product_brand = $_POST ['product_brand'];
	$product_title = $_POST ['product_title'];
	$product_price = $_POST ['product_price'];
	$product_desc = $_POST ['product_desc'];
	//$product_image = $_POST ['product_image'];
	$product_keywords = $_POST ['product_keywords'];
	$name = $_FILES["product_image"]["name"];
	$t_dir = "../images/product/";
	$t_file = $t_dir . basename($_FILES["product_image"]["name"]);

	$imageFileType = strtolower(pathinfo($t_file,PATHINFO_EXTENSION));

	// Validate file extensions
	$extensions_arr = array("jpg","jpeg","png","gif");

	// Check extension
	if( in_array($imageFileType,$extensions_arr) ){


			$check_product = addproduct_z($product_cat, $product_brand,  $product_title, $product_price, $product_desc, $t_file, $product_keywords);
				//move_uploaded_file($_FILES["product_image"]['tmp_name'],$t_dir.$name);


				//if register exist then proceed to password
				if ($check_product) {
					move_uploaded_file($_FILES['product_image']['tmp_name'],$t_dir.$name);

					//check if registration is succesful
					echo "Product Addition Successful";
					//redirect to login page
					//header('Location: login.php');
				}else{

					//check if registration is succesful
					echo "Addition not Successful";
					//redirect to login page
					//header('Location: register.php');
				}

	}


	}

	elseif (isset($_POST['update_product'])) {

		# code...
		//grab product details 
	$product_id = $_POST ['product_id'];
	$product_cat = $_POST ['product_cat'];
	$product_brand = $_POST ['product_brand'];
	$product_title = $_POST ['product_title'];
	$product_price = $_POST ['product_price'];
	$product_desc = $_POST ['product_desc'];
	//$product_image = $_POST ['product_image'];
	$product_keywords = $_POST ['product_keywords'];
	$name = $_FILES['proudct_image']['name'];
	$t_dir = "../images/product/";
	$t_file = $t_dir . basename($_FILES["product_image"]["name"]);

	$imageFileType = strtolower(pathinfo($t_file,PATHINFO_EXTENSION));

	// Validate file extensions
	$extensions_arr = array("jpg","jpeg","png","gif");

	// Check extension
	if( in_array($imageFileType,$extensions_arr) ){


		$check_product = update_product_z($product_id, $product_cat, $product_brand,  $product_title, $product_price, $product_desc, $product_image, $product_keywords );
		


				//if register exist then proceed to password
				if ($check_product) {
					move_uploaded_file($_FILES['product_image']['tmp_name'],$t_dir.$name);

					//check if registration is succesful
					echo "Product Addition Successful";
					//redirect to login page
					//header('Location: login.php');
				}else{

					//check if registration is succesful
					echo "Addition not Successful";
					//redirect to login page
					//header('Location: register.php');
				}

	}


	}
?>