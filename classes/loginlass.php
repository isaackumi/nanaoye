<?php
//connect to database class
require("../settings/db_class.php");

//loginclass this will handle evrything concerning login

// inherenting methods from connection
class login_class extends Connection
{
	//method for login informaton 
	
	public function verify_login($email){
		//a query to get all login information base on email
		$sql = "SELECT * FROM ulogin WHERE customer_email ='$email'";

		//execute the query
		return $this->query($sql);
	}

}

?>