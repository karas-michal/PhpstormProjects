<?php
/**
 * Created by PhpStorm.
 * User: karas
 * Date: 23.12.2016
 * Time: 20:08
 */

include("config.php");
$token = $_GET['token'];
$sql = "SELECT id FROM users WHERE pass_recovery_code = '$token'";
$result = mysqli_query($db, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
$id = $row['id'];
// If result matched $myusername and $mypassword, table row must be 1 row
if ($count == 1) {
    ?>
    <html>
    <head>
        <title>Reset your password: </title>
        <style type = "text/css">
            body {
                font-family:Arial, Helvetica, sans-serif;
                font-size:14px;
            }

            label {
                font-weight:bold;
                width:100px;
                font-size:14px;
            }

            .box {
                border:#666666 solid 1px;
            }
        </style>
    </head>
    <body bgcolor = "#FFFFFF">
    <div align = "center">
        <div style = "width:400px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Input new password</b></div>
            <div style = "margin:30px">
                    <form action = "" method = "post">
                        <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                        <input type = "submit" value = "Set new password"/><br />
                    </form>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $mypassword = mysqli_real_escape_string($db, $_POST['password']);
        $sql = "UPDATE users SET pass_recovery_code = '' WHERE id = '$id'";
        $result = mysqli_query($db, $sql);
        $sql = "UPDATE users SET passcode = '$mypassword' WHERE id = '$id'";
        $result = mysqli_query($db, $sql);
        if($result){
            echo "password successfully changed";
        }
        else{
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
    }
}
else{
    echo "BAD_TOKEN";
}
