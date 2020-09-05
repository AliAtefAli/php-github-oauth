<?php

$host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'php_github_oauth';
$db_table = 'users';
//
$conn = mysqli_connect($host, $db_user, $db_password);
$selectedDB = mysqli_select_db($conn, $db_name);


if (isset($_POST['submit'])) {
    session_start();
    $name = $_SESSION['name'];
    $username = $_SESSION['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($conn) {
        $stm = "INSERT INTO users(name, username, password) VALUES ('$name', '$username', '$password')";
        $execute = mysqli_query($conn, $stm);

        if ($execute) {
            $_SESSION['loggedIn'] = true;
            header('Location: http://localhost/php-github-oauth/home.php');
            exit;

        } else {
            echo $conn->error;
        }
    } else {
        $conn->error;
    }


}