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
$count=0;
$regno = $_SESSION['login_user'];
$sessionID = '2020-06-11 - 1';
if (isset($_POST['addAttendanceSubmit'])) {
    $sql1 = "INSERT INTO `attendance` (`regno`, `sessionID`) VALUES ('$regno', '$sessionID')";
    if (mysqli_query($conn, $sql1)) {
        $sql2 = "SELECT `regno` FROM `attendance` WHERE `regno` = '$regno' ";
        $result = $conn->query($sql2);
        while($row = $result -> fetch_assoc()){
            $count = $count + 1;
        }
        $sql3 = "UPDATE `users` SET `attendance` = '$count' WHERE `regno` = '$regno' ";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . mysqli_error($conn);
          }
        echo "<br>" . "Inserted to Database";
        header("location:home.php");
    } else {
        echo "Not Inserted to Database";
    }
}
?>