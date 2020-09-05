<?php

session_start();
$accessToken = $_SESSION['id'];

if ($accessToken == '') {
    echo 'Something went wrong because of the AccessToken';
}


$URL = 'https://api.github.com/user';
$autHeader = 'Authorization: token ' . $accessToken;
$userAgentHeader = 'User-Agent: php-auth';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Accept: application/json", $autHeader, $userAgentHeader
));

$response = curl_exec($ch);
curl_close($ch);
$json_decoded = json_decode($response);

$_SESSION['name'] = $json_decoded->name;
$_SESSION['username'] = $json_decoded->login;

header('Location: http://localhost/php-github-oauth/home.php');
exit;





