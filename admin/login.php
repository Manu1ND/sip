<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "sip";
session_start();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$username = $_POST['username'];
	$password = $_POST['password'];


	$result = mysqli_query($conn, "SELECT * FROM adminlogin WHERE username = '$username'")
		or die("Failed to query database" . mysqli_error($conn));
	$row = mysqli_fetch_array($result);
	if ($row['username'] == $username && $row['password'] == $password) {
		$_SESSION['login_admin'] = $username;
		header("location:home.php");
	} else {
		echo "Failed login";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>SIP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../assests/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assests/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assests/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assests/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assests/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assests/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter" ">
		<div class=" container-login100" style="background-color: rgb(0, 74, 134);">
		<div class="wrap-login100">

			<span class="login100-form-title-1" style="color: rgb(0, 74, 134);">
				<img src="../assests/images/bg_login.png" alt="" class="img-fluid">
			</span>



			<form class="login100-form validate-form" action="" method="POST">
				<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
					<span class="label-input100">Username</span>
					<input class="input100" type="text" id='username' name="username" placeholder="Username">
					<span class="focus-input100"></span>

				</div>


				<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
					<span class="label-input100">Password</span>
					<input class="input100" type="password" id='password' name="password" placeholder="Password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Login
					</button>
				</div>
			</form>
		</div>
	</div>
	</div>

	<!--===============================================================================================-->
	<script src="../assests/vendor/bootstrap/js/jquery-3.2.1.min.js"></script>
	<script src="../assests/vendor/bootstrap/js/popper.js"></script>
	<script src="../assests/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assests/js/main.js"></script>

</body>

</html>