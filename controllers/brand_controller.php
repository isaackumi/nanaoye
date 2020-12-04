<?php
//connect to brand_class
require("../classes/brand_class.php");

function addBrand_z($brand_name){

	//creating an instance of the brand class
	$brand_instance = new Brand();

	//calling the method from the class
	$call = $brand_instance->add_brand($brand_name);

	//return true
		if($call){
			return true;
		}
		return false;	
}

function viewBrand_z(){	
		//create an instance of the class
		$displayb = new Brand();
		//run the view all method in the class
		$blist = $displayb->view_brand();
		if ($blist) {
			//creatign an array
			$db_blist = array();
			while ($record = $displayb->db_fetch()) {
				// appending results to the array
				$db_blist[] = $record;
			}
			//return the array
			return $db_blist;
		}else{
			return false;
		}
}

function viewone_Brand_z($a){
		//create an instance of the class
		$displayb = new Brand();
		//run the view one customer method in the class
		$blist = $displayb->viewone_brand($a);
		if ($blist) {
			//creating an array
			$db_blist = array();
			//loop to see if there is more than one result
			//fetch one at a time
			while ($record = $displayb->db_fetch()) {
				// appending results to the array
				$db_blist[] = $record;
			}
			//return the array
			return $db_blist;
		}else{
			return false;
		}	
}

function edit_Brand_z($brand_name,$brand_id){
	//creating an instance of the brand class
	$brand_instance = new Brand();
	//calling the method from the class
	$call = $brand_instance->editBrand($brand_name,$brand_id);
	//return true
		if($call){
			return true;
		}
		return false;
}

function addCat_z($cat_name){

	//creating an instance of the brand class
	$brand_instance = new Brand();

	//calling the method from the class
	$call = $brand_instance->add_Cat($cat_name);

	//return true
		if($call){
			return true;
		}
		return false;
	
}

function viewone_Cat_z($a){
		//create an instance of the class
		$displayb = new Brand();
		//run the view one customer method in the class
		$blist = $displayb->viewone_cat($a);
		if ($blist) {
			//creating an array
			$db_blist = array();
			//loop to see if there is more than one result
			//fetch one at a time
			while ($record = $displayb->db_fetch()) {
				// appending results to the array
				$db_blist[] = $record;
			}
			//return the array
			return $db_blist;
		}else{
			return false;
		}	
}

function edit_Categ_z($cat_name,$cat_id){
	//creating an instance of the brand class
	$brand_instance = new Brand();
	//calling the method from the class
	$call = $brand_instance->editCat($cat_name,$cat_id);
	//return true
		if($call){
			return true;
		}
		return false;
}

function viewCat_z(){	
		//create an instance of the class
		$displayb = new Brand();
		//run the view all method in the class
		$blist = $displayb->view_cat();
		if ($blist) {
			//creatign an array
			$db_blist = array();
			while ($record = $displayb->db_fetch()) {
				// appending results to the array
				$db_blist[] = $record;
			}
			//return the array
			return $db_blist;
		}else{
			return false;
		}
}

function addproduct_z($product_cat, $product_brand,  $product_title, $product_price, $product_desc, $product_image, $product_keywords){
	//create an instance of product class
	$brand_instance = new Brand();
	
	//run the add product method
	$call = $brand_instance->add_new_product($product_cat, $product_brand,  $product_title, $product_price, $product_desc, $product_image, $product_keywords);

	//check if method worked
	if ($call) {

		//return query result (boolean)
		return $call;

	}else{

		return false;
	}
}

//search product function - takes the search term
function search_a_product_z($sterm){
	//Create an array variable to hold list of search records
	$product_array = array();

	//create an instance of the product class
	$brand_instance = new Brand();

	//run the search product method
	$call = $brand_instance->search_a_product($sterm);

	//check if the method worked
	if ($call) {
		
		//loop to see if there is more than one result
		//fetch one at a time
		while ($one_record = $brand_instance->db_fetch()) {
			
			//Assign each result to the array
			$product_array[] = $one_record;
		}
	}
	//return the array
	return $product_array;
}

