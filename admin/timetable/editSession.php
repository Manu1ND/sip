<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "sip";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
}

$newDate = $_POST['newDate'];
$newSessNO = $_POST['newSessNO'];
$newVideo =  $_POST['newVideo'];
$newFeedback = $_POST['newFeedback'];

if (isset($_POST['editSessionSubmit'])) {

    // get original values
    $sql1 = "SELECT * FROM `timetable` WHERE `timetable`.`no`='$newSessNO' AND `timetable`.`date`='$newDate'";
    $returnD = mysqli_query($conn, $sql1);

    $result = mysqli_fetch_array($returnD);

    if ($newVideo == '')
        $newVideo = $result["video"];

    if ($newFeedback == '')
        $newFeedback = $result["feedback"];

    $sql2 = "UPDATE `timetable` SET `feedback` = '$newFeedback', `video` = '$newVideo' WHERE `timetable`.`no`='$newSessNO' AND `timetable`.`date`='$newDate'";

    if (mysqli_query($conn, $sql2)) {
        echo "<br>" . "Inserted to Database";
        header("location:../timetable.php");
    } else {
        echo "Not Inserted to Database";
    }
}

if (isset($_POST['deleteSession'])) {

    // get original values
    $sql = "DELETE FROM `timetable` WHERE `timetable`.`no`='$newSessNO' AND `timetable`.`date`='$newDate'";

    if (mysqli_query($conn, $sql)) {
        echo "<br>" . "Inserted to Database";
        header("location:../timetable.php");
    } else {
        echo "Not Inserted to Database";
    }
}
