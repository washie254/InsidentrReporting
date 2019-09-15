<?php 
	session_start();
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'mojor');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$telNo = mysqli_real_escape_string($db, $_POST['telNo']);
		$county =mysqli_real_escape_string($db, $_POST['county']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($telNo)) { array_push($errors, "Telephone Number Required"); }
		if (empty($county)) { array_push($errors, "input county of residence"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password, telNo, county) 
					  VALUES('$username', '$email', '$password','$telNo','$county')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN ADMINISTRATOR
	if (isset($_POST['login_admin'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: admin.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				// $userID=$row['id'];
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	//LOGIN AUTHORITY :
	if (isset($_POST['login_auth'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM authorities WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				$_SESSION['id'] =$authid;
				header('location: auth_index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	// If upload button is clicked ...
	if (isset($_POST['report_inc'])) {

		$title = $_POST['title'];
		$category = $_POST['category'];
		$description = $_POST['description'];	
		$location = $_POST['location'];
		$status = $_POST['status'];
		$uname = $_POST['userName'];
		$uid=$_POST['userId'];
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];
	
		$image = $_FILES['image']['name'];
		
		$target = "images/".basename($image);
		$cdate = date("Y-m-d");
		$ctime = date("h:i:s");
		// Get text
		//$image_text = mysqli_real_escape_string($db, $_POST['image_text']);
		// image file directory
		// Get image name
		// form validation: ensure that the form is correctly filled
		if (empty($title)) { array_push($errors, "insert title"); }
		if (empty($location)) { array_push($errors, "Add location"); }
		if (empty($description)) { array_push($errors, "Add a brief description"); }
	
		if (count($errors) == 0) {
		  $sql = "INSERT INTO insident (incTitle,incCategoty,incDescription, incImage,incLocation,lat, lng, userid,userName, reportingDate, reportingTime, instatus ) 
								VALUES ('$title','$category','$description','$image','$location','$lat','$lng','$uid','$uname','$cdate','$ctime','$status')";
		  // execute query
		  if(mysqli_query($db, $sql)){
			header('location: report.php');
		  }
		  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Image uploaded successfully";
		  }else{
			$msg = "Failed to upload image";
		  }
		}
	}

	//ADD AUTHORITY
	if (isset($_POST['add_authority'])) {
				
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$department = mysqli_real_escape_string($db, $_POST['department']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO authorities (username, email, password, department) 
					VALUES('$username', '$email', '$password','$department')";
			mysqli_query($db, $query);
			header('location:admin.php');
		}
	}

	//ADD DEPARTMENT
	if (isset($_POST['add_dept'])) {
		// receive all input values from the form
		$dept = mysqli_real_escape_string($db, $_POST['department']);
		// form validation: ensure that the form is correctly filled
		if (empty($dept)) { array_push($errors, "Department name is required"); }
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO inscategory (catName) 
					VALUES('$dept')";
			mysqli_query($db, $query);
			header('location:departments.php');
		}

	}


?>