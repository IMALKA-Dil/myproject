<?php
include 'config.php';






if(isset($_GET['logout'])){
  unset($user_id);
  session_destroy();
  header('location:home.php');
}
if(isset($_GET['gohome'])){
    header('location:home.php?user_ID=$user_id');
}






if(isset($_GET['product_number'])){
			include "config.php";
$productid= $_GET['product_number'];
    //echo $book_number;

    $sql_select="select * from item where Icode='$productid'";
    $result=mysqli_query($conn,$sql_select);

    if(mysqli_num_rows($result)>0){

        while ($row=mysqli_fetch_assoc($result))
        {




$price=$row['price'];


?>




<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="B-css\bootstrap-grid.min.css">

    <link rel="stylesheet" type="text/css" href="B-css\bootstrap.min.css">
     <link rel="stylesheet" href="B-css/all.min.css">
     <link rel="stylesheet" href="B-css/bootstrap-icons/bootstrap-icons.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <script src="https://unpkg.com/scrollreveal"></script>
  <title>DashBoard</title>

</head>
<body>
  <header class="cart-header">
    <div class="row">
      <div class="col">

      </div>
      <div class="col-lg-">
        <h1><span class="cake">Cake n'</span> <span class="bake">Bake</span></h1>
      </div>
      <div class="col">

      </div>

    </div>
  </header>
  <divition class="row cart-divitsion">

    <div class="row-cart">
      <div class="col-1">

      </div>
      <div class="col-lg-">
        <div>
          <br />
          <p>
            <span class="cart-span-home"><a href="dashboard.php" name="gohome">dashboard/</a></span><span class="cart-span-wishList"></span>/<span class="cart-span-home"><a href="cart.php?logout=<?php echo $user_id;?>" onclick="return confirm('are your sure you want to logout')" class="delete-btn cart-span-home">Logout</a></span>
          </p>
        </div>
      </div>
      <div class="col-10">

      </div>
    </div>
    <div class="cart-table-container">
      <div class="container">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">
              <p class="legend-e-form">
                Edit form
              </p>
              <div  class="fieldset-e-form">


              <form action="" method="post">



              <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uprice" value="<?php echo $price;?>">

              </div>


              <button type="submit" class="btn btn-primary" name="edit">edit</button>


            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </divition>

  <footer id="footer">
    <div class="footer-top">
      <div class="footer-continer">
        <div class="row">
          <div class="col-1">

          </div>
          <div class-"col-lg-3 col-md-6">
            <div class="footer-info">
              <h3 class="footer-title">Cake n' Bake</h3>
              <p class="footer-paragraph">
                Q96C+WWW,
                <br />Colombo-Batticaloa Hwy ,
                <br />Kuruwita
                <br />
                <br />
                phone: 07071563313<br />
                Email:cakeNbakeKURUWITA@gmail.com


              </p>
              <div class="social-links mt-3">
                  <a href="#" class="footer-links twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="footer-links facebook"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="footer-links instagram"><i class="fa fa-instagram"></i></a>
                  <a href="#" class="footer-links whatsapp"><i class="fa fa-whatsapp"></i></a>
                </div>
            </div>
          </div>
          <div class="col">

          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
  <div class="row">
    <div class="col">

    </div>
    <div class="col-lg-3 col-md-6">
      <div class="designer-info">
        <h3 class="designer-name">Imalka .</h3>
  <div class="row">

  <div class="col">

  </div>
        <div class="social-links mt-3">
            <a href="#" class="footer-links-designer twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="footer-links-designer facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="footer-links-designer instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="footer-links-designer whatsapp"><i class="fa fa-linkedin"></i></a>
          </div>
          <div class="col">

          </div>
        </div>
          <br />
          <div class="row">
            <div class="col">

            </div><div class="mt-3">
              <p class="copyright-paragraph">
                      ©2022 Copyright all right reserved

              </p>
            </div><div class="col">

            </div>
          </div>

      </div>
    </div>
    <div class="col">

    </div>
    </div>

  </div>
    </div>
  </footer>


</body>
</html>
<?php

        }
    }


}



if(isset($_POST['edit'])){
$price= mysqli_real_escape_string($conn,$_POST['uprice']);



                    $sql_edit="update  item set  price='$price'
                              where Icode='$productid' ";

					if($result=mysqli_query($conn,$sql_edit)){
			?>
      <script>
        alert("item updated");
      </script>
      <?php


					}
					else{
						echo "price is not edited ".mysqli_error($conn);
					}

					}




?>
