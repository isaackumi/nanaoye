<?php
    //start session
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="../index.php">Home</a>
                </li>
                <li>
                    <a href="addproduct.php">Add Produts</a>
                </li>
                <li>
                    <a href="manage.php">Manage Products</a>
                </li>
                <li>
                    <a href="addgallery.php">Gallery Upload</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
              </ul>
            </li>
            
            
          

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
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="addproduct.php">Add Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage.php">Manage Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addgallery.php">Gallery Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <h2 class="mb-4">Welcom Admin</h2>
        <form id="create-post" data-parsley-validate class="form-horizontal form-label-left" action="productproc.php" enctype="multipart/form-data" method="post">

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Product Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input type="text" id="title" name="producttitle" required="required" class="form-control ">
              </div>
            </div>

            <div class="item form-group col-md-3 col-sm-3 label-align">
                <select class="form-control col-form-label" name="category">
                    <option class="hidden"  selected disabled required> Category</option>
                    <option>Nose Mask</option>
                    <option>Hoodies </option>
                    <option>T-shirt </option>
                    <option>Hoodies male</option>
                    <option>Jacket</option>
                    <option>New Arrival</option>
                    <option>Recommended</option>
                    
                    
                    <option>Other</option>
                </select>
            </div>


            <div class="item form-group">
              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Product Description</label>
              <div class="col-md-6 col-sm-6 ">
                <textarea name="desc"  rows="4" cols="100" maxlength="163"></textarea>
              </div>
            </div>

             <div class="item form-group">
              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">PRODUCT PRICE</label>
              <div class="col-md-6 col-sm-6 ">
                <input class="form-control" type="text" name="price">
              </div>
            </div>

            <div class="item form-group">
            <label for="myfile" class="col-form-label col-md-2 col-sm-2 label-align">UPLOAD PRODUCT IMAGE/THUMBNAIL:</label>
            <input type="file" id="img1" name="img1" accept="image/*">
            </div>


            
            <h4><i>Upload More Images</i></h4>
            <div class="item form-group">
            <label for="myfile" class="col-form-label col-md-2 col-sm-2 label-align">UPLOAD IMAGES:</label>
            <input type="file" id="img2" name="img2" accept="image/*"><br>
            </div>

            <div class="item form-group">
            <label for="myfile" class="col-form-label col-md-2 col-sm-2 label-align">UPLOAD IMAGES:</label>
            <input type="file" id="img3" name="img3" accept="image/*">
            </div>

           

            
            <!-- <h4><i>Upload zip folders which contain include exe.,pdfs,docs,ppt.</i></h4>
            <div class="item form-group">
            <label for="myfile" class="col-form-label col-md-3 col-sm-3 label-align">UPLOAD RESOURCES(ZIP):</label>
            <input type="file" id="zip" name="zip" accept="zip/*">
            </div> -->

           


            <div class="item form-group">
              <div class="col-md-6 col-sm-6 offset-md-3">
                <button type="submit" name="submit"  class="btn btn-success ">UPLOAD NOW</button>
              </div>
            </div>

          </form>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>