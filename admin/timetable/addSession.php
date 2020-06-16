<?php
include("../session.php");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
}

$newDate = $_POST['newDate'];
$newSessNO = $_POST['newSessNO'];
$newVideo =  $_POST['newVideo'];
$newFeedback = $_POST['newFeedback'];

if (isset($_POST['addSessionSubmit'])) {
    $sql = "INSERT INTO `timetable` (`no`, `date`, `feedback`, `video`) VALUES ('$newSessNO', '$newDate', '$newFeedback', '$newVideo')";
    if (mysqli_query($conn, $sql)) {
        echo "<br>" . "Inserted to Database";
        header("location:../timetable.php");
    } else {
        echo "Not Inserted to Database";
    }
}
