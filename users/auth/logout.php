<?php

session_start();
$_SESSION['id'] = '';
$_SESSION['name'] = '';
$_SESSION['username'] = '';
$_SESSION['loggedIn'] = false;

header('Location: http://localhost/php-github-oauth/home.php');
exit;