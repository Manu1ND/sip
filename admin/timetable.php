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
						<button class="login200-form-btn">
							MCQ
						</button>
					</div>
					</br>
					<div class="row-sm-6">
						<a href="home.php">
							<button class="login200-form-btn">
								Home
							</button>
						</a>
					</div>
					</br>
					<div class="row-sm-6">
						<a href="logout.php">
							<button class="login200-form-btn">
								Sign Out
							</button>
						</a>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-home100">
						<div class="login100-form-title">
							<label class="login100-form-title-1">Time Table</label>
						</div>
						<div class="login100-form-title">
							<button class="login100-form-btn" data-toggle="modal" data-target="#addSession">
								Add Session
							</button>
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

		<!-- Modal -->
		<div class="modal fade" id="addSession" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addSessionTitle">Add Session</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="addSessionForm" class="login100-form validate-form" action="timetable/addSession.php" method="POST" enctype="multipart/form-data" style="padding-bottom:0%" novalidate>
							<div class="wrap-input100 validate-input m-b-26" data-validate="Date is required">
								<span class="label-input100">Date</span>
								<input class="input100" type="date" name="newDate" id="newDate">
								<span class="focus-input100"></span>
							</div>

							<div class="wrap-input100 validate-input m-b-26" data-validate="Session No. is required">
								<span class="label-input100">Session No.</span>
								<input class="input100" type="number" name="newSessNO" id="newSessNO" placeholder="Session No.">
								<span class="focus-input100"></span>
							</div>

							<div class="wrap-input100 validate-input m-b-26" data-validate="Video URL is required">
								<span class="label-input100">Video</span>
								<input class="input100" type="url" name="newVideo" id="newVideo" placeholder="Video URL">
								<span class="focus-input100"></span>
							</div>

							<div class="wrap-input100 validate-input m-b-26" data-validate="Feedback URL is required">
								<span class="label-input100">Feedback</span>
								<input class="input100" type="url" name="newFeedback" id="newFeedback" placeholder="Feedback URL">
								<span class="focus-input100"></span>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" name="addSessionSubmit" class="btn btn-primary" form="addSessionForm">Add</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="editSession" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true"></div>
	</div>

	<!--===============================================================================================-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- <script src="../assests/vendor/bootstrap/js/jquery-3.2.1.min.js"></script> -->
	<script src="../assests/vendor/bootstrap/js/popper.js"></script>
	<script src="../assests/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="timetable/loadTT.js"></script>
	<script src="timetable/editSession.js"></script>
	<script src="../assests/js/main.js"></script>

</body>

</html>