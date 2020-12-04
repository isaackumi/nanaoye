 <?php     


//connect to the core file for general configuration
require("../settings/core.php");

//check for login in the core file
check_login();

?>

<!-- html to display the form with details in it -->
<!DOCTYPE html>
<html>
<head>
  <title>Update Product</title>
  <meta charset="utf-8">
  
  <!--CDN Bootstrap and Jquery-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
  <link href='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css' rel='stylesheet' id='bootstrap-css'>
  <script src='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js'></script>
  <script src='//code.jquery.com/jquery-1.11.1.min.js'></script>



</head>
<body>
   <div class="container">
    <div class="jumbotron">
      <h1>Welcome Our Adminstrator</h1> 
      <p>Recycling Glass to form amazing Products. Lets Explore together, Purchase made in Ghana as you also save and protect the environment</p> 
    </div>
  </div>
    <!-- menu for the page -->
  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Lets Recycle</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="../admin_index.php">Home</a></li>
          <li><a href="../admin/Brand.php">Add Brand</a></li>
          <li ><a href="../actions/update_brand.php">Edit Brand</a></li>
          <li><a href="../admin/add_categ.php">Add Category</a></li>
          <li><a href="../actions/update_categ.php">Edit Category</a></li>
          <li><a href="../actions/product.php">Add Product</a></li>
          <li><a href="../actions/update_product.php">Update Product</a></li>
          <li class="active"><a href="../views/cart.php">Cart</a></li>

    
        </ul>
        <ul class="nav navbar-nav navbar-right">
          </ul>
      </div>
    </nav>
    <?php

      echo (isset($_SESSION["user_id"]))? "<a href='../login/logout.php'><span class='glyphicon glyphicon-log-in'></span>Logout</a>" : "<a href='../login/login.php'><span class='glyphicon glyphicon-log-in'></span>Login</a>";

    ?>

  </div>

  <!-- php for the processing og the data that would be input -->
  <?php
    //include the customer controller
    require('../controllers/brand_controller.php');

    //variable for customer list
    $list;
    global $list; 
    $customer_id = $_SESSION["customer_id"];
      //run the function to return all customer list
    $cart_list = viewone_Cart_z($customer_id);

    
    
    //Page title depending on search or general brand list
    echo "<ul class='list-group'>";
    echo "<li><a href='#' class='list-group-item active'>";
    echo (isset($_GET['bsearch']))? 'Search Result' : 'Product List';
    echo "</a></li>";
    
    //check permission if user id an admin or not 
    $u_perm = check_permission();
    

    //checking if customer details was found
    if ($cart_list) {
      //run through returned list of details 
      echo "

        <div class='container'>
            <div class='row'>
                <div class='col-sm-12 col-md-10 col-md-offset-1'>
                    <table class='table table-hover'>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th class='text-center'>Price</th>
                                <th class='text-center'>Total</th>
                                <th> </th>
                            </tr>
                        </thead>
                        
      ";
      foreach ($cart_list as $cart) {
        $pid = $cart['p_id'];
              $ip_add = $cart['ip_add'];
              $cid = $cart['c_id'];
              $qty = $cart['qty'];

              $prod_list = view_one_product_z($pid);
              $ptitle = $prod_list[0]['product_title'];
              $price = $prod_list[0]['product_price'];
              $pimage = $prod_list[0]['product_image'];     
        
        $total_price= $qty*$price;    
        echo "
                <tbody>
                    <tr>
                                  <td class='col-sm-8 col-md-6'>
                                  <div class='media'>
                                       <img class='media-object' src=$pimage width=100 height= 80> 
                                      <div class='media-body'>
                                          <h4 class='media-heading'>$ptitle </h4>
                                      </div>
                                  </div></td>
                                  <td class='col-sm-1 col-md-1' style='text-align: center'>
                                  <form method='POST' action='../actions/cart_manag.php'>
                                  <input type='number' class='form-control' name='qty' value=$qty> 
                                  <input type='hidden' name='p_id' value='$pid'>
                                  
                                  </form>
                                  </td>
                                  <td class='col-sm-1 col-md-1 text-center'><strong>$price</strong></td>
                                  <td class='col-sm-1 col-md-1 text-center'><strong>$total_price</strong></td>
                                  <td class='col-sm-1 col-md-1'>
                                  <form method='POST' action='../actions/remove_cart.php'>
                                  <input type='hidden' name='p_id' value='$pid'>
                                  </form>
                                </td>
                              </tr>

                          

        ";
        
      }
    }else{
      echo "<li>No record found</li>";
    }
    //end of list
    echo "</ul>";

    

  ?>


  <input type="hidden" value='<?php echo $total_price; ?>' id="myInput">


  <!-- <form id='jsform' >
      <input  type='hidden' onload="getamount()" name='num'  id='num'>
  </form> -->


<div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" data-sdk-integration-source="button-factory"></script>


  <script >


    //var inputVal;

    var mypayP = document.getElementById("myInput").value;
            
    //alert(inputVal);
 
   
      function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"USD","value": mypayP }}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            window.location = '../action/process_payment.php'
            //alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>


</body>
</html>