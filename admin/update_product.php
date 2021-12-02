

<?php
//start session
session_start();
require ('../controllers/productcontroller.php');

if (isset($_GET['upid'])) {

    $id = $_GET['upid'];
    $prod = getOneProduct($id);
//    print_r($prod);
    $all_cat = getAllCategories();
    $all_brand = getAllBrand();
    $all_products = viewAllProducts();

// var_dump($user);
//    $cat_name=$brand[0]['cat_name'];
//    $cat_id=$brand[0]['cat_id'];

    $prod_id = $prod[0]['product_id'];
    $brand_id = $prod[0]['product_brand'];
    $cat_id = $prod[0]['product_cat'];
    $prod_title = $prod[0]['product_title'];
    $prod_desc = $prod[0]['product_desc'];
//    echo $prod_desc;
    $prod_price = $prod[0]['product_price'];
    $prod_img = $prod[0]['product_image'];





}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="p-4 pt-5">
            <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
            <ul>
                <li class="active">

                <li>
                    <a href="#../index.php">Home</a>
                </li>
                <li>
                    <a href="#addproduct.php">Add Produts</a>
                </li>
                <li>
                    <a href="#manage.php">Manage Products</a>
                </li>
                <li>
                    <a href="#addgallery.php">Gallery Upload</a>
                </li>
                <li>
                    <a href="#logout.php">Logout</a>
                </li>
            </ul>





        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">

                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn" data-toggle="modal" data-target="#addBrandModal">Add Brand</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" data-toggle="modal" data-target="#addCategoryModal">Add Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addproduct.php">Add Products</a>
                        </li>
                        <li class="nav-item">
                            <!--                    <a class="nav-link" href="manage.php">Manage Products</a>-->
                        </li>
                        <li class="nav-item">
                            <!--                    <a class="nav-link" href="addgallery.php">Gallery Upload</a>-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBrandModal">-->
        <!--              Launch demo modal-->
        <!--          </button>-->

        <?php
        include ('../error/flash-message.php');
        ?>



            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>

            </div>
            <div class="">
                <div id="error_message" style="color: firebrick;"></div>
                <div class="modal-body">
                    <form method="post" id="Uploadform" action="../actions/add_brand.php" enctype="multipart/form-data">


                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-ui-04"></i></span>
                                </div>
                                <select id="brand_id" class="form-control" name="prod_brand" required>
                                    <option  value="" disabled selected> -- select brand -- </option>
                                    <?php
                                    if ($all_brand){
                                        foreach ($all_brand as $value){
                                            $brand_name = $value['brand_name'];
                                            $brand_id = $value['brand_id'];

                                            echo "<option value='$brand_id'>$brand_name</option>";
                                        }

                                    }
                                    ?>
                                </select >
                                <small style="color:red;" id="category_error"></small>

                                <!--                                      <input id="name" type="text" placeholder="Name" class="form-control " name="name"   autocomplete="name" autofocus>-->
                                <select id="category_id" class="form-control pull-right" name="prod_category"  required>
                                    <option value="" disabled selected> -- select category -- </option>
                                    <?php
                                    if ($all_cat){
                                        foreach ($all_cat as $value){
                                            $cat_name = $value['cat_name'];
                                            $cat_id = $value['cat_id'];

                                            echo "<option value='$cat_id' >$cat_name</option>";
                                        }

                                    }
                                    ?>

                                </select>
                            </div>


                            <small style="color:red;" id="category_error"></small>
                        </div>

                        <div class="form-group">
                            <small class="mb-2">Product title: </small>
                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-align-left-2"></i></span>
                                </div>
                                <input  type="text" placeholder="Product title" class="form-control " name="prod_title" id="prod_title" value="<?=isset($prod_title)?($prod_title):'' ?>"  autocomplete="title" autofocus required>
                            </div>


                            <small style="color:red;" id="title_error"></small>

                        </div>
                        <div class="form-group">
                            <small class="mb-2">Price: </small>
                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-active-40"></i></span>
                                </div>
                                <input  type="number" placeholder="Product price"  class="form-control "  id="prod_price" name="prod_price" value="<?=isset($prod_price)?($prod_price):'' ?>"  autocomplete="price" required>

                            </div>


                            <small style="color:red;" id="price_error"></small>

                        </div>

                        <div class="form-group">
                            <small class="mb-2">Product description: </small>
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-align-left-2"></i></span>
                                </div>
                                <input  type="text" id="prod_desc" placeholder="Product description" name="prod_desc" class="form-control" value="<?=isset($prod_desc)?($prod_desc):'' ?>"   required></input>


                            </div>


                            <small style="color:red;" id="description_error"></small>

                        </div>

                        <div class="form-group">
                            <small class="mb-2">Product image: </small>
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-image"></i></span>
                                </div>
                                <input type="file" class="form-control" id="prod_img" name="prod_img" accept="image/x-png,image/gif,image/jpeg" placeholder="Select product image" required>
                                <input type="hidden" class="form-control" value="<?=isset($prod_id)?($prod_id):'' ?>"  id="prod_id" name="prod_id" required>



                            </div>

                            <small style="color:red;" id="image_error" ></small>
                        </div>

                        <div class="form-group">

                            <!--                                  <div class="input-group input-group-merge input-group-alternative mb-3">-->
                            <!--                                      <div class="input-group-prepend">-->
                            <!--                                          <span class="input-group-text"><i class="ni ni-active-40"></i></span>-->
                            <!--                                      </div>-->
                            <!--                                      <input  type="hidden" class="form-control" name="status" value="1">-->
                            <!---->
                            <!--                                  </div>-->

                        </div>


                        <input type="submit" name="update_prod" class="btn btn-primary" value="Add Product">


                    </form>

                </div>
            </div>










        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/alert.js"></script>
        <script src="js/ajax.js"></script>

</body>
</html>