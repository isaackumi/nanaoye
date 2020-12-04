<?php


//connect to controller
require("../controllers/customer_controller.php");

session_start();

//if the register button is click
if(isset($_POST['login'])){

	//grab login creditentials 
	$email = $_POST ['email'];
	$pass = $_POST ['pass'];
	//echo $email.$pass ;

	//check if email exist
	$check_login = loginCustomer_z($email);

		print_r($check_login);
	
	
		//grab password from database 
		$hash = $check_login[0]['customer_pass'];

		//verify password
		if (password_verify($pass, $hash)){

						//set session
				$_SESSION["user_id"] = $check_login[0]['customer_id'];
				$_SESSION["customer_role"] = $check_login[0]['user_role'];
				$_SESSION["customer_email"] = $check_login[0]['customer_email'];
				$_SESSION["customer_name"] = $check_login[0]['customer_name'];

				
				//create an if session to check for customer or admin
				if ($_SESSION["user_role"]==2) {

				//redirect to home page
				header('Location: ../index.php');

				}else{

					//redirect to admin page
				header('Location: ../index.php');
				}
				//ensure code below does not execute after redirection
				exit;
		} else 
		{
				//echo appropriate error
			    echo 'incorrect username or password';
			    header('Location: login.php');
		}
		}else
		{
			//echo the likely error to occur
			echo "Incorrect username or password";
		}




?>