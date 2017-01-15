<?php
/**
 * Created by PhpStorm.
 * User: karas
 * Date: 21.11.2016
 * Time: 15:08
 */
include("config.php");
session_start();
$error = " ";
$captcha_ok = false;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    if(isset($_POST['username'])) {
        $myusername = mysqli_real_escape_string($db, $_POST['username']);
        $mypassword = mysqli_real_escape_string($db, $_POST['password']);
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
            $_SESSION['login_user'] = $myusername;

            header("location: welcome.php");
        } else {
            $error = "Your Login Name or Password is invalid";
        }
    }
    if(isset($_POST['g-recaptcha-response'])) {
        $response = $_POST['g-recaptcha-response'];
        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Ldmow8UAAAAAGB5j48bo77EwkJATV7QquJ3cn3g&response=".$response), true);
        if($response['success'] == false)
        {

        }
        else
        {
            $captcha_ok = true;
        }
    }
}
?>
<html>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1386165021408069',
            xfbml      : true,
            version    : 'v2.8'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>
    function post(path, params, method) {
        method = method || "post"; // Set method to post by default if not specified.

        // The rest of this code assumes you are not using a library.
        // It can be made less wordy if you use one.
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);

        for(var key in params) {
            if(params.hasOwnProperty(key)) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);

                form.appendChild(hiddenField);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            console.log(response.status);
            if(response.status == 'connected'){
                id_token = response.authResponse.userID;
                pass = response.authResponse.signedRequest;
                post('', {username: id_token, password: pass});
            }
        });
    }
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail());
        var id_token = googleUser.getAuthResponse().id_token;
        post('', {username: id_token, password: profile.getEmail()});
    }
</script>
<meta name="google-signin-client_id" content="269814215699-g373tbo2bipcv68icjdlq022fk7a41nr.apps.googleusercontent.com">
<head>
    <title>Login Page</title>

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

        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

        <div style = "margin:30px">
            <?php
            if($captcha_ok) :
            ?>
            <form action = "" method = "post">
                <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                <input type = "submit" value = " Submit "/><br />
            </form>
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
            <div class="fb-login-button" onlogin="checkLoginState();" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php
            if(!$captcha_ok) :
            ?>
                <form method="post">
                    <div class="g-recaptcha" data-sitekey="6Ldmow8UAAAAACxiLhJT2MDPexYn1eU7N8jsLIiC"></div>
                    <button type="submit">Submit</button>
                </form>
            <?php endif; ?>
        </div>

    </div>

</div>

</body>
</html>