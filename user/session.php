<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "sip";
session_start();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

$user_check = $_SESSION['login_user'];

$sql1 = "SELECT `regno` FROM `users` WHERE `regno` = '$user_check' ";
$returnD = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($returnD, MYSQLI_ASSOC);
$login_session = $row['regno'];

$sql2 = "SELECT * FROM `timetable` WHERE `timetable`.`currSess`='1'";
$returnD = mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($returnD);
$_SESSION['current_Session'] = $row["sessionID"];
$_SESSION['video'] = $row["video"];
$_SESSION['feedback'] = $row["feedback"];

if (!isset($_SESSION['login_user']) || ($login_session != $user_check)) {
    header("location:login.php");
    die();
}
