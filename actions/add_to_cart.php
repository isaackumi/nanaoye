<?php

require("../settings/core.php");
require("../controllers/brand_controller.php");

		//check for login in the core file
		//check_login();
		//session_start(); 

		//echo "working to this point";


		//if (isset($_GET['cart'])) {
			// grad user form data
			$pid = $_GET['pid'];
			$ip_add = $_SERVER['REMOTE_ADDR'];
			$cid =  $_SESSION["customer_id"];
			$qty = 1;


$check_cart = addCart_z($pid, $ip_add, $cid, $qty);

	//if register exist then proceed to password
	if ($check_cart) {

		//check if addbrand is succesful
		echo "Cart Addition Successful";
		//redirect to brand page
		//header('Location: ../admin/Brand.php');
	}else{

		//check if addbrand is succesful
		echo "Addition not Successful";
		//redirect to brand page
		//header('Location: ../admin/Brand.php');
	}


?>
