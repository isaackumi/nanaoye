<?php 
//connect to database class
// require("../settings/db_class.php");

require __DIR__ . "/../settings/db_class.php";

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

	public function viewone_brand ($a){
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


	public function viewone_cat($a){
			//a query to get one category base on id
			$query = "SELECT * FROM `categories` WHERE `cat_id`='$a'";
			//return results
			return $this->db_query($query);
	}


	function editCat($cat_name, $cat_id){

		//update brand query
		$query = "UPDATE categories SET `cat_name` = '$cat_name' WHERE `cat_id` ='$cat_id'"; 

		//return true or false
		return $this->db_query($query);
	}

	//add brand to database
	function add_Cat($cat_name){
		// insert new brand query
		$query= "INSERT INTO categories(cat_name)VALUES('$cat_name')";


		//return true or false
		return $this->db_query($query);

	}

	//a method for viewing all customers
	public function view_cat(){
		//select all query
		$query = "SELECT * FROM `categories`";
		//return results
		return $this->db_query($query);
	}

	//add new product
	public function add_new_product($product_cat, $product_brand,  $product_title, $product_price, $product_desc, $product_image, $product_keywords){

		//Write the insert sql
		$query = "INSERT INTO products (`product_cat`,`product_brand`, `product_title`,`product_price`,`product_desc`,`product_image`,`product_keywords`) VALUES('$product_cat','$product_brand','$product_title', '$product_price','$product_desc','$product_image','$product_keywords')";
		
		//run query
		return $this->db_query($query);
	}

	//view a single product
	public function view_one_product($pa){
		//a query to get one product base on id
		$query = "SELECT * FROM products WHERE product_id=$pa";

		//run query
		return $this->db_query($query);
	}

	// method to search for product
	public function search_a_product($sterm){
		//a query to search product matching term
		$query = "SELECT * FROM products WHERE product_title LIKE '%$sterm%'";

		//run query
		return $this->db_query($query);
	}

	//edit product takes title,price & id
	public function update_one_product($product_id, $product_cat, $product_brand,  $product_title, $product_price, $product_desc, $product_image, $product_keywords ){
		//a query to update a product
		$query = "UPDATE products SET `product_cat`='$product_cat', `product_brand`='$product_brand',  `product_title`='$product_title', `product_price`='$product_price',`product_image`='$product_image',`product_keywords`='$product_keywords'  WHERE product_id=$product_id";
		
		//execute the query and return boolean
		return $this->db_query($query);
	}

	//delete products takes id
	public function delete_one_product($a){
		//a query to delete product using an id
		$query = "DELETE from products WHERE product_id=$a";
		
		//execute the query and return boolean
		return $this->db_query($query);
	}

	public function view_all_products(){
		//a query to get all products
		$query = "SELECT * FROM products";

		//execute the query and return boolean
		return $this->db_query($query);
	}


	public function viewone_cart($a){
				//a query to get one category base on id
				$query = "SELECT * FROM `cart` WHERE `c_id`='$a'";
				//return results
				return $this->db_query($query);
		}


	function editCart($product_id, $qty){

		//update brand query
		$query = "UPDATE cart SET `qty` = '$qty' WHERE `p_id` ='$product_id'"; 

		//return true or false
		return $this->db_query($query);
	}

	//add brand to database
	function add_Cart($product_id,$ip_add,$qty){
		// insert new brand query
		$query= "INSERT INTO cart(p_id,ip_add,qty)VALUES('$product_id', '$ip_add', '$qty')";


		//return true or false
		return $this->db_query($query);

	}

	public function delete_cart($p_id){
		//a query to delete product using an id
		$query = "DELETE from cart WHERE p_id=$p_id";
		
		//execute the query and return boolean
		return $this->db_query($query);
	}




}


 ?>