<?php
//DB CONNECTION====================================
$servername = "localhost";
$username = "root";
$password = "";
$database = "sip";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

$query = "SELECT * FROM timetable";
$returnD = mysqli_query($conn, $query);

while ($result = mysqli_fetch_array($returnD)) {
	$date = $result["date"];
	$sessNo = $result["no"];
	$feedback = $result["feedback"];
	$video = $result["video"];
	$return_arr[$date][$sessNo]['feedback'] = $feedback;
	$return_arr[$date][$sessNo]['video'] = $video;
}
echo json_encode($return_arr);
