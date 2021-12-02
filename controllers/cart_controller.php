<?php

// require_once((dirname(__FILE__)).'/../model/shopncartclass.php');

require __DIR__.'/../classes/cart_class.php';
$operation_status = '';

if(isset($_POST["update_qty"]) && !empty($_POST["update_qty"])){
   $prod_id = $_POST["update_qty"];
    $qty = $_POST["qty"];
    updateCartQty($prod_id, $qty, 1);
}


if(isset($_GET["type"])){
    $type=$_GET["type"];
    switch ($type) {
        case 'add':
            $prod_id = $_GET["prod_id"];
            $qty = $_GET["qty"];
            addItemToCart($prod_id, $qty);
            break;

        case 'delete':
            $prod_id = $_GET["prod_id"];
            removeItemFromCart($prod_id);
            break;

        case 'update':
            $prod_id = $_GET["prod_id"];
            $qty = $_GET["qty"];
            // updateCartQty($prod_id, $qty, 2);
            updateCartQty($prod_id, $qty);
            break;

        default:
            # code...
            break;
    }

}

function getTotalItemsInCart(){
    $ip_add = get_client_ip();
    $cartObj = new ShoppingCart();
    $response = $cartObj->getCartItemQty($ip_add);
    if($response){
        $row = $cartObj->db_count();
        return ($row != null) ? $row : "0";
    }  else{
        return "0";
    }
}

function getTotalItemAmountInCart(){
    $ip_add = get_client_ip();
    $cartObj = new ShoppingCart();
    $response = $cartObj->getCartItemsAmount($ip_add);
    if($response){
        $row = $cartObj->db_fetch();
        return ($row['amount'] != null) ? $row['amount'] : "0";
    }  else{
        return "0";
    }
}

function insertorder($user_id, $invoice){

    $obj = new ShoppingCart();
   $cartObj = $obj->insertorder($user_id, $invoice);
    if($cartObj){
        return true;
    }else{
        return false;
    }

}

function insertOrder1($status, $invoice){
    $toReturn = false;
    $ip_add = get_client_ip();
    $user_id=$_SESSION['user_id'];
    $cartObj = new ShoppingCart();
    $cartProducts = $cartObj->getCartItems($ip_add);
    if($cartProducts){
        $cartItems = $cartObj->fetchall();

        foreach ($cartItems as $item =>$value) {
            $prod_id = $value[0];
            $qty = $value[10];
            $toReturn = $cartObj->insertorders($user_id, $prod_id, $qty, $invoice, $status);
        }
    }
   return $toReturn;
}


//function to add item to cart
function addItemToCart($prod_id, $qty){
    // $toReturn = array();
    $ip_add = get_client_ip();
    $cartObj = new ShoppingCart();
    // $response = $cartObj->addToCart($prod_id, $ip_add, $qty);

    //check for duplicates
    $check = validateCart($ip_add, $prod_id);

    if(count($check) > 0){
        // $toReturn = array(
        //     'status' => 'error',
        //     'message' => 'Duplicate: item already added to cart'
        // );
        print_r('Item already in cart');
        // echo json_encode($toReturn);
    } else{ //when this is new
            $response = $cartObj->addToCart($prod_id, $ip_add, $qty);
        if($response){
            // $toReturn[] = array(
            //     'status' => 'success',
            //     'message' => 'item successfully added to cart'
            // );
            // echo json_encode($toReturn);
            print_r('Item successfully added to cart');

        } else{
            $toReturn[] = array(
                'status' => 'failed',
                'message' => 'Could not add item to cart'
            );
            echo json_encode($toReturn);
        }

    }

}
//function to remove item from cart
function removeItemFromCart($prod_id){
    $toReturn = array();
    $ip_add = get_client_ip();
    $cartObj = new ShoppingCart();

    $response = $cartObj->removeCartItem($prod_id, $ip_add);
        if($response){
            $toReturn[] = array(
                'status' => 'success',
                'message' => 'item successfully removed from cart'
            );
            echo json_encode($toReturn);

        } else{
            $toReturn[] = array(
                'status' => 'failed',
                'message' => 'Could not delete item from cart'
            );
            echo json_encode($toReturn);
        }

}

