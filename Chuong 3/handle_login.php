<?php
session_start();


$valid_user = "pdhiep";
$valid_pass = "123456";


$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === $valid_user && $password === $valid_pass) {
    $_SESSION['username'] = $username;
    header("Location: welcome.php");
    exit;
} else {
    header("Location: login.html?error=1");
    exit;
}
?>