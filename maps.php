<?php include('server.php') ?>
<?php 
  // session_start();
  require_once('getlatlng.php');

  $coordinates = GetCoordinate();  

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favicon.png" type="image/png" />
  <title>Incident Reporting</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="vendors/linericon/style.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
  <link rel="stylesheet" href="vendors/animate-css/animate.css" />
  <link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css" />
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>
 <!--================Header Menu Area =================-->
 <header class="header_area">
    <div class="top_menu d-lg-block d-none">
      <div class="container">
        <div class="float-left">
          <ul class="left_side">
            <!-- <li>
              <a href="login.html">
                <i class="fa fa-facebook-f"></i>
              </a>
            </li> -->
            <li style="color: white; font-family:Arial; ">
              <!-- logged in user information -->
               <?php  if (isset($_SESSION['username'])) : ?>
              <strong><?php echo strtoupper($_SESSION['username']); ?></strong>	
              <?php endif ?>
            </li>
          </ul>
        </div>
        <div class="float-right">
          <ul class="right_side">
            <li>
              <a href="login.html">
                <i class="lnr lnr-phone-handset"></i>
                sammy@gmail.com
              </a>
            </li>
            <li>
              <a href="#">
                <i class="lnr lnr-envelope"></i>
                incidentreportingKenya@gmail.com
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg w-100">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="index.html">
            <img src="img/logo.png" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <div class="row w-100">
              <div class="col-lg-12 pr-lg-0">
                <ul class="nav navbar-nav ml-auto justify-content-end">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="reported.php">Reported Incidents</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="report.php">Report</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="maps.php">Maps</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="mypage.php">My Page</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  
  
    <!--================ Start Quote Area =================-->
    <section class="quote-area">
      <div class="container">
        <div class="row justify-content-center text-left section-title-wrap">
          <div class="col-lg-12" style="background-color:#262533; ">
            <h2 class="text-white"> tagging of the reported incidents</h2>
            <div class="row justify-content-between align-items-center"></div>
            <div class="col-lg-12">
            <div class="d-none d-sm-block mb-5 pb-4">
              <!-- :::::::::::make google maps reponsive ::::::::::::: -->
                <style>
                .map-responsive{
                    overflow:hidden;
                    padding-bottom:56.25%;
                    position:relative;
                    height:0;
                  }
                  .map-responsive iframe{
                    left:0;
                    top:0;
                    height:100%;
                    width:100%;
                    position:absolute;
                  }
                  </style>
                  <div id="map" class="map-responsive" style="height: 500px;"></div>
                 <script>
                    function initMap() {
                      var nyeri = {lat: -0.432, lng: 36.955};
                      var uluru = { lat: -25.363, lng: 131.044 };
                      var grayStyles = [
                      {
                          featureType: 'all',
                          stylers: [
                          { saturation: -90 },
                          { lightness: 50 }
                          ]
                      },
                      { elementType: 'labels.text.fill', stylers: [{ color: '#A3A3A3' }] }
                      ];
                        
                      var map = new google.maps.Map(document.getElementById('map'), {
                        center: { lat:-0.432, lng: 36.955 },
                        zoom: 9,
                        styles: grayStyles,
                        scrollwheel: false
                      });
                      var markersArray = [{lat: -0.432, lng: 36.955}]
                      for(place of markersArray){
                        console.log(place + 'place')
                      var marker = new google.maps.Marker({
                        position: place,
                        map: map,
                        title: 'Hello World!'
                      });
                    }
                  } 
                </script>
              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAC986krcIu2sBDMnjyY_vznCFmuxwJSOE&callback=initMap"></script>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Quote Area =================-->
  <!--================ start footer Area =================-->
  <footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>About Us</h6>
            <p>
              Incident reporting System is build as a system to be used for reporting incidents 
              happening across kenya . the system is build to help easy accessibility to the govt resources with 
              regards to incidents.
            </p>
          </div>
        </div>
        <div class="col-lg-5  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Newsletter</h6>
            <p>Stay update with our latest</p>
            <div class="" id="mc_embed_signup">
              <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                method="get" class="form-inline">
                <input class="form-control" name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Email Address'" required="" type="email">
                <button class="click-btn btn btn-default"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                <div style="position: absolute; left: -5000px;">
                  <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                </div>
                <div class="info"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
          <div class="single-footer-widget">
            <h6>Follow Us</h6>
            <p>on our socials</p>
            <div class="footer-social d-flex align-items-center">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-dribbble"></i></a>
              <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <p class="footer-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All  |  <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">SAM</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
      </div>
    </div>
  </footer>
  <!--================ End footer Area =================-->

  <!--================ Optional JavaScript =================-->
  <!--================ jQuery first, then Popper.js, then Bootstrap JS =================-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="vendors/isotope/isotope-min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>

