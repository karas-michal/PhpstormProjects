<?php
/**
 * Created by PhpStorm.
 * User: karas
 * Date: 21.11.2016
 * Time: 15:15
 */
include_once("libs/csrf/csrfprotector.php");
    session_start();

    if(session_destroy()) {
        header("Location: login.php");
    }
?>