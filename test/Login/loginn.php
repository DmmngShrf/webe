<?php
session_start();
include "../Connection/dbconn.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    $sql = "SELECT * FROM `registration` WHERE username = '$username' AND password = '$password'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: ../Dashboard/dashboard.php");
        exit();
    } else {
        
        echo "Invalid password or username. Please try again.";
    }
} else {
    echo "Login form submission error.";
}

$connection->close();
?>
