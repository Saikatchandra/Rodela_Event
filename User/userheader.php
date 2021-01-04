<?php
  //Active pages
  $page = explode('/', $_SERVER['PHP_SELF']);
  $page = end($page);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../assets/css/uikit.min.css">
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="shortcut icon" type="image/x-icon" href="../assets\img\icon.png">
  <title>Rodela Events</title>
</head>

<body>
<!-- Home Icon -->
<section class="head" class="py-5 text-center">
    
    </div>
  </section>
<!-- header -->
<section class="banner-top">
  <div class="social-bnr-agileits">
    <ul class="social-icons3">
            <li><a href="https://www.facebook.com/" class="fa fa-facebook icon-border facebook"> </a></li>
            <li><a href="https://twitter.com/" class="fa fa-twitter icon-border twitter"> </a></li>
            <li><a href="https://plus.google.com/u/0/" class="fa fa-google-plus icon-border googleplus"> </a></li> 
          </ul>
  </div>
  <div class="contact-bnr-w3-agile">
    <ul>
      <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="">jamil.cisco@gmail.com</a></li>
      <li><i class="fa fa-phone" aria-hidden="true"></i>+8801912772471</li>	    
          <li>
            <form class="search " action="" style="margin:auto; max-width:300px">
              <input type="text" placeholder="Search.." name="search2">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            </li>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <div class="clearfix"></div>
</section>

 <!-- Navigation -->
 <nav class="navbar navbar-dark navbar-expand-md" uk-sticky="top: 200; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
   <div class="container">
     <div class="home-logo">
    <h1><a class="navbar-brand text-center" href="../index.php">Rodela <span>Events</span><p class="home-page-logo mt-2">Your Dreamy Events</p></a></h1>
    </div>
    <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav">
       <span class="navbar-toggler-icon"></span>
     </button>
    
     <div id="navbarNav" class="collapse navbar-collapse">
       <ul class="navbar-nav ml-auto">
         <li class="nav-item <?= $page == '../index.php' ? 'active' : '' ?> ">
           <a class="nav-link" href="../index.php">Home</a>
         </li>
         <li class="nav-item <?= $page == '../about.php' ? 'active' : '' ?>">
          <a class="nav-link" href="../about.php">About Us</a>
        </li> 
         <div class="dropdown">
          <a class="nav-link dropdown-toggle  <?= $page == 'weedingevent.php' ? 'active' : '' ?>"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Events
          </a>
          <li class="dropdown-menu ml-auto" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item <?= $page == '../weedingevent.php' ? 'active' : '' ?>" href="../weedingevent.php">Weeding Events</a>
            <a class="dropdown-item <?= $page == '../about.php' ? 'active' : '' ?>" href="../weedingevent.php">Stages</a>
            <a class="dropdown-item <?= $page == '../about.php' ? 'active' : '' ?>" href="../weedingevent.php">Holod Stages</a>
            <a class="dropdown-item <?= $page == '../about.php' ? 'active' : '' ?>" href="../weedingevent.php">Birthday Events</a>
          </li>
        </div>
         <li class="nav-item <?= $page == '../gallery.php' ? 'active' : '' ?>">
          <a class="nav-link" href="../gallery.php">Gallery</a>
        </li>
        <li class="nav-item <?= $page == '../shop.php' ? 'active' : '' ?>">
          <a class="nav-link" href="../gallery.php">Shops</a>
        </li>
         
         <li class="nav-item <?= $page == '../contact.php' ? 'active' : '' ?>">
           <a class="nav-link" href="../contact.php">Contact Us</a>
         </li>
         <!-- sign-in login  -->
         <div class="mt-2 sign1-in">
         <li class="nav-item">
            <?php if(!isset($_SESSION['user_login'])){?>
							<i class="fa fa-user sing-in"><a href="register.php">SignUp</a></i>
              <i class="fa fa-lock sing-in "><a href="sign-in.php">Login</a></i>
              
            <?php }else{?>
              <i class="fa fa-key sing-in "><a href="logout.php">Logout</a><a href="user-profile.php">My profile</a></i>
              <i class="fa fa-shopping-cart sing-in"><a href="user-cart.php">My Booking</a></i>
            <?php }?>
            </li>
          </div>
       </ul>
      </div>
    </div>
  </nav>