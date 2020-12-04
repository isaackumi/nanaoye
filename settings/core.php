<?php
//for header redirection
ob_start();

//start session
session_start(); 

//this allows you to get the name of the current page
$current_file = $_SERVER['SCRIPT_NAME']; 

//funtion to check for login
function check_login(){
	//check if login session userid  exit
	if (!isset($_SESSION['customer_id'])) 
	{
		//redirect to login page
    	header('Location: ../login/login.php');
	}
}

//function to get customer id
function get_customer_id(){
	//check if login session userid exit
	if (isset($_SESSION['customer_id'])) 
	{
		//return customer id
    	return $_SESSION['customer_id'];
	}
}

 
//to know if user is allowed to see that page or execute a command
function check_permission(){
	//get session role
	if (isset($_SESSION['customer_role'])) {
		
		//return user role
		return $_SESSION['customer_role'];
	}
}

// helps get user IP
function getIp()    
{
	$ip = $_SERVER['REMOTE_ADDR'];

	if(!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
	{
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	return $ip;
}

?>