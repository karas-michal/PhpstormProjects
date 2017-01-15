<?php
    include('config.php');
    session_start();

    $user_check = $_SESSION['login_user'];
    $user_check = htmlspecialchars(strip_tags($user_check));
    $ses_sql = mysqli_query($db,"select username from users where username = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

    $login_session = $row['username'];

    if(!isset($_SESSION['login_user'])){
        header("location:login.php");
    }
?>