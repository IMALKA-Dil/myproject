<?php
session_start();
include 'config.php';

$user_id = $_SESSION['user_id'];

if(isset($_GET['cart_quantity'])){
   $update_quantity = $_GET['cart_quantity'];
   $update_id = $_GET['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE Icode = '$update_id'") or die('query failed');
   $message[] = 'cart quantity updated successfully!';};
if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
  unset($user_id);
  session_destroy();
  header('location:index.php');
}
if(isset($_GET['gohome'])){
    header('location:index.php?user_ID=$user_id');
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE Icode = '$remove_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE userId = '$user_id'") or die('query failed');
   header('location:cart.php');
}



 ?>
 <?php
 if(isset($_POST['btn-checkout'])){


    header('location:print.php');

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
  <title>Cake n' Bake</title>

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
          <h1 class="cart-h1-desc">WishList</h1>
          <br />
          <p>
            <span class="cart-span-home"><a href="index.php?userId=<?php echo $user_id;?>" name="gohome">Home/</a></span><span class="cart-span-wishList">WishList</span>/<span class="cart-span-home"><a href="cart.php?logout=<?php echo $user_id;?>" onclick="return confirm('are your sure you want to logout')" class="delete-btn cart-span-home">Logout</a></span>
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
         <th class="cart-th-name"> Name</th>
         <th class="cart-th">price</th>
         <th class="cart-th"> quantity</th>
         <th class="cart-th">total price</th>
         <th class="cart-th">action</th>
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` C,`item` T WHERE userId = '$user_id' and C.Icode=T.Icode") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td class="cart-td-name">
              <div class="Item-info-cart">
                <div>
                      <?php echo'<img src="data:image;base64,'.base64_encode($fetch_cart['image']).'" alt="image" style="width:100px; height:100px; ">';?>
                </div>
                <div>
                  <?php echo $fetch_cart['name']; ?>
                </div>

              </div>


              </td>

            <td class="cart-td">$<?php echo $fetch_cart['price']; ?>/-</td>
            <td class="cart-td">
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['Icode']; ?>">
                  <input type="number" min="1" name="cart_quantity" class="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="update" class="cart_quantity-btn option-btn">
               </form>
            </td>
            <td class="cart-td">$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td class="cart-td"><a href="cart.php?remove=<?php echo $fetch_cart['Icode']; ?>" class="cart-delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4" class="cart-bottom-td">grand total :</td>
         <td  class="cart-td cart-td-b">$<?php echo $grand_total; ?>/-</td>
<td>

</td>
      </tr>
   </tbody>
   </table>
          </form>
          <form action="" method="post">
            <input type="submit" href="#" class="btn-checkout <?php echo ($grand_total > 1)?'':'disabled'; ?>"  value="checkout Page" name="btn-checkout">

          </form>


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