//function to update item in cart
function updateCartQty($prod_id, $qty){
    $toReturn = array();
    $ip_add = get_client_ip();
    $cartObj = new ShoppingCart();

    $response = $cartObj->updateCartQuantity($prod_id, $qty, $ip_add);

    if($ip_add){
        if($response){
            $toReturn[] = array(
                'status' => 'success',
                'message' => 'item quantity successfully updated'
            );
            echo json_encode($toReturn);

        } else{
            $toReturn[] = array(
                'status' => 'failed',
                'message' => 'Could not update cart item quantity'
            );
            echo json_encode($toReturn);
        }

    } else{
        if($response){
            $toReturn[] = array(
                'status' => 'success',
                'message' => 'item quantity successfully updated'
            );
            echo json_encode($toReturn);

        } else{
            $toReturn[] = array(
                'status' => 'failed',
                'message' => 'Could not update cart item quantity'
            );
            echo json_encode($toReturn);
        }
    }

}
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


function deleteCart(){
    $ip_address=get_client_ip();
    $obj=new ShoppingCart();
    $del=$obj->deletecart($ip_address);
}

function isExist($ip_add, $prod_id){
  $arr = array();
    $cartObj = new ShoppingCart();
$check = $cartObj->validateCart($ip_add, $prod_id);
if ($check) {

  while ($record = $cartObj->db_fetch()) {


              $arr[] = $record;
          }
      }

      return $arr;

}

function insertpayment($amount,$user_id,$order_id){
    $cartObj = new ShoppingCart();
    $check = $cartObj->insertpayment($amount,$user_id,$order_id);

    if ($check){
        return true;
    }else{
        return false;
    }
}

function just_in($invoice){
    //Create an array variable to hold list of search records
    $product_array = array();
  
    //create an instance of the product class
    $product_object = new ShoppingCart();
  
    //run the search product method
    $ip = get_client_ip();
    $product_records = $product_object->just_in($invoice);
  
    //check if the method worked
    if ($product_records) {
  
        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {
  
            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
  
  }



function validateCart($a,$b){
    //Create an array variable to hold list of search records
    $product_array = array();

    //create an instance of the product class
    $product_object = new ShoppingCart();

    //run the search product method
    $product_records = $product_object->validateCart($a,$b);

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {

            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}

function getCartItems(){
  //Create an array variable to hold list of search records
  $product_array = array();

  //create an instance of the product class
  $product_object = new ShoppingCart();

  //run the search product method
  $ip = get_client_ip();
  $product_records = $product_object->getCartItems($ip);

  //check if the method worked
  if ($product_records) {

      //loop to see if there is more than one result
      //fetch one at a time
      while ($one_record = $product_object->db_fetch()) {

          //Assign each result to the array
          $product_array[] = $one_record;
      }
  }
  //return the array
  return $product_array;

}

function cartDisplay(){

  $cart = getCartItems();
  // $amt =getTotalItemAmountInCart();

  if ($cart) {
      foreach ($cart as $value) {
          $id = $value['product_id'];
          $title = $value['product_title'];
          $price = $value['product_price'];
          $desc = $value['product_desc'];

          $qty = $value['qty'];

        $img = $value['product_image'];

        $total = $price*$qty;

        echo <<< _CART
        <tr>
        <td class="thumbnail-img">
            <a href="#">
        <img class="img-fluid" src="$img" alt="" />
            </a>
        </td>
        <td class="name-pr">
            <a href="#">
        $title
            </a>
        </td>
        <td class="price-pr">
            <p>GH¢ $price.00</p>
        </td>
        <td class="quantity-box"><input type="number" size="4" value="$qty" id="update-qty" min="1" ></td>
        <td class="total-pr">
            <p>GH¢ $total.00</p>
        </td>
        <td class="remove-pr">
            
            <button type="button" onclick="removeCartItem($id)" class="btn btn-sm btn-danger">Delete</button>
            <button type="button" onclick="updateCartItemQty($id)" class="btn btn-sm btn-info">Update</button>
         
        </td>
        </tr>
        _CART;

      }
    }

}
