<?php 
	$error = array();

	if(isset($_GET['book_id'])) {
       

    //variables with null value

		$book_id= ''; 
        $name = '';
        $price = '';
        $image = '';
		
		$book_id = $_GET['book_id'];

		$conn = mysqli_connect("localhost", "root", "", "bookstorecreator");// connection of database

		$db_form_query = mysqli_query($conn, "SELECT * FROM insertbookinventory WHERE book_id = $book_id");
		$db_form_query_results = mysqli_fetch_array($db_form_query,MYSQLI_ASSOC);

		$name = $db_form_query_results['book_name'];
		$price = $db_form_query_results['price'];
		$image = $db_form_query_results['image']; 
	}


  //validations  and filtering the data
    if(isset($_POST['submit']))
    {
    	$firstname = $_POST['cust_fname'];
    	$lastname = $_POST['cust_lname'];
    	$address = $_POST['cust_address'];
    	$payment = $_POST['payment'];

		if(empty($firstname) || strlen($firstname) == 0) {
 			array_push($error, "firstname is require<br>");
    	} else {
        	$firstname = filter_var($_POST['cust_fname'], FILTER_SANITIZE_STRING);
   		}
		if(empty($lastname) || strlen($lastname) == 0) {
 			array_push($error, "lastname is require<br>");
    	} else {
        	$lastname = filter_var($_POST['cust_lname'], FILTER_SANITIZE_STRING);
   		}
		if(empty($address) || strlen($address) == 0) {
 			array_push($error, "address is require<br>"); 
   		} else {
       		$address = filter_var($_POST['cust_address'], FILTER_SANITIZE_STRING);
    	}
		if(empty($payment) || strlen($payment) == 0) {
			array_push($error, "Please choose a payment method <br>");
		} else {
			$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
		}
		$book_id = $_POST['book_id'];
	 
	 	if(empty($error))
	 	{
			 $conn = mysqli_connect("localhost", "root", "", "bookstorecreator");
			 
	 		$insert = mysqli_query($conn,"INSERT INTO users VALUES ('','$firstname','$lastname','$address','$payment')"); // inserting the data

	 		$query = mysqli_query($conn, "SELECT * FROM insertbookinventory WHERE book_id = $book_id"); 
	 		$details = mysqli_fetch_array($query);
	 		$quantity = $details['quantity'];

	 		$newQuantity = $quantity - 1;

	 		$update = mysqli_query($conn,"UPDATE insertbookinventory SET quantity = '$newQuantity' WHERE book_id='$book_id'"); // updating the data

	 		header("Location: checkout.php"); // link the page to checkout page
	 	}else{
	 		foreach ($error as $key => $value) {
	 			echo $value;
	 		}
	 		
	 	}
	}

 ?>


















<!DOCTYPE html>
<html>
<head>
	<title>Ankit Bajaj -Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Book Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="store.php">Store</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">Checkout</a>
      </li>
    </ul>
  </div>
</nav>
        
        
        
        
        
        
        
        <div class='confirmation col-sm-20'>
 	<div class='form'>
 		<form class="form-horizontal" action='cart.php' method='post'>

 			<div class="form-group text-center" ><br><br>
				<div style=" height: 20%; width=:100% ">
	 				<img src="<?php echo $image; ?>" style=" height: 20%; width: 20%;">
	 			</div><br><br>
			    <label class="control-label col-sm-4" >Book Name:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="<?php echo $name; ?>" disabled="disabled">
			    </div>
			 </div>

 			<div class="form-group">
			    <label class="control-label col-sm-4">Price:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="<?php echo $price; ?>" disabled="disabled">
			    </div>
			 </div>

			 <div class="form-group">
			    <label class="control-label col-sm-4">First Name:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="<?php if(isset($_POST['cust_fname'])) echo $_POST['cust_fname']?>" name="cust_fname">
			    </div>
			 </div>
			 
			 <div class="form-group">
			    <label class="control-label col-sm-4">Last Name:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="" name="cust_lname">
			    </div>
			 </div>
			 
			 <div class="form-group">
			    <label class="control-label col-sm-4">Address:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="" name="cust_address">
			    </div>
			 </div>
 			
 			<div class="form-group">
 				<label class="control-label col-sm-4">Payment:</label>
 				 <div class="col-sm-6">
			      <select name="payment" style="color: black">
					<option value="Credit Card">Credit Card</option>
					<option value="Debit Card">Debit Card</option>
					<option value="Cash on Delivery">Cash On Delivery</option>
				  </select>
				 </div> 
			</div>
			<input type="hidden" name="id" value="<?php echo $book_id; ?>">
			<div class="form-group" style="margin-bottom:12em;"> 
			    <div class="col-sm-offset-4">
			      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
			    </div>
			</div>
 		</form>
 	</div>
 </div>
        
        
        <!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4">

  <!-- Footer Elements -->
  <div class="container">

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-2 col-md-12 mb-4">

        <!--Image-->
        <div class="view overlay z-depth-1-half">
          <img src="images/img6.jpg" class="img-fluid"
            alt="">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-6 mb-4">

        <!--Image-->
        <div class="view overlay z-depth-1-half">
          <img src="images/img7.jpg" class="img-fluid"
            alt="">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-6 mb-4">

        <!--Image-->
        <div class="view overlay z-depth-1-half">
          <img src="images/img8.jpg" class="img-fluid"
            alt="">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-12 mb-4">

        <!--Image-->
        <div class="view overlay z-depth-1-half">
          <img src="images/img9.jpg" class="img-fluid"
            alt="">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-6 mb-4">

        <!--Image-->
        <div class="view overlay z-depth-1-half">
          <img src="images/img10.jpg" class="img-fluid"
            alt="">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-6 mb-4">

        <!--Image-->
        <div class="view overlay z-depth-1-half">
          <img src="images/img11.jpg" class="img-fluid"
            alt="">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://Ankit_bajaj@bookstore.com/"> BookStore.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
        
        </div>
         
</body>
</html>


