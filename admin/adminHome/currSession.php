<?php
include("../session.php");

$date = $_POST['date'];
$sessNO = $_POST['sessNO'];

$sql1 = "SELECT * FROM `timetable` WHERE `timetable`.`no`='$sessNO' AND `timetable`.`date`='$date'";

$returnD = mysqli_query($conn, $sql1);
$result = mysqli_fetch_array($returnD);

$_SESSION['current_Session'] = $result["sessionID"];

$sql2 = "UPDATE `timetable` SET `currSess` = '0';
UPDATE `timetable` SET `currSess` = '1' WHERE `timetable`.`no`='$sessNO' AND `timetable`.`date`='$date'";

if (mysqli_multi_query($conn, $sql2)) {
    echo "<br>" . "Session set";
} else {
    echo "Not set";
}
