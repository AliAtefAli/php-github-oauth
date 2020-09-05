<?php

$CODE = $_GET['code'];

if($CODE == '') {
    header('Location: http://localhost/php-github-oauth/home.php' );
    exit;
}

$CLIENT_ID = '';
$CLIENT_SECRET = '';
$URL = 'https://github.com/login/oauth/access_token';

$params = [
    'client_id' => $CLIENT_ID,
    'client_secret' => $CLIENT_SECRET,
    'code' => $CODE,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_HTTPHEADER,array (
        "Accept: application/json"
    ));

$response = curl_exec($ch);
curl_close($ch);

$json_decoded = json_decode($response);

if($json_decoded->access_token != '') {
    session_start();
    $_SESSION['id'] = $json_decoded->access_token;

    header('Location: http://localhost/php-github-oauth/users/api/get-response.php' );
        exit;

}
