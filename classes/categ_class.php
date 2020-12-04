<?php 
//connect to database class
require("../settings/db_class.php");

// inherenting methods from connection
class Brand extends db_connection{

	//add brand to database
	function add_brand($brand_name){
		// insert new brand query
		$query= "INSERT INTO brands(brand_name)VALUES('$brand_name')";


		//return true or false
		return $this->db_query($query);

	}

	//a method for viewing all customers
	public function view_brand(){
		//select all query
		$query = "SELECT * FROM `brands`";
		//return results
		return $this->db_query($query);
	}

	public function viewone_brand($a){
			//a query to get one customer base on id
			$query = "SELECT * FROM `brands` WHERE `brand_id`='$a'";
			//return results
			return $this->db_query($query);
	}


	//edit brand info in database

	function editBrand($brand_name, $brand_id){

		//update brand query
		$query = "UPDATE brands SET `brand_name` = '$brand_name' WHERE `brand_id` ='$brand_id'"; 

		//return true or false
		return $this->db_query($query);
	}


}




?>