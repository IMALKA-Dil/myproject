<?php

session_start();
include 'config.php';

$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
};
?>
<?php
if(isset($_POST['btn-checkout'])){


   mysqli_query($conn, "DELETE FROM `cart` WHERE userId = '$user_id'") or die('query failed');
   header('location:cart.php');

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
          <div class="user-profile">

     <?php
        $select_user =  mysqli_query($conn, "SELECT * FROM `user` WHERE userId = '$user_id'")  or die('query failed');
        if(mysqli_num_rows($select_user) > 0){
           $fetch_user = mysqli_fetch_assoc($select_user);
        };
     ?>

     <p> customer name: <span class="udetails"><?php echo $fetch_user['name']; ?></span> </p>
     <p> customer email : <span class="udetails"><?php echo $fetch_user['email']; ?></span> </p>


  </div>

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
                  <input type="text"  name="cart_quantity" class="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">

               </form>
            </td>
            <td class="cart-td">$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>

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
            <input type="submit" href="#" class="btn-checkout <?php echo ($grand_total > 1)?'':'disabled'; ?>" onClick=" window.print();" value="checkout" name="btn-checkout">

          </form>


        </div>
      </div>
    </div>
  </div>
</div>

  </divition>

</body>
</html>
