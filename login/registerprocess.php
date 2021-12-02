<?php


//connect to controller
require("../controllers/customer_controller.php");

//if the register button is click
if(isset($_POST['register'])){

	//grab register details 
	$email = $_POST ['email'];
	$fullname = $_POST ['fullname'];
	$contact = $_POST ['phonenumber'];
	$city = $_POST ['city'];
	$country = $_POST ['country'];
	$pass = $_POST ['createpassword'];
	$pass1 = $_POST ['createpassword1'];
	$role = $_POST ['user_role'];

	
	//encrypt password
	$hash = password_hash($pass, PASSWORD_DEFAULT);

$check_register = addCustomer_z($fullname, $email, $hash, $country, $city, $contact,$role);

	//if register exist then proceed to password
	if ($check_register) {

		//check if registration is succesful
		echo "Registration Successful";
		//redirect to login page
		header('Location: login.php');
	}else{

		//check if registration is succesful
		echo "Registration not Successful";
		//redirect to login page
		header('Location: register.php');
	}




	}
