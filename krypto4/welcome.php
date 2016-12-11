<?php
/**
 * Created by PhpStorm.
 * User: karas
 * Date: 21.11.2016
 * Time: 15:14
 */
    include('session.php');
if($_SERVER["REQUEST_METHOD"] == "POST" && $login_session != "admin") {
// username and password sent from form
    $myiban = mysqli_real_escape_string($db, $_POST['iban']);
    $mytytulem = mysqli_real_escape_string($db, $_POST['tytulem']);
    $myamount = mysqli_real_escape_string($db, $_POST['amount']);
    $sql = "INSERT INTO transactions (from_user, to_user, amount, tytulem, IBAN) VALUES(".
        "(SELECT id FROM users WHERE username = '$login_session'), ".
        "(SELECT id FROM users WHERE iban='$myiban'), ".
        "'$myamount', ".
        "'$mytytulem', '$myiban'".
        ")";
    $_SESSION['order'] = $sql;
    $_SESSION['iban'] = $myiban;
    $_SESSION['tytulem'] = $mytytulem;
    $_SESSION['amount'] = $myamount;
    header("location: confirm.php");
}
?>
<html>

<head>

    <title>Wykonaj przelew </title>
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

        .box {
            border:#666666 solid 1px;
        }
    </style>
</head>

<body>
<h1>Welcome <?php echo $login_session; ?></h1>
<div style = "margin: 10em;">

    <form method = "post">
        <label>Numer konta  :</label><input type = "number" name = "iban" id="iban" class = "box"/><br /><br />
        <label>tytułem      :</label><input type = "text" name = "tytulem" class = "box" /><br/><br />
        <label>adres        :</label><input type = "text" name = "address" class = "box" /><br/><br />
        <label>suma         :</label><input type = "number" name = "amount" class = "box" /><br/><br />
        <input id="input"  type = "submit" value = " Wyslij "/><br />
    </form>


</div>
<h2><a href = "logout.php">Sign Out</a></h2>
<?php
if ($login_session == "admin") {
    $sql = "SELECT * FROM transactions";
    if ($result = $db->query($sql)) {

        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " ";
            echo "do: " . $row["IBAN"] . " ";
            echo "kwota: " . $row["amount"] . " ";
            echo "data: " . $row["data"] . " ";
            echo "zatwierdzone: " . $row["wykonano"] . " ";
            echo "<form action='' method='POST'>
           <input type='submit' name='submit" . $row["id"] . "' />
            </form>";
            echo "<br>";
            if (isset($_POST['submit' . $row["id"]])) {
                $sql2 = "UPDATE `transactions` SET `wykonano`=1 WHERE id=" . $row["id"];
                if ($db->query($sql2) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $db->error;
                }
            }

        }

        /* free result set */
        $result->free();
    }
}
?>
<?php $sql2 = "UPDATE `transactions` SET `wykonano`=1 WHERE id=2"; echo mysqli_query($db, $sql2);?>
</body>

</html>