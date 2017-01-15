<?php
/**
 * Created by PhpStorm.
 * User: karas
 * Date: 11.12.2016
 * Time: 20:46
 */
include_once("libs/csrf/csrfprotector.php");

include('session.php');
csrfProtector::init();
$sql = "SELECT * FROM transactions WHERE from_user = ".
    "(SELECT id FROM users WHERE username = '$login_session')";
//echo  mysqli_real_escape_string($db, htmlspecialchars(strip_tags(addslashes($login_session))));
?>
<html>

<head>
    <title>Potwierdzenie przelewu </title>
    <style type = "text/css">
    body {
    font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
        }

        label {
    font-weight:bold;
            width:100px;
            font-size:14px;
            display: block;
        }

    </style>
</head>

<body>
<h1>Wykonane przelewy</h1>
<div style = "margin: 10em;">
<?php
if ($result = $db->query($sql)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo "do: ".json_encode($row["IBAN"]." ");
        echo "kwota: ".json_encode($row["amount"]." ");
        echo "data: ".json_encode($row["data"]." ");
        echo "tytulem: ".json_encode($row["tytulem"]." ");
        echo "zatwierdzone: ".json_encode($row["wykonano"]." ");
        echo "<br>";
    }

    /* free result set */
    $result->free();
}

?>
</div>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>

