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
                  <li class="nav-item active">
                    <a class="nav-link" href="admin.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="departments.php">Departments</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="auth.php">Authorities</a>
                  </li>
                  <li class="nav-item">
                    <a href="admin.php?logout='1'" style="color: red;">logout</a>
                  </li>
                  <li class="nav-item">
                    <?php  if (isset($_SESSION['username'])) : ?>
                    <strong><?php echo strtoupper($_SESSION['username']); ?></strong>	
                    <?php endif ?>
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

  <!--================ Home Banner Area =================-->
 
  <!--================ End Home Banner Area =================-->

  
  
    <!--================ Start Quote Area =================-->
    <section class="quote-area">
      <div class="container">
        <div class="row justify-content-center text-left section-title-wrap">
          <div class="col-lg-12" style="background-color:#262533; ">
            <!-- <p>MAAJABU</p> -->
          </div>

          <P> welcome to the page </P>
          <div class="container">
            <h2> AUTHORITIES</h2>
            [[ THE FOLLOWING ARE THE REGISTERED AUTHORITIES ]] :::
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID. </th>
                  <th scope="col">USERNAME</th>
                  <th scope="col">DEPARTMENT</th>
                  <th scope="col">EMAIL</th>
                  <th scope="col">ACTION</th>
                </tr>
              </thead>
              <tbody>
                <!-- [ LOOP THE CLEARANCE STATUS OF THE STUDENTS ] -->
                
                  <!-- <th scope="row"><?php echo $_SESSION['username'];?></th> -->
                  <?php
                    $db = "mojor";  //masked for security
                    $host = "localhost"; //masked for security
                    $user = "root";//masked for security
                    $pwd = ""; //masked for security
                    $con = mysqli_connect($host,$user,$pwd,$db);

                    if (!$con) {
                      die('Could not connect: ' . mysqli_error($con));
                    }
                    $user =$_SESSION['username'];
                    echo $user;
                    $sql = "SELECT * FROM authorities";
                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                      echo '<tr>';
                      echo '<td>'.$row[0].'</td>';
                      echo '<td>'.$row[1].'</td>';
                      echo '<td>'.$row[3].'</td>';
                      echo '<td>'.$row[4].'</td>';
                      echo '<td><a href="del_auth.php?id='. $row[0] .'"> Remove</a> </td>';
                     
                      echo '</tr>';
                    }
                  ?>


               
              </tbody>
            </table>
            <P>
                <h2> ADD AUTHORITY </h2>
            </P>
            <form method="post" action="admin.php">
            <?php include('errors.php'); ?>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="UserName">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">password</label>
                    <input type="text" class="form-control" name="password_1" placeholder="password">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Confirm Password</label>
                    <input type="password" class="form-control" name="password_2" placeholder="confirm password">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Department</label><br>
                    <!-- <select class="form-control">
                      <option>Default select</option>
                    </select> -->
                    <?php
                      $conn = new mysqli('localhost', 'root', '', 'mojor') 
                      or die ('Cannot connect to db');
                              
                      $result = $conn->query("select catID, catName from inscategory");

                      echo "<select  class=`form-control` name='department'>";

                      while ($row = $result->fetch_assoc()) {
                        unset($id, $name);
                        $id = $row['catID'];
                        $name = $row['catName'];
                        echo '<option value="'.$name.'">'.$name.'</option>';
                                      
                      }
                      echo "</select>";
                    ?>
                </div>
                <div class="form-group">
                    <br>
                    <label for="exampleFormControlInput1">email</label>
                    <input type="email" class="form-control" name="email" placeholder="department email">
                </div>
                <div class="form-group">
                    <!-- <label for="exampleFormControlTextarea1">Example textarea</label><br> -->
                    <button type="submit" class="btn btn-primary mb-2" name="add_authority">Add Authority</button>
                </div>
            </form>

          </div>


        </div>
          </div>
        </div>
        
      </div>
    </section>
    <!--================ End Quote Area =================-->

  <!--================ Start CTA Area ================-->

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