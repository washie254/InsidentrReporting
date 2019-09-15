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
    <?php
        $conn = new mysqli('localhost', 'root', '', 'mojor') 
        or die ('Cannot connect to db');  

        $userl = $_SESSION['username'];
    
    ?>

  <!--================ Feature Area =================-->
  <section class="feature-area ">
    <div class="container">
        <div>
            <h5>My Bio Information</h5>
          <h2>
            Personal Profile<br>
          </h2>
          <p>
            <?php

                $con = mysqli_connect('localhost','root','','mojor');
                $user = $_SESSION['username'];

                $query0 = "SELECT * FROM users WHERE username='$user'";
                $result0 = mysqli_query($con, $query0);
                
                while($row = mysqli_fetch_array($result0, MYSQLI_NUM)){
                    $uid=$row[0];
                    $uname=$row[1];
                    $umail=$row[2];//mail
                    $utel=$row[4];//tel
                    $ucounty=$row[5];//mail
                }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Avatar</th>
                        <th scope="col">Information</th>
                    </tr>
                </thead>
                <tr style="width:200px;">
                    <td style="width: 90px;"><img src="img/avatar.png" style="width:150px; height:150px;"></td>
                    <td>
                        <label>User ID: &nbsp;&nbsp;<?php echo $uid; ?></label><br>
                        <label>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $umail; ?></label><br>
                        <label>Tel No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $utel; ?></label><br>
                        <label>User ID:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ucounty; ?></label><br>
                    </td>
                </tr>
            </table>
            
          </p>
          <hr>
        </div>
        
        <!-- <div class="col-lg-7"> -->
            <b><h2>My reported incidents:</h2></b>
          <!-- <div class="row">  </div> -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">ID. </th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">INFORMATION</th>
                    <th scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- [ LOOP THE THE PENDING INSIDENTS ] -->
                    <!-- <th scope="row"><?php echo $_SESSION['username'];?></th> -->
                    <?php
                    $db = "mojor";  //masked for security
                    $host = "localhost"; //masked for security
                    $user = "root";//masked for security
                    $pwd = ""; //masked for security
                    $con = mysqli_connect($host,$user,$pwd,$db);
                    $user = $_SESSION['username'];

                    $query0 = "SELECT * FROM users WHERE username='$user'";
                    $result0 = mysqli_query($con, $query0);
                    
                    while($row = mysqli_fetch_array($result0, MYSQLI_NUM)){
                        $uid=$row[0];
                        $uname=$row[1];
                        $umail=$row[3];//mail
                        $utel=$row[4];//tel
                        $ucounty=$row[5];//mail
                    }

                    if (!$con) {
                            die('Could not connect: ' . mysqli_error($con));
                    }

                    $sql = "SELECT * FROM insident WHERE userid='$uid' ";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result, MYSQLI_NUM))
                    {	
                    
                        echo '<tr>';;
                            $insID= $row[0];
                            //echo "INSIDENT ID:".$insID;
                            $new = basename( $row[4] );
                            echo '<td>'.$row[0].'</td> '; //INCIDENT ID
                            echo '<td><img height="150" width="150" src="images/'.$row[4].' "> </td>'; //INCIDENT IMAGE
                            echo '
                                <td><b>'.$row[1] .'</b><br>'. $row[3] .'<br>LOCATION : <b> '.$row[5].'</b><br>Date:<b>'.$row[10].'<br> </b>Time:<b>'.$row[11].'</b><br>Reported By:<b>'.$row[9].
                                '</b></td> '; //location
                            echo '<td>'.$row[12].'</td> ';
                            
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table><hr>
        <!-- </div> -->
        <div>
            <h5>REMARKS </h5>
          <h2>
             MESSAGES FROM THE STAFF<br>
          </h2>

          <h4>the following are remars pertaining your reported incidents.</h4>
          <!-- :::::::::::::::::; notif :::::::::::::::::::; -->
          <p>
            Your alert messages
            <style>
              .alert {
                padding: 20px;
                background-color: #7ff887;
                color: white;
              }

              .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
              }

              .closebtn:hover {
                color: black;
              }
            </style>
            <?php 
              $con = mysqli_connect('localhost','root','','mojor');
              
              $sql0= "SELECT * FROM notifications WHERE userid='$uid' ";
              $result = mysqli_query($con, $sql0);
              while($row = mysqli_fetch_array($result, MYSQLI_NUM))
              {	
                //$msg = $row[6];
                $notif = $row[6]."the Incident was solved on :<b>".$row[3]."</b>at :<b>".$row[4]."</b>...Regards : the".$row[1];
                echo '<div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display=`none`;"> &times; </span> 
                          '.$notif.'
                      </div>' ;
              }
            ?>

          </p>
          <hr>
        </div>
    </div>
  </section>
  <!--================ End Feature Area =================-->

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