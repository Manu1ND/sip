<?php
include("session.php");

if (!empty($_POST['date']) || !empty($_POST['sessNO'])) {
    $date = $_POST['date'];
    $sessNO = $_POST['sessNO'];

    $result1 = mysqli_query($conn, "SELECT * FROM timetable WHERE `no` = '$sessNO' AND `date` = '$date'")
        or die("Failed to query database" . mysqli_error($conn));
    $row = mysqli_fetch_array($result1);
    $sessionID = $row['sessionID'];
    $regno = $_SESSION['login_user'];

    $result2 = mysqli_query($conn, "SELECT * FROM attendance WHERE `regno` = '$regno' AND `sessionID` = '$sessionID'")
        or die("Failed to query database" . mysqli_error($conn));
    if (!mysqli_fetch_array($result2)) {
        echo FALSE;
    } else {
        echo TRUE;
        $_SESSION['feedback'] = $row['feedback'];
    }
    die();
}
if (!$_SESSION['feedback']) {
    header("Location: timetable.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../assests/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assests/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assests/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assests/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assests/css/util.css">
    <link rel="stylesheet" type="text/css" href="../assests/css/main.css">
    <!--===============================================================================================-->

</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-color: rgb(0, 74, 134);">
            <div class="row" style="width: 100%">
                <div class="col-sm-3">
                    <div class="row-sm-6">
                        <a href="home.php">
                            <button class="login200-form-btn" name="Home">
                                Home
                            </button>
                        </a>
                    </div>
                    </br>
                    <div class="row-sm-6">
                        <button class="login200-form-btn" name="MCQ">
                            MCQ
                        </button>
                    </div>
                    </br>
                    <div class="row-sm-6">
                        <a href="timetable.php">
                            <button class="login200-form-btn" name="timeTable">
                                Time Table
                            </button>
                        </a>
                    </div>
                    </br>
                    <div class="row-sm-6">
                        <a href="logout.php">
                            <button class="login200-form-btn" name="logout" href="logout.php">
                                Sign Out
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="wrap-home100">
                        <div class="login100-form-title">
                            <label class="login100-form-title-1">Feedback</label>
                        </div>
                        <div class="col-sm">
                            <iframe src="<?= $_SESSION['feedback'] ?>" width="100%" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--===============================================================================================-->
        <script src="../assests/vendor/bootstrap/js/jquery-3.2.1.min.js"></script>
        <script src="../assests/vendor/bootstrap/js/popper.js"></script>
        <script src="../assests/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assests/js/main.js"></script>

</body>

</html>
<?php
unset($_SESSION["feedback"]);
?>