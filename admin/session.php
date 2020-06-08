<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "sip";
    session_start();

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);

    $user_check = $_SESSION['login_admin'];

    $sql = "SELECT `username` FROM `adminlogin` WHERE `username` = '$user_check' ";

    $returnD = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($returnD,MYSQLI_ASSOC);
    $login_session = $row['username'];

    if(!isset($_SESSION['login_admin'])){
        header("location:login.php");
        die();
    } else {
        if($login_session != $user_check){
            header("location:login.php");
            die();
        }
    }
?>