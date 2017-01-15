<?php
/**
 * Created by PhpStorm.
 * User: karas
 * Date: 23.12.2016
 * Time: 16:43
 */
/**
 * Generate a random string, using a cryptographically secure
 * pseudorandom number generator (random_int)
 *
 * For PHP 7, random_int is a PHP core function
 * For PHP 5.x, depends on https://github.com/paragonie/random_compat
 *
 * @param int $length      How many characters do we want?
 * @param string $keyspace A string of all possible characters
 *                         to select from
 * @return string
 */
include_once("libs/csrf/csrfprotector.php");
function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[rand(0, $max)]; //should be random_int()
    }
    return $str;
}

include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['username'])) {
        $myusername = mysqli_real_escape_string($db, $_POST['username']);
        $mymail = mysqli_real_escape_string($db, $_POST['email']);
        //$sql = "SELECT id FROM users WHERE username = '$myusername' and email ='$mymail'";
        $mypassword = htmlspecialchars(strip_tags($mypassword));
        $myusername = htmlspecialchars(strip_tags($myusername));
        $sql = "SELECT id FROM users WHERE username = '$myusername' and passcode = '$mypassword'";
        $result = mysqli_query($db, $sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row
        if ($count == 1) {
            $id = $row['id'];
            echo $row;
            $token = random_str(25);
            $sql = "UPDATE users SET pass_recovery_code = '$token' WHERE id = '$id'";
            $result = mysqli_query($db, $sql);
            if (!$result) {
                printf("Error: %s\n", mysqli_error($db));
                exit();
            }
            $pass_rec_url = "https://localhost/krypto4/resetPassword.php?token=".$token;
            $to = $_POST['email'];
            $subject = 'password recovery';
            $message = 'hello user: '.$myusername."\r\n".
                        "your unique password recovery url: \r\n".
                        $pass_rec_url;
            $headers = 'From: lew6308@gmail.com' . "\r\n" .
                'Reply-To: lew6308@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
        }
    }
    header("location: password_rec_confirm.php");
}

?>

<html>


<head>
    <title>Password Recovery</title>

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

        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Password Recovery</b></div>

        <div style = "margin:30px">

                <form action = "" method = "post">
                    <label>username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                    <label>email     :</label><input type = "text" name = "email" class = "box"/><br /><br />
                    <input type = "submit" value = " Send "/><br />
                </form>

        </div>

    </div>

</div>

</body>
</html>
