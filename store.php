<?php
// Start the session
session_start();
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



            <div class="products-grids">
                    <div class="col-md-8 products-grid-left">
                        <div class="products-grid-lft">
                            <h1 style="text-align: center; font-family: 'Lato', sans-serif;; font-size: 4em; color:white">List Of Products</h1><br><br>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "bookstorecreator"); // coonection of database
                            $sql = mysqli_query($conn, "SELECT * FROM insertbookinventory");

                           //variables
                            $book_id = 'book_id';
                            $name = 'book_name';
                            $price = 'price';
                            $quantity = 'quantity';
                            $image = 'image';
                            $auth_name='author_name';
                            $form = " ";

                            if(mysqli_num_rows($sql) > 0) {

                            while($row = mysqli_fetch_array($sql)) {
                                    $book_id = $row['book_id'];
                                    $name = $row['book_name'];
                                    $price = $row['price'];
                                    $quantity =$row ['quantity'];
                                    $image = $row['image'];
                                    $auth_name=$row['author_name'];

                                        $form .= "<div class='products'>
                                                    <div class='name' style='text-align:left;'>
                                                        <em><h4>$name</h4></em><br>
                                                    </div>
                                                    <div style='text-align:left;'>
                                                        <img src=$image style='height:100%; width:50%;'>
                                                    </div><br>


                                                    <div class='price' style='text-align:right;'>
                                                        <p>Price: $price</p><br>
                                                        <div class='auth_name' style='text-align:right;'>
                                                        <p>Author Name: $auth_name</p><br>
                                                    </div>
                                                    <div class='buyform' style='text-align:right; margin-bottom:8em;'>
                                                        <a href='cart.php?book_id=$book_id'>
                                                            <input type='submit' name='submit' value='Buy' class='btn btn-success' padding:12em>
                                                        </a>
                                                    </div><br>
                                                </div>
                                                ";
                                            }
                            echo $form;
                        }
                            ?>
                            <div class='posts_area'></div>
                        </div>
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

      <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://Ankit_bajaj@bookstore.com/"> BookStore.com</a>
      </div>
    >

    </footer>
    <!-- Footer -->

            </div>

    </body>
    </html>