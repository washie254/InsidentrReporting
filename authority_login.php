<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Authority</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Authority Login</h2>
	</div>
	
	<form method="post" action="authority_login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_auth">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
		</p><a href="login_admin.php">Admin Login</a></p>
		<p><a href="login.php">User Login</a></p>
	</form>


</body>
</html>