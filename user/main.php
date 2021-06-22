<?php
require_once "../server/database.php";
require_once "./tranProcess.php";

if (!isset($_SESSION['customer_id'])){
  header("location: ../index.php");
}

$cus_id = $_SESSION['customer_id'];
$cus_name = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

  <!-- RESPONSIVE META TAG -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../style/category_style.css">
	<title>Threshold | Main</title>

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <!--FONT AWESOME CDN Link-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>

  <!--Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<style>

figure {
  display: inline-block;
}

.wrapper {
  text-align:center;
}

body{
  background-color: #ece5dd;
 
}

/* NAV BAR */
.navbar-expand-lg{
  background-color: #807e7d;
}

.container-fluid{ /* category name - to wrap the text in nav*/
  font-weight: bold;
  /*max-width: 611px;*/
  height: auto;
  font-size: 20px;
  padding-top:8px;
  padding-bottom: 8px;
  background-color: #ddd0c7; /*nerolac white chocolate*/
  min-width: 529px;
}

/* DROPDOWN BOX */

.dropdown:hover .dropdown-menu{
  margin-right: auto;
  display:block;
}

.dropdown{
list-style: none;
}

.logo{
  height: 15%;
  width: 18%;
}

/*img*/
.img-container {
  text-align: center;
  display: block;
}

/* WHY US */
.why-us .box {
  padding: 50px 30px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  transition: all ease-in-out 0.3s;
  background: #4B4137;
  height: 355px;
  margin-bottom: 50px;

}

.why-us .box span {
  display: block;
  font-size: 28px;
  font-weight: 700;
  color: #cda45e;
}

.why-us .box h4 {
  font-size: 24px;
  font-weight: 600;
  padding: 0;
  margin: 20px 0;
  color: rgba(255, 255, 255, 0.8);
}

.why-us .box p {
  color: #ECDDE4;
  font-size: 15px;
  margin: 0;
  padding: 0;
}

.why-us .box:hover {
  background: #cda45e;
  padding: 30px 30px 70px 30px;
  box-shadow: 10px 15px 30px rgba(0, 0, 0, 0.18);
}

.why-us .box:hover span, .why-us .box:hover h4, .why-us .box:hover p {
  color: #fff;
}


/*------------------------------------------------*/
/* Below All Is Footer CSS */
footer{
  background-color: #805D41;
  color: #fffdfa;
  font-size:15px;
  min-width: 530px;
}

.footerBox {
  padding: 10px;
}

.footerBox2 {
  padding-left: 50px !Important;
   padding: 10px;
}

.footerTitle {
  font-size:20px;
}

.location {
  margin-top: 10px;
}

/* This is location CSS */
iframe{
  width:200px;
  height: 200px;
  
}

.emailBox {
  background-color:#ddd0c7;
  color: black;
  border-radius: 3px;
}

.emailTableBox {
  margin-top: 10px;
}

textarea {
  width: 200px;
  height: 100px;
  min-width: 150px;
}

.buttonClass {
  padding: 3px 5px;
  margin-bottom: 3px;
}

.copyright {
  margin-left: 40%;
  font-size: small;
  padding-bottom: 10px;
  margin-bottom: 0px;
}

/*------------------------------------------------*/
/* Below All Is Media Responsive CSS */

/* For screen max until 945px */
@media only screen and (max-width: 945px)
{

  textarea {
    width:150px ;
    height: auto;
  }

  .buttonClass {
    font-size: 10px ;
  }

  .footerBox2 {
    padding-left: 10px !important;
  }

}

 
@media only screen and (max-width: 569px) {

  .img-container img{
    margin-left: 10px;
  }

  .logo{
     height: auto; 
     max-width: 200px; 
     margin-right: 0%;
  }

}
  
@media screen and (max-width:361px) {

  .why-us{
    width: 520px;
  }

  .img-container img{
    width: 130%;
    margin-left: 30px;
  }

  .new-prod{
    margin-left: 48%;
  }

  .categories{
    margin-left: 48%;
  }

  .logo{
     height: auto; 
     min-width: 200px; 
     margin-left: 40%;
  }

  .carousel-indicators{
    min-width: 200px; 
     margin-left: 40%;
  }

}

/* RESPONSIVE BANNER PICS */

  .carousel-inner{
    min-width: 529px;
  }
  
