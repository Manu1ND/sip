<?php
include("session.php");
$servername = "localhost";
$username = "root";
$password = "";
$db = "sip";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
} else {
}

$regno = $_SESSION['login_user'];
$sessionID = '2020-06-10 - 1';

if (isset($_POST['addAttendanceSubmit'])) {
    $sql = "INSERT INTO `attendance` (`regno`, `sessionID`) VALUES ('$regno', '$sessionID')";
    if (mysqli_query($conn, $sql)) {
        echo "<br>" . "Inserted to Database";
        //header("location:home.php");
    } else {
        echo "Not Inserted to Database";
    }
}
?>