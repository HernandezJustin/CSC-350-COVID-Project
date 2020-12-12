<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CSC 350 COVID-19 Store - About</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body>
	<?php require 'navbar.php'; ?>
  <div class="website-about">
  <h1>About The Website</h1><br/>
  <h3>“Your health remains our priority”</h3>
  <h5>At Covid-19 Supply Store, We fight against Covid-19 by providing all the supplies you need to protect yourself from the virus. <br/>Our goal is to reduce the spread of the virus as much as possible. We take all necessary precautions when delivering orders to maintain our customers safety. </h5></div><br/>
  <h1 style="text-align: center">About Us</h1>
  <div class="col-sm-3"style="margin:auto;">
  <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel" >
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid w-100" src="images/yasmeen.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid w-100" src="images/moe.jpeg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid w-100" src="images/fahim.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid w-100" src="images/justin.jpg" alt="fourth slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>
    <p id="biography">Hello, my name is Yasmeen Othman. I’m a computer science student at BMCC. I’m experienced in HTML,CSS, jQuery, and C++.</p>
    
  </div><br/>
    <div class="covid-faq">
      <h1>COVID-19 FAQ:</h1><br/>
      <h3>1. How does the virus spread?</h3>
      <p>a. The virus that causes COVID-19 most commonly spreads between people who are in close contact with one another (within about 6 feet, or 2 arm lengths).<br/><br/>
      b. It spreads through respiratory droplets or small particles, such as those in aerosols, produced when an infected person coughs, sneezes, sings, talks, or breathes.
      </p>

      <h3>2. How to protect yourself & others?</h3>
      <p>a. Wash your hands after.<br/>
      b. Avoid close contact.<br/>
      c. Cover your mouth and nose with a mask when around others<br/>
      d. Cover coughs and sneezes<br/>
      e. Clean and disinfect<br/>
      f. Monitor Your Health Daily<br/>
      </p>

      <h3>3. Can I get reinfected with COVID-19?</h3>
      <p>The answer is yes. Cases of reinfection with COVID-19 have been reported, but remain rare​.​</p>
    </div>
</body>
<style>
  
  .carousel-item .img-fluid {
    height: 500px;
    width: 250px;
  }
  .covid-faq{
    text-align: center;
  }
  .website-about{
    text-align: center;
  }
  
</style>
<script>
  let biographies = ["Hello, my name is Yasmeen Othman. I’m a computer science student at BMCC. I’m experienced in HTML,CSS, jQuery, and C++.", "Hello, my name is Mohamed Alzendani, and I'm a BMCC student majoring in computer science. Currently, I'm attending the Year Up program. Year Up is a one-year-long program that targets young youth to obtain and develop demanded skills to acclimate the professional field. I'm proficient at C++, Html, CSS, Bootstrap, and MYSQL.", "Hi, this is Khairul Fahim. I am majoring in computer science at BMCC and planning to accomplish an associate’s degree by the end of the Fall 2020 semester. I am proficient at C++, HTML, SQL, and PHP.", "Hello, my name is Justin Hernandez. I am majoring in Computer Science at BMCC. In the future, I want to explore areas of CS such as AI/Machine Learning. I have experience in full-stack web development (HTML,CSS,JS), Git, SQL, C++, Java acquired over six years."];

  

  $('#carouselExampleIndicators').on('slid.bs.carousel', function () {
    var index = $(this).find('.active').index();
    $('#biography').html(biographies[index]);
  });

</script>
</html>