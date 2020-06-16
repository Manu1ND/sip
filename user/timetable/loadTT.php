<?php
include("../session.php");

$query = "SELECT * FROM timetable";
$returnD = mysqli_query($conn, $query);

while ($result = mysqli_fetch_array($returnD)) {
	$date = $result["date"];
	$sessNo = $result["no"];
	$return_arr[$date][] = $sessNo;
}
echo json_encode($return_arr);
