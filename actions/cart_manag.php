<?php

require("../controllers/brand_controller.php");

if (isset($_POST['update'])){
	$pid= $_POST['p_id'];
	$qty= $_POST['qty'];
	$update = edit_Cart_z($pid, $qty);

		if ($update) {
			          	
			         echo "Product details updated";
			         header('Location: ../views/cart.php');
			          }else{
			          echo "Sorry, updated unsuccessful";
			          }

}



?>

