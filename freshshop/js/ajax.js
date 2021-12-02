// //var inputVal;

// var mypayP = document.getElementById("amount").value;
            
// //alert(inputVal);


//   function initPayPalButton() {
//   paypal.Button.render({
//     style: {
//       shape: 'rect',
//       color: 'gold',
//       layout: 'vertical',
//       label: 'paypal',
      
//     },

//     createOrder: function(data, actions) {
//       return actions.order.create({
//         purchase_units: [{"amount":{"currency_code":"USD","value": mypayP }}]
//       });
//     },

//     onApprove: function(data, actions) {
//       return actions.order.capture().then(function(details) {
//         window.location = '../action/process_payment.php'
//         //alert('Transaction completed by ' + details.payer.name.given_name + '!');
//       });
//     },

//     onError: function(err) {
//       console.log(err);
//     }
//   }).render('#paypal-button-container');
// }
// initPayPalButton();
// // 



//  ################ Payment with Paystack ##################


const pay = document.getElementById('pay');

const email = document.getElementById('email').value;
const amount = document.getElementById('amount').value;

pay.addEventListener('submit',payWithPaystack,false)

function payWithPaystack(e){

  e.preventDefault();

  // e.preventDefault(e);
  let handler = PaystackPop.setup({
    key: 'pk_test_ebe131dfc1b732bcaa101790b8a935f27b9ebed5',
    email: email,
    amount: amount+"00",
    currency : "GHS",
    
    callback: function(response){
        // alert('success. transaction ref is ' + response.reference);
          window.location = "./verify_payment.php?ref="+response.reference+"&amount="+amount;
    },
    onClose: function(){
        alert('window closed');

    }
  });
  handler.openIframe();
}





//  ################ Payment with Paystack -END ##################


function addItemToCart(prod_id, qty){
  // alert(prod_id)
    var endpoint =  "../controllers/cart_controller.php?prod_id="+prod_id+"&qty="+qty+"&type=add";


    // TODO : add flash-message to product.php.

  $.ajax({
    type:"GET",
    url:endpoint,
    success: function(data){
      var msg = data.hasOwnProperty('message');
      setInterval('location.reload()', 100);
      // console.log(data);
      var dt = "Item already in cart";
      if (data == dt) {
        swal("Oops!", `${data}`, "error")
      }else{
        swal("Good job!", `${data}`, "success")
      }

    },
    error: (err)=>console.log(err)
  })
}









function removeCartItem(prod_id){
  // alert(prod_id)
    var endpoint =  "../controllers/cart_controller.php?prod_id="+prod_id+"&qty="+"&type=delete";

  $.ajax({
    type:"GET",
    url:endpoint,
    success: function(data){
      var msg = data.hasOwnProperty('message');
      // console.log(data);
   
      setInterval('location.reload()', 100);
      alert(data)
    //   if (data == dt) {
    //     swal("Oops!", `${data}`, "error")
    //   }else{
    //     swal("Good job!", `${data}`, "success")
    //   }

    },
    error: (err)=>console.log(err)
  })

}

function updateCartItemQty(prod_id){

  // alert(prod_id);
    var qty = document.getElementById("update-qty").value;
    // alert(qty);
    if(qty < 0){
        document.getElementById("qty_span").innerHTML = 'quantity cannot be negative';
        window.setTimeout(function(){location.href="shoppingCart.php"},1000);
    }else {
      var endpoint =  "../controllers/cart_controller.php?prod_id="+prod_id+"&qty="+qty+"&type=update";

      $.ajax({
        type:"GET",
        url:endpoint,
        success: function(data){
          // document.getElementById("total").innerHTML = 'quantity cannot be negative';
          // var msg = data.hasOwnProperty('message');
          // console.log(data);
          var dt = "Item already in cart";
          setInterval('location.reload()', 100);
          if (data == dt) {
            swal("Oops!", `${data}`, "error")
          }else{
            swal("Good job!", `${data}`, "success")
          }

        },
        error: (err)=>console.log(err)
      })

    }


}


function addItemToCartIndex(prod_id, qty){
    var isOkay = true;
    var xhttp;
    if(qty != 1){
        qty = document.getElementById("qty").value;
        if(qty.length == 0){
            isOkay = false;
         document.getElementById("cartResponse").innerHTML = "Please enter a quantity";
        }
    }
    if(isOkay){
        if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
        xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            var jsonResponse = JSON.parse(this.responseText);
            if (jsonResponse[0].status == 'success'){
               document.getElementById("cartResponse").style.color = 'green';
               document.getElementById("cartResponse").innerHTML = " " + jsonResponse[0].message;
               window.setTimeout(function(){location.reload()},1500);
            } else if (jsonResponse[0].status == 'failed'){
              document.getElementById("cartResponse").style.color = 'red';
              document.getElementById("cartResponse").innerHTML = " " + jsonResponse[0].message;
                window.setTimeout(function(){location.reload()},1000);
            } else{
                console.log(jsonResponse[0].message);
            }
        }
    };
    xhttp.open("GET", "./controller/cart_controller.php?prod_id="+prod_id+"&qty="+qty+"&type=add", true);
    xhttp.send();

    }
}
