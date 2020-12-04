<?php
//connect to the customer class
require("../classes/customer_class.php");



	function addCustomer_z($name, $email, $pass, $country, $city, $contact, $role){

		//creating an instance of the customer_class

		$customer_instance = new Customer();

		//calls the method from class
		$call = $customer_instance->addCustomer($name, $email, $pass, $country, $city, $contact, $role);

		//return true
		if($call){
			return true;
		}
		return false; 

	}


	function updateCustomer_z($name, $email, $pass, $country, $city, $contact, $id){

		//creating an instance of the customer_class
		$customer_instance = new Customer();

		//calls the method from class
		$call = $customer_instance->updateCustomer_z($name, $email, $pass, $country, $city, $contact, $id);

		//return true
		if($call){
			return true;
		}
		return false;

	}

	

	function delCustomer_z($id){

		//creating an instance of the customer_class
		$customer_instance = new Customer();

		//calls the method from class
		$call = $customer_instance->updateCustomer_z($id);

		//return true
		if($call){
			return true;
		}
		return false;
	}

	//this function to get login information 
	function loginCustomer_z($email){

    $login_array = array();

    $customer_instance = new Customer();

    $call = $customer_instance->loginCustomer($email);
    if ($call) {

        $one_record = $customer_instance->db_fetch();
        
        $login_array[] = $one_record;
    }
    return $login_array;
}










?>