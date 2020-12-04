<?php

require("../controllers/brand_controller.php");

if (isset($_POST['remove'])){
	$pid= $_POST['p_id'];
	$del = delete_cart_z($pid);

		if ($del) {
			          	
			         echo "Product deleted";
			         header('Location: ../views/cart.php');
			          }else{
			          echo "Sorry, unsuccessful ";
			          }

}



?>