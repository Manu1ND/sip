<?php
include("db.php");

session_start();

$user_check = $_SESSION['login_admin'];

$sql = "SELECT `username` FROM `adminlogin` WHERE `username` = '$user_check' ";

$returnD = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($returnD, MYSQLI_ASSOC);
$login_session = $row['username'];

$sql2 = "SELECT * FROM `timetable` WHERE `timetable`.`currSess`='1'";
$returnD = mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($returnD);
$_SESSION['current_Session'] = $row["sessionID"];
//$_SESSION['video'] = $row["video"];
//$_SESSION['current_feedback'] = $row["feedback"];

if (!isset($_SESSION['login_admin']) || ($login_session != $user_check)) {
    header("location:login.php");
    die();
}
