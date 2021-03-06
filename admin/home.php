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
							<button class="login200-form-btn" name="logout">
								Sign Out
							</button>
						</a>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-home100">
						<div class="login100-form-title">
							<label class="login100-form-title-1">Welcome Admin!</label>
						</div>
						<div class="col-sm">
							<form class="login100-form validate-form" id="search-TT" method="POST">
								<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
									<div class="row">
										<div class="field half">
											<select size="1" name="date" id="date" />
											<option value="0">--All--</option>
											</select>
										</div>
										<div class="field half">
											<select size="1" name="sessNO" id="sessNO" />
											<option value="0">--All--</option>
											</select>
										</div>
									</div>
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Date</th>
												<th scope="col">Session No.</th>
												<th scope="col">Start</th>
											</tr>
										</thead>
										<tbody id="timetable"></tbody>
									</table>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var sessionID = <?=json_encode($_SESSION['current_Session'])?>;
		console.log(sessionID);
	</script>

	<!--===============================================================================================-->
	<script src="../assests/vendor/bootstrap/js/jquery-3.2.1.min.js"></script>
	<script src="../assests/vendor/bootstrap/js/popper.js"></script>
	<script src="../assests/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="adminHome/loadTT.js"></script>
	<script src="../assests/js/main.js"></script>

</body>

</html>