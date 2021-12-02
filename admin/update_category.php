

<?php
//start session
session_start();
require ('../controllers/productcontroller.php');

if (isset($_GET['upid'])) {

    $id = $_GET['upid'];
    $brand = getOneCategory($id);
// var_dump($user);
    $cat_name=$brand[0]['cat_name'];
    $cat_id=$brand[0]['cat_id'];



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
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>

            </div>
            <div class="">
                <div id="error_message" style="color: firebrick;"></div>
                <form method="POST" action="../actions/add_brand.php" id="addBrandForm" onsubmit="return validateAddNewCategory();">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Category Name:</label>
                        <input type="text" class="form-control col-lg-5" id="category_name" value="<?=isset($cat_name)?($cat_name):'' ?>" name="cat_name" required>

                        <input type="hidden" class="form-control" id="recipient-name" value="<?=isset($cat_id)?($cat_id):'' ?>" name="cat_id" required>
                    </div>

                    <div class="modal-footer">

                        <input type="submit"  name="update_category" value = "Update" class="btn btn-primary d-flex justify-content-end">
                    </div>
                </form>
            </div>










        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/alert.js"></script>
        <script src="js/ajax.js"></script>

</body>
</html>