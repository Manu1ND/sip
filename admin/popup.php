<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SIP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
/* Popup container - can be anything you want */
	.popup 
	{
		position: relative;
  		display: inline-block;
  		cursor: pointer;
  		-webkit-user-select: none;
  		-moz-user-select: none;
  		-ms-user-select: none;
		user-select: none;
		text-align: center;
		color: #004a86  
	}

/* The actual popup */
	.popup .popuptext 
	{
  		visibility: hidden;
  		width: 160px;
  		background-color: #004a86;
  		color: #fff;
  		text-align: center;
  		border-radius: 6px;
  		padding: 8px 0;
  		position: absolute;
  		z-index: 1;
  		bottom: 125%;
  		left: 50%;
  		margin-left: -80px;
	}

/* Popup arrow */
	.popup .popuptext::after 
	{
  		content: "";
  		position: absolute;
  		top: 100%;
  		left: 50%;
  		margin-left: -5px;
  		border-width: 5px;
  		border-style: solid;
  		border-color: #004a86 transparent transparent transparent;
	}

/* Toggle this class - hide and show the popup */
	.popup .show 
	{
  		visibility: visible;
  		-webkit-animation: fadeIn 1s;
  		animation: fadeIn 1s;
	}

/* Add animation (fade in the popup) */
	@-webkit-keyframes fadeIn 
	{
  		from {opacity: 0;} 
  		to {opacity: 1;}
	}

	@keyframes fadeIn 
	{
  		from {opacity: 0;}
  		to {opacity:1 ;}
}
</style>

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../assests/images/icons/favicon.ico"/>
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
	
	<div class="limiter">
		<div class="container-login100" style="background-color: rgb(0, 74, 134);">
			<div class="row" style="width: 100%">
				<div class="col-sm-3">
					<div class="row-sm-6">
						<button class="login200-form-btn" name="MCQ">
							MCQ
						</button>
					</div>
					</br>
					<div class="row-sm-6">
						<a href = "timetable.php">
							<button class="login200-form-btn" name="timeTable">
							Time Table
							</button>
						</a>
					</div>
					</br>
					<div class="row-sm-6">	
						<a href = "logout.php">
							<button class="login200-form-btn" name="logout">
							Sign Out
							</button>
						</a>
					</div>
                </div>
                
			<div class="col-sm">
				<div class="wrap-home100" >
					<div class="login100-form-title" >
						<label class="login100-form-title-1">Welcome Admin!</label>
					</div>
					<div class="col-sm">
						<label style="height:500px; text-align:center">Video Here</label>
					</div>
					<div class="popup" onclick="myFunction()">
					Click me for Attendance<span class="popuptext" id="myPopup">Your Attendance is marked</span>
                	</div>
				</div>
			</div>
		</div>
	</div>	


<!--===============================================================================================-->
	<script src="../assests/vendor/bootstrap/js/jquery-3.2.1.min.js"></script>	
	<script src="../assests/vendor/bootstrap/js/popper.js"></script>
	<script src="../assests/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assests/js/main.js"></script>
	<script>
	// When the user clicks on div, open the popup
	function myFunction() 
	{
  		var popup = document.getElementById("myPopup");
  		popup.classList.toggle("show");
	}
	</script>
</body>
</html>