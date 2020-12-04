<?php


//connect to controller
require("../controllers/brand_controller.php");

//if the register button is click
if(isset($_POST['brand'])){

	//grab brand details 
	$brand_name = $_POST['brand_name'];
	

$check_brand = addBrand_z($brand_name);

	//if register exist then proceed to password
	if ($check_brand) {

		//check if addbrand is succesful
		echo "Brand Addition Successful";
		//redirect to brand page
		//header('Location: ../admin/Brand.php');
	}else{

		//check if addbrand is succesful
		echo "Addition not Successful";
		//redirect to brand page
		//header('Location: ../admin/Brand.php');
	}




	}

	if (isset($_POST['upbrand'])) {

			// grad user form data
			$brand_id = $_POST['brand_id'];
			$brand_name = $_POST['brand_name'];
			
			//update contact
			$update = edit_Brand_z($brand_name,$brand_id);
			if ($update) {
				//echo success with return button
				echo "<div class='alert alert-success'>
  						<strong>Success!</strong> Brand updated.
  						<h3><a href='update_brand.php'>Back</a></h3>
					 </div>";
			}else{
				//echo failure  and link to back
				echo "<div class='alert alert-danger'>
  						<strong>Danger!</strong> error updating brand.
  						<h3><a href='update_brand.php'>Back</a></h3>
					 </div>";
			}
		}

		//if the register button is click
	if (isset($_POST['cat'])){

		//grab brand details 
		$cat_name = $_POST['cat_name'];
		

	$check_cat = addCat_z($cat_name);

		//if register exist then proceed to password
		if ($check_cat) {

			//check if addbrand is succesful
			echo "Category Addition Successful";
			//redirect to brand page
			//header('Location: ../admin/Brand.php');
		}else{

			//check if addbrand is succesful
			echo "Addition not Successful";
			//redirect to brand page
			//header('Location: ../admin/Brand.php');
		}




	}

	if (isset($_POST['upcat'])) {

			// grad user form data
			$cat_id = $_POST['cat_id'];
			$cat_name = $_POST['cat_name'];
			
			//update contact
			$update = edit_Categ_z($cat_name,$cat_id);
			if ($update) {
				//echo success with return button
				echo "<div class='alert alert-success'>
  						<strong>Success!</strong> Category updated.
  						<h3><a href='update_categ.php'>Back</a></h3>
					 </div>";
			}else{
				//echo failure  and link to back
				echo "<div class='alert alert-danger'>
  						<strong>Danger!</strong> error updating category.
  						<h3><a href='update_categ.php'>Back</a></h3>
					 </div>";
			}
		}

?>