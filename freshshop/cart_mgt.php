<?php

// require_once "../controllers/brand_controller.php";

require __DIR__ . "/../classes/brand_class.php";

if (isset($_GET['type'])){

    $type = $_GET['type'];

    switch ($type) {
        case 'add':
            $qty= $_GET['qty'];
            $id= $_GET['id'];
            addCart_z($id, $qty);

            // call add to cart function

         
            
            
            break;


            case 'delete':

                $qty= $_GET['qty'];
                // call delete cart  function
                break;
        
                
                case 'update':

                    $qty= $_GET['qty'];
                    $id= $_GET['id'];


                     // call update cart function
        
                    # code...
                    break;
              
        
        default:
            # code...
            break;
    }


}


// cart controllers here




function addCart_z($product_id, $qty){

	//creating an instance of the brand class
	$brand_instance = new Brand();
	$ip_add = getIp();

	//calling the method from the class
	$call = $brand_instance->add_Cart($product_id,$ip_add, $qty);

	//return true
		if($call){
			// return true;
			echo "Item added to cart";
		}else{
            echo "Item already in cart";
        }
		

		
	
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