<?php
include("session.php");
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
						<a href="timetable.php">
							<button class="login200-form-btn" name="timeTable">
								Time Table
							</button>
						</a>
					</div>
					</br>
					<div class="row-sm-6">
						<a href="logout.php">
							<button class="login200-form-btn" name="logout" href="logout.php">
								Sign Out
							</button>
						</a>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-home100">
						<div class="login100-form-title">
							<label class="login100-form-title-1">Welcome <?= $_SESSION['name'] ?>!</label>
						</div>
						<div class="col-sm" style="height:500px; max-width:800px">
							<label style="font-size:large">Video: <?= $_SESSION['video'] ?></label>
							<label style="font-size:large">Feedback: <?= $_SESSION['current_feedback'] ?></label>
						</div>
					</div>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
						For Attendance click here
					</button>
					<!-- Modal -->
					<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="staticBackdropLabel">Attendance</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<?= $_SESSION['name'] ?>, click the below button for attendance
								</div>
								<div class="modal-footer">
									<form action="addAttendance.php" method="POST">
										<button name="addAttendanceSubmit" class="btn btn-primary">Attendance</button>
									</form>
								</div>
							</div>
						</div>
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

</body>

</html>