/*  BACK TO TOP BUTTON */

  .go-up { 
    position: fixed;
    top: 90%;
    right: 100px;
    text-align:right;
    z-index:9999;
    margin-top:-15px;
    margin-right: 50%;
    font-size: 150%;
    color: black;
    padding: 1%;
    border-radius: 12px;
    background-color: white;
  }

  .go-up:hover {
    color: white;
    background-color: #808080;
    font-size: 180%;
  }

  #navstick{
   display: none;
  }

  </style>
</head>


<body>
    
<!-- LOGO HEADER -->
  <center><a href="main.php"><img src="../image/logo.png" class="logo">
  </a></center>


<!-- NAVBAR -->

<nav  id="navbar_top" class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">HOME |</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">CATEGORIES</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./category.php#instant_hotpot">Instant Hotpot</a></li>
            <li><a class="dropdown-item" href="./category.php#instant_rice">Instant Rice</a></li>
            <li><a class="dropdown-item" href="./category.php#instant_noodles">Instant Noodles</a></li>
            <li><a class="dropdown-item" href="./category.php#snacks">Snacks</a></li>
            <li><a class="dropdown-item" href="./category.php#drinks">Drinks</a></li>

          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./main.php#new-in">NEW IN</a>
        </li>

         <li class="nav-item">
          <a class="nav-link" href="./main.php#why-us">WHY US</a>
        </li>

      </ul>

      <!-- USER -->
       <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>&nbsp&nbsp <?php echo $cus_name?></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./history.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> History</a>
                    <a class="dropdown-item" href="../server/logoutProcess.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  Log Out</a>
                </div>
          </li>
        </ul>

    </div>
  </div>
</nav>


<!-- CAROUSEL -->
<div id="home">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
     <div class="carousel-indicators">
       <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
       <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
       <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>

    <div class="carousel-inner">
     <div class="carousel-item active" data-bs-interval="10000">
        <img src="../image/6.png" class="d-block w-100" alt="">
      </div>
     <div class="carousel-item">
       <img src="../image/7.png" class="w-100" alt="">
     </div>
      <div class="carousel-item">
       <img src="../image/8.png" class="w-100" alt="">
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </div>
</div>

<br>
<br>
<br>


  <!-- CATEGORIES -->
<h2 class="categories" style="text-align: center;">CATEGORIES</h2>
<br>

<div class="wrapper">
  <div class="top-row">
    <figure style="margin: 0; padding: 15px;"><a target="_blank" href="./category.php#instant_hotpot"><img src="../image/3.png" height="auto" width="500"></a></figure>
    <figure style="margin:0"><a target="_blank" href="./category.php#instant_rice"><img src="../image/1.png" height="auto" width="500"></a></figure>
  </div>

  <div class="second-row">
    <figure style="margin: 0; padding: 15px;"><a target="_blank" href="./category.php#snacks"><img src="../image/4.png" height="auto" width="500"></a></figure>
    <figure style="margin:0 padding: 15px;"><a target="_blank" href="./category.php#instant_noodles"><img src="../image/2.png" height="auto" width="500"></a></figure>
    <figure style="margin: 0; padding: 15px;"> <a target="_blank" href="./category.php#drinks"><img src="../image/5.png" height="auto" width="500"></a></figure>
  </div>
</div>


<!-- NEW PRODUCTS -->

<div id="new-in">
  <h2 class="new-prod" style="margin-top: 100px; text-align: center;">NEW IN</h2>

    <div class="img-container">
      <a href="./category.php#instant_hotpot"><img src="../image/newproduct2.png" alt="" width="80%" height="auto"></a>
      <a href="./category.php#snacks"><img src="../image/newproduct4.png" alt="" width="80%" height="auto" style=" padding-top: 50px;"></a>
      <a href="./category.php#drinks"><img src="../image/newproduct3.png" alt="" width="80%" height="auto" style=" padding-top: 50px;"></a>
    </div>
</div>


