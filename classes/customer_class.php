<?php

//connect to database class
require("../settings/db_class.php");

// inherenting methods from connection
class Customer extends db_connection{
 	
 	//adds customer to the database
	function addCustomer($name, $email, $pass, $country, $city, $contact,$role){

		$query ="insert into customer(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, user_role) values ('$name', '$email', '$pass', '$country', '$city', '$contact',2)";

		//return true or false
		return $this->db_query($query);
	}



	//edit customer info in the database
	function updateCustomer($name, $email, $pass, $country, $city, $contact, $id){

		$query = "update customer set customer_name = '$name', customer_email= '$email', customer_pass ='$pass', customer_country = '$country', customer_city ='$city', customer_contact = '$contact' where customer_id ='$id'";

		//return true or false
		return $this->db_query($query);
	}


	//delete customer from database
	function delCustomer($id){
		$query = "delete from customer where customer_id = '$id";

		//return true or false
		return $this->db_query($query);
	}


	// view all customers
	function viewCustomer(){
		$query = "select * from customer";

		//return true or false
		return $this->db_query($query);
	}


	function loginCustomer($email){
		//echo $email;
		$query = "select * from customer where customer_email = '$email'";

		//return true or false
		return $this->db_query($query);
	}



}


?>