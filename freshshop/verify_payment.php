<?php
session_start();

require_once "../controllers/cart_controller.php";
// include_once("../controllers/customer_controller.php");
// require_once "../controllers/productcontroller.php";
// if (isset($_GET)) {
//   // code...
// }

$reference = isset($_GET['ref']) ? $_GET['ref'] : '';
if(!$reference){
  die('No reference supplied');
}

$amount = $_GET['amount'];
$user_id = $_SESSION['user_id'];

$invoice = rand();

$_SESSION['invoice'] = $invoice;



// var_dump($user_id);


// $user = selectOneCustomer($user_id);
$user = $_SESSION['customer_email'];

// $email = $user[0]['customer_email'];


// insert order



$order = insertorder($user_id, $invoice);
// insert payment

// $no_ = $_SESSION['invoice'];
$just_in = just_in($invoice);

$just_in_id = (int) $just_in[0]['order_id'];

// var_dump($just_in_id);
// exit;


insertpayment($amount,(int) $user_id,$just_in_id);


// populate order_details


// clear cart
$clr = deleteCart();

$_SESSION['success'] = "Payment was successful!";

header("Location: cart.php");






 ?>
