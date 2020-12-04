
//function to validate add customer form
function cutomervalidation(){

	//grab form data
	var prodt = document.getElementById('pdtitle').value;
	var prodp = document.getElementById('pdprice').value;

	//define regex for name and phone
	var titlereg = /[aA-zZ]/gm;
	var pricereg = /[0-9]{1,10}/gm;

	//test for title
	if (!titlereg.test(prodt)) {

		//prevent form submission and alert error
		event.preventDefault();
		alert('Invalid Title - only text allowed');

		//test for price
	}else if(!pricereg.test(prodp)){

		//prevent form submission and alert error
		event.preventDefault();
		alert('Invalid Price - only numbers required');
	}

}
