<?php
ob_start();
session_start();
require('../controllers/productcontroller.php');


if (isset($_POST['add_brand'])) {

	$brand_name = $_POST['brand_name'];
	$add = addBrand($brand_name);
	if ($add) {

		$_SESSION['brand_success'] = 'Successfully added to brand';
		header('Location: ../admin/index.php');
	} else {
		$_SESSION['brand_error'] = 'Error adding to brand';
		header('Location: ../admin/index.php');
	}
}



if (isset($_POST['update_brand'])) {

	$brand_name = $_POST['brand_name'];
	$brand_id = $_POST['brand_id'];
	$add = updateBrand($brand_name, $brand_id);
	if ($add) {

		$_SESSION['brand_success'] = 'Successfully Updated ';
		header('Location: ../admin/index.php');
	} else {
		$_SESSION['brand_error'] = 'Error updating brand';
		header('Location: ../admin/index.php');
	}
}



if (isset($_GET['delete_brand_id'])) {

	//    echo 'working';

	$brand_id = $_GET['delete_brand_id'];
	$add = deleteBrand($brand_id);
	if ($add) {

		$_SESSION['brand_success'] = 'Brand deleted successfully ';
		header('Location: ../admin/index.php');
	} else {
		$_SESSION['brand_error'] = 'Error deleting brand';
		header('Location: ../admin/index.php');
	}
}



if (isset($_POST['add_category'])) {

	$cat_name = $_POST['cat_name'];
	echo $cat_name;
	$add = addCategory($cat_name);
	if ($add) {

		$_SESSION['cat_success'] = 'Successfully added to category';
		header('Location: ../admin/index.php');
	} else {
		$_SESSION['cat_error'] = 'Error adding to category';
		header('Location: ../admin/index.php');
	}
}

if (isset($_GET['delete_category_id'])) {

	//    echo 'working';

	$cat_id = $_GET['delete_category_id'];
	$add = deleteCategory($cat_id);
	if ($add) {

		$_SESSION['success'] = 'Category deleted successfully ';
		header('Location: ../admin/index.php');
	} else {
		$_SESSION['error'] = 'Error deleting category';
		header('Location: ../admin/index.php');
	}
}

if (isset($_POST['update_category'])) {


	$cat_name = $_POST['cat_name'];
	$cat_id = $_POST['cat_id'];

	//    echo $cat_name;
	//    echo $cat_id;


	$add = updateCategory($cat_name, $cat_id);

	if ($add) {

		$_SESSION['success'] = 'Successfully Updated ';
		header('Location: ../admin/index.php');
	} else {
		$_SESSION['error'] = 'Error updating brand';
		header('Location: ../admin/index.php');
	}
}


if (isset($_POST['update_prod'])) {

	function uploadImage()
	{
		//the directory/path of the image
		$folderName = "../admin/images/uploads/";

		// $folderName = "./images/uploads/";

		$fileName1 = $folderName . basename($_FILES["prod_img"]["name"]);
		//set a variable 'uploadOk' and make it equal to 1.
		//this variable will be used later to know whether the file can be successfully uploaded or not
		$uploadOk = 1;
		//imageFileType: this varialbe stores the extension of the image used
		$imageFileType = strtolower(pathinfo($fileName1, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		//when the upload image button is submitted/clicked..
		if (isset($_POST["submit"]) || isset($_POST["continue"])) {
			//get the dimensions of the image and store it in the variable '$check'
			$fileDimensions = getimagesize($_FILES["prod_img"]["tmp_name"]);
			if ($fileDimensions !== false) {
				echo "File is an image - " . $fileDimensions["mime"] . ".";
				// print_r($fileDimensions);
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($fileName1)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		//check if its greater than 500kb
		if ($_FILES["prod_img"]["size"] > 5000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if (
			$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif"
		) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["prod_img"]["tmp_name"], $fileName1)) {
				echo "The file " . basename($_FILES["prod_img"]["name"]) . " has been uploaded.";
				//echo '<image src="../image/'.basename( $_FILES["fileToUpload"]["name"]).'">';
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}

	uploadImage();

	$folderName = "../admin/images/uploads/";
	// $folderName = "../admin/images/uploads/";
	$fileName = $folderName . basename($_FILES["prod_img"]["name"]);


	$category_id = (int)$_POST['prod_category'];
	$brand_id = (int)$_POST['prod_brand'];
	$prod_title = $_POST['prod_title'];
	$prod_price = $_POST['prod_price'];
	$prod_desc = $_POST['prod_desc'];
	$prod_id = $_POST['prod_id'];

	$insert = updateProduct($category_id, $brand_id, $prod_title, $prod_price, $prod_desc, $fileName, $prod_id);

	if ($insert) {
		$_SESSION['upload_success'] = "Product updated successfully";
		header('Location: ../admin/index.php');
	} else {
		//echo failure
		$_SESSION['upload_error'] = "Error updating product";
		header('Location: ../admin/index.php');
	}
}

if (isset($_GET['delete_product_id'])) {


	$prod_id = $_GET['delete_product_id'];

	$del = deleteProduct($prod_id);

	if ($del) {

		$_SESSION['del-prod-success'] = 'Product deleted successfully ';
		header('Location: ../admin/index.php');
	} else {
		$_SESSION['del-prod-error'] = 'Error deleting product';
		header('Location: ../admin/index.php');
	}
}
