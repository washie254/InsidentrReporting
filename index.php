
<?php 
	
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['id']);
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
              <strong><a href="user_profile.php"><?php echo strtoupper($_SESSION['username']); ?></a></strong>	
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
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="reported.php">Reported Incidents</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="report.php">Report</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="maps.php">Maps</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="mypage.php">My Page</a>
                  </li>
                  <li class="nav-item">
                    <strong><a href="index.php?logout='1'" style="color: red;">logout</a></strong>
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

  <!--================ Feature Area =================-->
  <section class="feature-area section_gap_top">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-7">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="single-feature">
                <img src="img/feature/f1.png" alt="">
                <h4>Quick services</h4>
                <p>
                  We handle the incidents in time once reported to us .
                </p>
                <a href="#">locate</a>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="single-feature">
                <img src="img/feature/f2.png" alt="">
                <h4>Emergency calls</h4>
                <p>
                  the hotline numbers are also available in case of emergency situationss that cannot wait
                </p>
                <a href="contact.html">Contact Us</a>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="single-feature">
                <img src="img/feature/f3.png" alt="">
                <h4>Record Keeping</h4>
                <p>
                  We keep record of the incidents that are occuring at given areas to ensure we keep srategies to avoid them in the near future.
                </p>
                <a href="#">View incidents</a>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="single-feature">
                <img src="img/feature/f4.png" alt="">
                <h4>calculations</h4>
                <p>
                  we get calculating the occurence of various incidents prevalent in an area
                </p>
                <a href="#">Get Estimate</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5 offset-md-0 col-md-12 text-left section-title-wrap mt-4 mt-lg-0">
          <h5>About incident reporting system</h5>
          <h2>
            We’re swift<br>
            To Respond to the  <br>
            Incidents.
          </h2>

          <h4>Incident reporting has just been made easier for kenyans. it's getting bigger and better and safer
            for the locals.</h4>
          <p>
            it has been a long journey with the traditional means of reporting incidents in the xountry,
            it is about time to get better means and services oriented with the reorting of incident in our country. 
            The incident reporting system is the long awaited system to sort out the reporting of incidents with fast and 
            easy means of incident reporting. it is more effective and better than the traditional reporting system.
          </p>
          <a href="#" class="main_btn">Learn More About Us</a>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Feature Area =================-->

  <!--================ About Area =================-->
  <section class="about-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="row justify-content-center text-left section-title-wrap">
            <div class="col-lg-12">
              <h5>About Incident Reporting System</h5>
              <h2>
                Some statistics that we want <br>
                to show our viewers
              </h2>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-10">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-6 single_brand">
                  <img src="img/about/brand1.png" alt="">
                </div>
                <div class="col-lg-4 col-md-4 col-6 single_brand">
                  <img src="img/about/brand2.png" alt="">
                </div>
                <div class="col-lg-4 col-md-4 col-6 single_brand">
                  <img src="img/about/brand3.png" alt="">
                </div>
                <div class="col-lg-4 col-md-4 col-6 single_brand">
                  <img src="img/about/brand4.png" alt="">
                </div>
                <div class="col-lg-4 col-md-4 col-6 single_brand">
                  <img src="img/about/brand5.png" alt="">
                </div>
                <div class="col-lg-4 col-md-4 col-6 single_brand">
                  <img src="img/about/brand6.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="offset-lg-1 col-lg-4">
          <div class="about_box">
            <div class="activity">
              <div class="row">
                <div class="col-lg-6 col-md-3 col-6">
                  <div class="activity_box">
                    <div>
                      <img src="img/about/i1.png" alt="">
                    </div>
                    <h3>#<span class="counter">2500</span>+</h3>
                    <p>Reported Incidents</p>
                  </div>
                </div>

                <div class="col-lg-6 col-md-3 col-6">
                  <div class="activity_box">
                    <div>
                      <img src="img/about/i2.png" alt="">
                    </div>
                    <h3>#<span class="counter">543</span>+</h3>
                    <p>Registered Users</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-3 col-6">
                  <div class="activity_box">
                    <div>
                      <img src="img/about/i3.png" alt="">
                    </div>
                    <h3>$<span class="counter">30</span>+</h3>
                    <p>Conties Reach</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-3 col-6">
                  <div class="activity_box">
                    <div>
                      <img src="img/about/i4.png" alt="">
                    </div>
                    <h3 class="counter">2400</h3>
                    <p>Solved Incidents</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End About Area =================-->

  <!--================ Start Quote Area =================-->
 
  <!--================ End Quote Area =================-->

  <!--================ Start CTA Area ================-->
  <section class="cta_area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="cta_inner d-flex flex-md-row flex-column justify-content-between align-items-center">
            <div class="mb-md-0 mb-4 text-sm-left text-center">
              <p>Get a quick response from our team</p>
              <h1>Please feel free to reach us</h1>
            </div>
            <div class="">
              <a href="#" class="main_btn">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End CTA Area ================-->

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