<!-- WHY US? -->

  <section id="why-us" class="why-us">

      <h2 style="text-align: center; margin-top: 100px;">WHY US?</h2>
      <br>

      <div class="container" data-aos="fade-up">

      <div class="row">
          <div class="col-lg-4 col-sm-12">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Fast Delivery</h4>
              <p>"I received my items few hours after my order is placed, delivery was very quick, especially when I needed to purchase 
                  items for a party"</p>
                  <br>
              <p style="text-align: right;">~ Harry Johnson</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0 col-sm-12">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Affordable Price</h4>
              <p>"The items are affordable compared to other websites or stores, you will get the best deal from this shop"</p>
               <br>
              <p style="text-align: right;">~ Joseph Philip</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0 col-sm-12">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4>Quick Restocks</h4>
              <p>"They really do restock very quickly. The other day, the product that I wanted to purchase was out of stock but after contacting the team via email, they restocked the product within a day or two."</p>
               <br>
               <p style="text-align: right;">~ Jamie Oliver</p>
            </div>
          </div>

        </div>
    </div>
  </section>

<br>


<!-- FOOTER -->

<footer >
  <div class="container" style="padding-top: 10px;">
    <div class="row">
        <!-- Display About Us -->
      <div class="col-md-4 footerBox col-sm-12" >
        <h5 class="footerTitle">About Us</h5>
        <p >Threshold food was founded in mid 2020 by a team of graduated youths. <br> Due to the current COVID-19 global pandemic situation, our team decided to make it easier for the citizens of our country to obtain food and drink supplies by offering delivery services right to their doorstep. Variety of food and drinks are available on the website, including imported food from different countries. <br> Feel free to check the products that are available on our website!</p>
      </div>

      <!-- Display Contact Us -->
      <div class="col-md-4 footerBox2 col-sm-12" >
        <h5 class="footerTitle">Contact Us</h5>
        <span><i class="fas fa-phone"></i> : 011-22223344</span>
        <br>
        <span><i class="far fa-envelope"></i> : askadmin@thresholdfood.com</span>
        <br>
        <span><i class="fas fa-clock"></i> : 8am - 5pm</span>
        <br>
        <div  class="location">
          <span class="GPSclass">GPS: </span>
          <div style="max-width: 200px;height: auto;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.182694460068!2d101.61919861379069!3d3.0456730546317554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4b2878066b2d%3A0x2e9226b3915214c1!2sThreshold%20of%20Success!5e0!3m2!1sen!2smy!4v1623465212345!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
      </div>

      <!-- Display Email Us -->
      <div class="col-md-4 footerBox2 col-sm-12" >
        <h5 class="footerTitle">Email Us</h5>
          <div>
            <form action="" method="get" >
              <div class="form-group">
                <label for="username">Name: </label>
                  <div class="col-sm-10">
                  <input type="text" name="username"  placeholder="Username">
                </div>
              </div>
              <div class="form-group">              
                <label for="email" >Email: </label>
                <div class="col-sm-10">
                  <input type="email" name="email" placeholder="Contact email">
                </div>
              </div>
              <div class="form-group">
                <label for="title" >Title: </label>
                <div class="col-sm-10">
                  <input type="text" name="title"placeholder="Title content">
                </div>
              </div>
              <div class="form-group">
                <label for="content" >Content: </label>
                <div class="col-sm-10">
                  <textarea name="textfield"  placeholder="Write down your thought..." ></textarea>
                </div>
              </div>
              <br>
              <div class="form-group" >
                <button type="submit" class="btn btn-light buttonClass ">Send</button>
              </div>
            </form>
          </div>
      
      </div>
    </div>
    
  </div>
  <br>
  <hr>
<p class="copyright" >@Copyright ThresholdFood</p>
  
</footer>

<!-- BACK TO TOP 
<button onclick="topFunction()" id="myBtn" title="Back to top" style="background-color: #000000;"><i class="fas fa-arrow-up"></i></button> -->

<script>
  document.addEventListener("DOMContentLoaded", function(){
  window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        document.getElementById('navbar_top').classList.add('fixed-top');
        // add padding top to show content behind navbar
        navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
      } else {
        document.getElementById('navbar_top').classList.remove('fixed-top');
         // remove padding top from body
        document.body.style.paddingTop = '0';
      } 
  });
}); 


  /*js for back to top button*/
  <script type="text/javascript">
      
    /*-------- Get the button using id --------*/
    goup = document.getElementById("navstick");


    /*-------- set to show button when user scroll down 20px --------*/
    /* document.body.scrollTop ---- for safari */

    function scroll() {
      if (document.documentElement.scrollTop > 20 || document.body.scrollTop > 20) {
        goup.style.display = "block";
      } 
      else {
        goup.style.display = "none";
      }
    }


    /*-------- show button when user start scroll down --------*/
    window.onscroll = function() {scroll()};

</script>

</body>

</html>