//view all product function
function view_all_product_z(){
	//Create an array variable to hold list of products
	$product_array = array();

	//create an instance of the product class
	$brand_instance = new Brand();

	//run the view all product method
	$call  = $brand_instance->view_all_products();

	//check if the method worked
	if ($call) {
		
		//loop to see if there is more than one result
		//fetch one at a time
		while ($one_record = $brand_instance->db_fetch()) {
			//Assign each result to the array
			$product_array[] = $one_record;
		}
	}
	//return the array
	return $product_array;
}

//view one product function - takes the id
function view_one_product_z($pa){
	//Create an array variable to the product key value pair
	$product_array = array();

	//create an instance of the product class
	$brand_instance = new Brand();

	//run the view one product method
	$call  = $brand_instance->view_one_product($pa);

	//check if the method worked
	if ($call) {
		
		//fetch the result
		$one_record = $brand_instance->db_fetch();
		//assign to array
		$product_array[] = $one_record;
	}
	//return array
	return $product_array;
}

//update a product function - takes id, title and price
function update_product_z($product_id, $product_cat, $product_brand,  $product_title, $product_price, $product_desc, $product_image, $product_keywords ){
	//create an instance of the product class
	$product_object = new Brand();


	//run the update one product method
	$update_product = $product_object->update_one_product($product_id, $product_cat, $product_brand,  $product_title, $product_price, $product_desc, $product_image, $product_keywords );

	//check if method worked
	if ($update_product) {
		
		//return query result (boolean)
		return $update_product;
	}else{
		//return false
		return false;
	}
}

//delete a product function - takes the id
function delete_product_z($a){
	//create an instance of the product class
	 $product_object= new Brand();


	//run the delete one product method
	$delete_product = $product_object->delete_one_product($a);

	//check if method worked
	if ($delete_product) {
	
		//return query result (boolean)
		return $delete_product;
	}else{
		//return false
		return false;
	}
}

function addCart_z($product_id,$ip_add ,$customer_id, $qty){

	//creating an instance of the brand class
	$brand_instance = new Brand();

	//calling the method from the class
	$call = $brand_instance->add_Cart($product_id,$ip_add, $customer_id, $qty);

	//return true
		if($call){
			return true;
		}
		return false;
	
}

function viewone_Cart_z($a){
		//create an instance of the class
		$displayb = new Brand();
		//run the view one customer method in the class
		$blist = $displayb->viewone_cart($a);
		if ($blist) {
			//creating an array
			$db_blist = array();
			//loop to see if there is more than one result
			//fetch one at a time
			while ($record = $displayb->db_fetch()) {
				// appending results to the array
				$db_blist[] = $record;
			}
			//return the array
			return $db_blist;
		}else{
			return false;
		}	
}

function edit_Cart_z($product_id, $qty){
	//creating an instance of the brand class
	$brand_instance = new Brand();
	//calling the method from the class
	$call = $brand_instance->editCart($product_id, $qty);
	//return true
		if($call){
			return true;
		}
		return false;
}

function viewCart_z(){	
		//create an instance of the class
		$displayb = new Brand();
		//run the view all method in the class
		$blist = $displayb->view_cart();
		if ($blist) {
			//creatign an array
			$db_blist = array();
			while ($record = $displayb->db_fetch()) {
				// appending results to the array
				$db_blist[] = $record;
			}
			//return the array
			return $db_blist;
		}else{
			return false;
		}
}

function delete_cart_z($p_id){
	//create an instance of the product class
	 $product_object= new Brand();


	//run the delete one product method
	$delete_product = $product_object->delete_cart($p_id);

	//check if method worked
	if ($delete_product) {
	
		//return query result (boolean)
		return $delete_product;
	}else{
		//return false
		return false;
	}
}





?>