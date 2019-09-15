<?php include('server.php') ?>
<?php 
	// session_start(); 

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
                  <li class="nav-item active">
                    <a class="nav-link" href="report.php">Report</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="maps.php">Maps</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
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

  <!--================ GET CURRENTLY LOGGEDIN USER DETAILS=================-->
  <?php
    $conn = new mysqli('localhost', 'root', '', 'mojor') 
    or die ('Cannot connect to db');  

    $userl = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='$userl'";
    $result = mysqli_query($db, $query);
    
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
     $uid=$row[0];
     $uname=$row[1];
    }
  ?>

  <!--================ End Home Banner Area =================-->

  
    <script>
      if(!navigator.geolocation){
        alert('Your Browser does not support HTML5 Geo Location. Please Use Newer Version Browsers');
      }
      navigator.geolocation.getCurrentPosition(success, error);
      function success(position){
        var latitude  = position.coords.latitude;	
        var longitude = position.coords.longitude;	
        var accuracy  = position.coords.accuracy;
        document.getElementById("lat").value  = latitude;
        document.getElementById("lng").value  = longitude;
        document.getElementById("acc").value  = accuracy;
      }
      function error(err){
        alert('ERROR(' + err.code + '): ' + err.message);
      }
    </script>
    <!--================ Start Quote Area =================-->
    <section class="quote-area">
      <div class="container">
        <div class="row justify-content-center text-left section-title-wrap">
          <div class="col-lg-12" style="background-color:#262533; ">
            <h5>Report Incident!</h5>
            <h2 class="text-white">
              Report an Ongoin incident near you
            </h2> 
            UserID : <?php echo $uid;?>
            Username : <?php echo $uname; ?>
          </div>
        </div>
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-12">
            <div class="estimated-cost">
    
              <form class="form-wrap" action="report.php" method="post" enctype="multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <?php include('errors.php'); ?>
                <nav>
                  <div class="nav nav-tabs justify-content-md-start justify-content-center" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-getEstimation-tab" data-toggle="tab" href="#nav-getEstimation"
                      role="tab" aria-controls="nav-getEstimation" aria-selected="true">Get an estimation</a>
                  </div>
                </nav>
  
                <!-- Tab Content -->
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-getEstimation" role="tabpanel" aria-labelledby="nav-getEstimation-tab">
                    <div class="row">

                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="lastName">Select Image</label><br>
                          <input type="file" name="image">
                          <!-- <input type="text" class="form-control" id="lastName" placeholder="Enter last name" /> -->
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="firstName">Title of Incident</label>
                          <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Enter brief Title"
                            onfocus="this.placeholder = 'Enter brief Title'" onblur="this.placeholder = 'Enter brief Title'" />
                        </div>
                      </div>
  
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="lastName">Location</label>
                          <input type="text" class="form-control" name = "location"  placeholder="Enter the current Location" onfocus="this.placeholder = 'Enter the current Location'"'"
                            onblur="this.placeholder = 'Enter the current Location'" />
                        </div>
                      </div>
  
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="Category">Select Category</label><br>
                          <?php
                            $conn = new mysqli('localhost', 'root', '', 'mojor') 
                            or die ('Cannot connect to db');                     
                            $result = $conn->query("select catID, catName from inscategory");
                            echo "<select name='category' style=width:20%>";
                              while ($row = $result->fetch_assoc()) {
                                unset($id, $name);
                                $id = $row['catID'];
                                $name = $row['catName']; 
                                echo '<option value="'.$name.'">'.$name.'</option>';      
                              }
                            echo "</select>";
								          ?>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="status">status</label><br>
                          <select type="text" name ='status' style="width: 200px; max-width: 100%;">
                              <option value="PENDING">NOT SOLVED</option>
                              <option value="SOLVED">SOLVED</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="cargoType">Add Description</label>
                          <textarea name = "description" rows = "5" cols = "35"></textarea>
                        </div>
                      </div>
                      <input name="userName" value="<?=$uname?>" style="opacity: 0;" />
                      <input name="userId" value="<?=$uid?>"  style="opacity: 0;"/>
                      <input type="text" id="lat" name="lat" style="opacity: 0;"/>
                      <input type="text" id="lng" name="lng" style="opacity: 0;"/><br/>
                      
                      <div class="col-lg-12 mt-4">
                        <div class="text-center confirm_btn_box">
                          <!-- <button type="submit" class="btn" name="report">Report</button> -->
                          <button class="main_btn" type ="submit" name="report_inc">Report</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>

              <?php 
               
              ?>
   

            </div>
          </div>
        </div>
      </div>
    </section>
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