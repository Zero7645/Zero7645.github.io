<?php
session_start();
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('73448991524-tlb7m3n0dp0tag2kq5kn7uvh86jar8sq.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://34.71.30.201/FlowVid/callback.php');
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);

// Authenticate code from Google redirect
if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();

    // Get user info
    $oauth = new Google_Service_Oauth2($client);
    $userInfo = $oauth->userinfo->get();

    // Store user session data
    $_SESSION['user_id'] = $userInfo->id;
    $_SESSION['email'] = $userInfo->email;
    $_SESSION['name'] = $userInfo->name;

    header('Location: user_view.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
