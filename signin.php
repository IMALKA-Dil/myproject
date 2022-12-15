<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);
   $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);


   $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }else{
      mysqli_query($conn, "INSERT INTO `user` (name, password, email,mobile_number) VALUES('$name','$pass','$email', '$mobile')") or die('query failed');
      $message[] = 'registered successfully!';

   }

}

?>



<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Cake n' Bake</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">

  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="plugins/style.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
</head>

<body id="body">

  <?php
    if(isset($message)){
      foreach ($message as $message) {

/*
        '<div class="row">
        <div class="col">

        </div>
        <div class="message col-md-6 col-md-offset-3  onclick="this.remove();">'
        .$message.
      '</div>
        <div class="col"
        </div>';
*/
 echo '<div class="message" onclick="this.remove();">'.$message.'</div>';


      }
    }

  ?>
<section class="signin-page account">

  <div class="container">
    <div class="row">

      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="home.php">
            <img src="images/logo.png" alt="">
          </a>
          <h2 class="text-center">Create Your Account</h2>
          <form class="text-left clearfix" action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control"  placeholder=" Name" id="name" name='name'>
            </div>

            <div class="form-group">
              <input type="email" class="form-control"  placeholder="Email" id='email' name="email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control"  placeholder="Password" id='password' name='password'>
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Mobile Number" id='mobile' name='mobile'>
            </div>
            <div class="text-center">
              <input type="submit" value="Sign In" name="submit"  id="submit" class="btn btn-main text-center" />
            </div>
          </form>
          <p class="mt-20">Already have an account ?<a href="login.php"> Login</a></p>

        </div>
      </div>

    </div>
  </div>
</section>

    <!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="script.js"></script>



  </body>
  </html>
