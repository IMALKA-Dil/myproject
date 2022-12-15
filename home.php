<?php

include 'config.php';
if(isset($_POST['submit'])){
$name= mysqli_real_escape_string($conn,$_POST['name']);
$password= mysqli_real_escape_string($conn,$_POST['password']);
$select= mysqli_query($conn,"select * from `user` where name='$name' and password='$password'") or die ('query failed');

if (mysqli_num_rows($select)> 0) {
  $row = mysqli_fetch_assoc($select);
  $_SESSION['user_id'] = $row['userid'];
  header('location:cart.php');

}
else{
  $message[] ='incorrect password or user name';
}
}


if(isset($_POST['signin'])){

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















//include 'config.php';
//session_start();
//$user_id= $_SESSION['user_id'];

//if(!isset($user_id))
    //header('location:login.php');

?>

<!DOCTYPE html>
<html lang="en">
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
<body id="home-body">


<divition class="home">

  <header>


    <nav>
      <ul class="topnav" id="dropDownClick">
        <li class="logo"><span class="cake">Cake n'</span> <span class="bake">Bake</span></li>
        <li><a href="#"  onclick="closeDropDownMenu();">Home</a></li>
        <li><a href="#"  onclick="closeDropDownMenu();">About</a></li>
        <li><a href="#"  onclick="closeDropDownMenu();">Menu</a></li>
      <!--  <li><a href="#">Specials</a></li> -->
        <li><a href="#"  onclick="closeDropDownMenu();">Events</a></li>
        <li><a href="#"  onclick="closeDropDownMenu();">Gallery</a></li>
        <li><a href="#"  onclick="closeDropDownMenu();">Contact</a></li>
          <li>



  <a href="" class="model-btn" data-toggle="modal" data-target="#exampleModal" onclick="closeDropDownMenu();">Account</a>







        <li>
          <a class="btn-wishList" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         WishList
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         <a class="dropdown-item" href="#">Pants</a>
         <a class="dropdown-item" href="#">Shirts</a>
         <a class="dropdown-item" href="#">Apparel</a>
       </div>
        </li>

       <li class="dropDownIcon"><a href="javascript:void(0);" onclick="dropDownMenu()"><div class="menu-btn">
    <div class="menu-btn__burger"></div>
  </div></a></li>


      </ul>
    </nav>



  </header>


  <!-- Models -->



  <!-- Button trigger modal -->


  <!-- Modal -->



  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h1 class="modal-h1">WELCOME BACK</h1>
          <form>
        <div class="form-group">

          <input   type="text" class="form-control"  placeholder="Name" name="name" id="name" id="exampleInputEmail1" aria-describedby="nameHelp" >

        </div>
        <div>

          <br />
        </div>
        <div class="form-group">

          <input type="password" class="form-control" name="password" id="password" id="exampleInputPassword1" placeholder="Password">
        </div>

        <div class="text-center">
          <input type="submit" class="btn btn-main text-center" name="submit" id="submit" value="submit"/>
        </div>
      </form>
                <p class="mt-20 modal-p">New in this site ?  <a href=""  data-toggle="modal" data-target="#exampleModal1">Create New Account</a>
</p>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>





    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h2 class="modal-h1">Create Your Account</h2>

              <?php
                if(isset($message)){
                  foreach ($message as $message) {


             echo '<div class="message" onclick="this.remove();">'.$message.'</div>';


                  }
                }

              ?>
            <form class="text-left clearfix" action="" method="post">
              <div class="form-group">
                <input type="text" class="form-control"  placeholder=" Name" id="exampleInputEmail1" id="name" name='name'>
              </div>

              <div class="form-group">
                <input type="email" class="form-control"  placeholder="Email" id="exampleInputEmail1" id='email' name="email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control"  placeholder="Password" id='password'  id="exampleInputPassword1" name='password'>
              </div>
              <div class="form-group">
                <input type="text" class="form-control"  placeholder="Mobile Number" id="exampleInputEmail1" id='mobile' name='mobile'>
              </div>
              <div class="text-center">
                <input type="submit" value="Sign In" name="signin"  id="signin" class="btn btn-main text-center"    data-toggle="modal" data-target="#exampleModal" data-dismiss="modal" data-toggle="modal"


                 />
              </div>
            </form>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>






  <div class="jumbotron jubmotron-fluid">

       <div class='container'>
        <h1 class="display-3">Cake n' Bake</h1>
<p class="lead">Delivering great food for more than 18 years!</p>

      </div>



       </div>



</divition>

















<divition class="about">



<div class="row">
  <div class="row">
    <div class="col">

    </div>
  </div>
  <div class="row">
    <div class="col">

    </div>
    <div class="col-img col-sm-12 col-md-5">

    </div>
    <div class="col">

    </div>
    <div class="col-sm-12 col-md-5 col-details">

      <h1 class="abouth1">

Lorem ipsum
dolor sit amet, consectetur <br />adipiscing elit, sed do

      </h1>


<p class="aboutp1">
  Lorem ipsum dolor sit amet, consectetur <br />
  adipiscing elit, sed do ei<br />
  usmod tempor incididunt ut labore et dolore magna aliqua.
</p>

<ol>

  <li class="about-li">
    # Lorem ipsum dolor sit amet, consectetur adipiscing elit,
  </li>

    <li class="about-li">
      # Lorem ipsum dolor sit amet, consectetur adipiscing elit,
    </li>


      <li class="about-li">
        # Lorem ipsum dolor sit amet, consectetur adipiscing elit,
      </li>
</ol>
    </div>
    <div class="col">

    </div>
  </div>
  <div class="row">
    <div class="col">

    </div>
  </div>
</div>


</divition>



<divition class="whyus">

<div class="whysus-content scrollrel-title">

    <h1 class="whyush1">Why Us</h1>
    <div class="whyUs-line">


  </div>
  <br />
<h1 class="wychose scrollrel-h1">Why Choose Our Bakery </h1>
 </div>
 <br />
 <br />
 <br />

  <div class="row wy-us-row">

    <div class=" col-sm-12 col-lg-4 whyUs-title1">
      <div class="img-fluid size-img whyus-div">
        <div class="whyus-content">
          <h1 class="whyus-h1-nomber">01</h1>
          <h1 class="whyus-h1-caption">lorem Ipsum</h1>
          <p class="whyus-p-paragraph">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit,<br /> sed do eiusmod tempo
            r incididunt

          </p>
        </div>

      </div>
    </div>




        <div class=" col-sm-12 col-lg-4 whyUs-title2">
          <div class="img-fluid size-img whyus-div">
            <div class="whyus-content">
              <h1 class="whyus-h1-nomber">02</h1>
              <h1 class="whyus-h1-caption">lorem Ipsum</h1>
              <p class="whyus-p-paragraph">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit,<br /> sed do eiusmod tempo
                r incididunt

              </p>
            </div>
          </div>
        </div>


            <div class=" col-sm-12 col-lg-4 whyUs-title3">
              <div class="img-fluid size-img whyus-div">
                <div class="whyus-content">
                  <h1 class="whyus-h1-nomber">03</h1>
                  <h1 class="whyus-h1-caption">lorem Ipsum</h1>
                  <p class="whyus-p-paragraph">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,<br /> sed do eiusmod tempo
                    r incididunt

                  </p>
                </div>
              </div>
            </div>
  </div>

</divition>



<divition class="Menu scrollrel-title">

  <div class="whysus-content">

      <h1 class="Menuh1">Menu</h1>
      <div class="whyUs-line">


    </div>
    <br />
  <h1 class="Menu-P scrollrel-h1">Why Choose Our Bakerya </h1>
   </div>


   <br/>
   <div class="row">
     <div class="col">

     </div>
     <ul class="menu-list">
       <li class="menu-item"> <a href="" class="menu-item-a">Chocolate </a></li>
        <li class="menu-item"> <a href="" class="menu-item-a">Chocolate </a></li>
     <li class="menu-item"> <a href="" class="menu-item-a">Chocolate </a></li>
     <li class="menu-item"> <a href="" class="menu-item-a">Chocolate </a></li>

     </ul>

     <div class="col">

     </div>
   </div>


</divition>


<!--
<divition class="Specials">


    <div class="whysus-content">

        <h1 class="Menuh1">SPECIALS</h1>
        <div class="whyUs-line">


      </div>
      <br />
    <h1 class="Menu-P">Check Our Specials</h1>
     </div>
<div class="row">
  <div class="col">

  </div>

<div class="sp-container">
  <div class="sp-content">
    <div class="sp-list">
      <label for="" class="sp-home">

        <i class="fas fa-home"></i>
      </label>
    </div>
  </div>
</div>



<!--

  <div class="col-sm-11 col-md-4">
    <ul class="sp-list">
      <li class="sp-events"><a href="#" class="sp-events-a">Weddings</a></li>
      <li class="sp-events"><a href="#" class="sp-events-a">Birthdays</a></li>
      <li class="sp-events"><a href="#" class="sp-events-a">Events</a></li>
      <li class="sp-events"><a href="#" class="sp-events-a">Partys</a></li>



    </ul>
    <div class="Sp-line">

    </div>
  </div>

  <div class="col">

  </div>
  <div class="col-sm-11 col-md-6">

  </div>
</div>


<!-- need update with database

</divition>


-->

<divition class="events">

    <div class="whysus-content">

        <h1 class="Menuh1 scrollrel-title">Events</h1>
        <div class="whyUs-line">


      </div>
      <br />
    <h1 class="Menu-P scrollrel-h1">Organize Your Events with us.</h1>
     </div>



</divition>


<divition class="Gallery">
  <div class="whysus-content">

      <h1 class="Menuh1 scrollrel-title">Gallery</h1>
      <div class="whyUs-line">


    </div>
    <br />
  <h1 class="Menu-P scrollrel-h1">Some photos from Our Bakery.</h1>
   </div>
   <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

         <div class="row gallery-row">

           <div class="col-lg-3 col-md-4 gallery-item-div gallery-item-div1">
             <div class="gallery-item">

                 <img src="assets/gallery/gallery-1.jpg" alt="" class="img-fluid">

             </div>
           </div>

           <div class="col-lg-3 col-md-4 gallery-item-div gallery-item-div2">
             <div class="gallery-item">

                 <img src="assets/gallery/gallery-1.jpg" alt="" class="img-fluid">

             </div>
           </div>


           <div class="col-lg-3 col-md-4 gallery-item-div gallery-item-div3">
             <div class="gallery-item">

                 <img src="assets/gallery/gallery-1.jpg" alt="" class="img-fluid">

             </div>
           </div>


           <div class="col-lg-3 col-md-4 gallery-item-div gallery-item-div4">
             <div class="gallery-item">

                 <img src="assets/gallery/gallery-1.jpg" alt="" class="img-fluid">

             </div>
           </div>


           <div class="col-lg-3 col-md-4 gallery-item-div gallery-item-div5">
             <div class="gallery-item">

                 <img src="assets/gallery/gallery-1.jpg" alt="" class="img-fluid">

             </div>
           </div>


                      <div class="col-lg-3 col-md-4 gallery-item-div gallery-item-div6">
                        <div class="gallery-item">

                            <img src="assets/gallery/gallery-1.jpg" alt="" class="img-fluid">

                        </div>
                      </div>


                                 <div class="col-lg-3 col-md-4 gallery-item-div gallery-item-div7">
                                   <div class="gallery-item">

                                       <img src="assets/gallery/gallery-1.jpg" alt="" class="img-fluid">

                                   </div>
                                 </div>


                                            <div class="col-lg-3 col-md-4 gallery-item-div gallery-item-div8">
                                              <div class="gallery-item">

                                                  <img src="assets/gallery/gallery-1.jpg" alt="" class="img-fluid">

                                              </div>
                                            </div>





         </div>

       </div>


</divition>

<divition class="Contact">


  <div class="row container aos-init aos-animate">
    <div class="col-lg-4 col-info">
      <div class="info">
        <div class="address">
          <i class="bi bi-geo-alt"></i>
          <h4>Location:</h4>
          <p>
            Q96C+WWW,Colombo-Batticaloa Hwy ,Kuruwita
          </p>
        </div>
        <div class="open-hours">
          <i class="bi bi-clock"></i>
          <H4>Open Hours</H4>
          <P>
                              Monday-Saturday:
                              <BR />
                              7:00 am To 8:00 pm
          </P>
        </div>
        <div class="email">
          <i class="bi bi-envelope"></i>
          <h4>Email:</h4>
          <p>
            cakeNbakeKURUWITA@gmail.com
          </p>
        </div>
        <div class="phone">
          <i class="bi bi-phone"></i>
          <h4>Call:</h4>
          <p>
            07071563313
          </p>
        </div>
      </div>

</div>


    <div class="col-lg-8 form-inputs">
<form action="" method="" class="php-email-form">
  <div class="row">
    <div class="col-md-6 form-group">
      <input type="text" class="form-control text-email" name="name" id="name" placeholder="Your Name" required/>
    </div>
    <div class="col-md-6 form-group mt-3 mt-md-0">
      <input type="email" class="form-control text-email" id="email" name="email" placeholder="Your Email" required/>
    </div>
  </div>
  <div class="form-group mt-3">
    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required/>
  </div>
  <div class="form-group mt-3">
    <textarea class="form-control" id="message" name="message" placeholder="message" required rows="8"></textarea>
  </div>

<div class="my-3">
               <div class="loading">Loading</div>
               <div class="error-message"></div>
               <div class="sent-message">Your message has been sent. Thank you!</div>
             </div>
             <div class="text-center"><button type="submit">Send Message</button></div>

</form>
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









</div>


























<script src="app.js">
</script>
<script>

ScrollReveal({
   reset: true,
   distance: '60px',
   duration: 2500,
   delay: 400
 });

 ScrollReveal().reveal('.display-3,.lead', { delay: 400 });
 ScrollReveal().reveal('.scrollrel-title,.scrollrel-h1,.whyUs-line',{delay: 300 , origin: 'left'})
 ScrollReveal().reveal('.col-img',{delay: 800, origin: 'left'});
 ScrollReveal().reveal('.col-details',{delay: 600, origin: 'bottom'})

 ScrollReveal().reveal('.gallery-item-div1',{delay:400, origin: 'left'})
  ScrollReveal().reveal('.gallery-item-div2',{delay:450, origin: 'left'})
   ScrollReveal().reveal('.gallery-item-div3',{delay:500, origin: 'left'})
    ScrollReveal().reveal('.gallery-item-div4',{delay:550, origin: 'left'})
     ScrollReveal().reveal('.gallery-item-div5',{delay:600, origin: 'left'})
      ScrollReveal().reveal('.gallery-item-div6',{delay:650, origin: 'left'})
       ScrollReveal().reveal('.gallery-item-div7',{delay:700, origin: 'left'})
        ScrollReveal().reveal('.gallery-item-div8',{delay:750, origin: 'left'})


     ScrollReveal().reveal('.col-info',{delay:600, origin: 'left'})
      ScrollReveal().reveal('.form-inputs',{delay:1000, origin: 'bottom'})
       ScrollReveal().reveal('.footer-paragraph',{delay:500, origin: 'left'})

       ScrollReveal().reveal('.whyUs-title1',{delay:450,origin: 'bottom'})
       ScrollReveal().reveal('.whyUs-title2',{delay:650,origin: 'bottom'})
       ScrollReveal().reveal('.whyUs-title3',{delay:850,origin: 'bottom'})

        ScrollReveal().reveal('.twitter',{delay:400, origin: 'bottom'})
         ScrollReveal().reveal('.facebook',{delay:450, origin: 'bottom'})
          ScrollReveal().reveal('.instagram',{delay:500, origin: 'bottom'})
           ScrollReveal().reveal('.whatsapp',{delay:550, origin: 'bottom'})
</script>

<!--Bootstrap js files-->
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
