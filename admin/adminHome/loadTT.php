<?php
include("../session.php");

$query = "SELECT * FROM timetable";
$returnD = mysqli_query($conn, $query);

while ($result = mysqli_fetch_array($returnD)) {
	$date = $result["date"];
	$sessNo = $result["no"];
	$return_arr[$date][$sessNo]['sessionID'] = $result["sessionID"];
	$return_arr[$date][$sessNo]['feedback'] = $result["feedback"];
	$return_arr[$date][$sessNo]['video'] = $result["video"];
}
echo json_encode($return_arr);
