<?php

session_start();

$category = filter_input(INPUT_POST, 'category');
$tag = filter_input(INPUT_POST, 'tag');
$amount = filter_input(INPUT_POST, 'amount');

$amount = number_format($amount, 2, '.', '');
$_SESSION['lastincometag'] = $tag;
$_SESSION['lastincomeamount'] = $amount;


if (!empty($tag)){
    if (!empty($amount)){
    $host = "localhost";
    $dbusername = "zhe";
    $dbpassword = "1234";
    $dbname = "cfma";
    // Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
        if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());
        }
        else{
        $sql = "INSERT INTO income (category, tag, amount)
        values ('$category','$tag','$amount')";
            if ($conn->query($sql)){
                header("Location: index.php");
            }
            else{
            echo "Error: ". $sql ."
            ". $conn->error;
            }
        $conn->close();
        }
        }
    else{
        $_SESSION['status'] = "";
        header("Location: incomefail.php");
    }
    }
else{
    $_SESSION['status'] = "";
    header("Location: incomefail.php");
}
?>

