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
            <span class="cart-span-home"><a href="index.php" name="gohome">Home/</a></span><span class="cart-span-wishList"><a href="dashboard.php" name="gohome">Item/</a></span>/<span class="cart-span-home"><a href="cart.php?logout=<?php echo $user_id;?>" onclick="return confirm('are your sure you want to logout')" class="delete-btn cart-span-home">Logout</a></span>
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




                <form method="" action="">
                  <table class="cart-table">
            <thead>

               <th class="cart-th">Item code</th>
               <th class="cart-th">User Id</th>
               <th class="cart-th">price</th>
               <th class="cart-th">quantity</th>
            </thead>
            <tbody>
            <?php
               $order_query = mysqli_query($conn, "SELECT * FROM `userOrder`") or die('query failed');

               if(mysqli_num_rows($order_query) > 0){
                  while($fetch_edit = mysqli_fetch_assoc($order_query)){
            ?>
               <tr>


                 <td class="cart-td"><?php echo $fetch_edit['Icode']; ?></td>
                 <td class="cart-td"><?php echo $fetch_edit['userId']; ?></td>
                   <td class="cart-td"><?php echo $fetch_edit['Price']; ?></td>
                <td class="cart-td"><?php echo $fetch_edit['quantity']; ?></td>

               </tr>
               <?php

                     }
                   }

      ?>

         </tbody>
         </table>
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
  <!-- Modal -->
  <div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Price</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $price;?>">

        </div>


        <button type="submit" class="btn btn-primary" name="edit-btn">Submit</button>
      </form>
      </div>

    </div>
  </div>
</div>

</body>
</html>
