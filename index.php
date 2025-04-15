<?php
session_start();
require_once 'vendor/autoload.php';

// Initialize the Google Client
$client = new Google_Client();
$client->setClientId('73448991524-tlb7m3n0dp0tag2kq5kn7uvh86jar8sq.apps.googleusercontent.com'>
$client->setClientSecret('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');
$client->setRedirectUri('http://34.71.30.201/FlowVid/callback.php');
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: user_view.php');
    exit();
}

// Generate Google login URL
$loginUrl = $client->createAuthUrl();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowVid - Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
        }
        .login-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-button {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .login-button:hover {
            background-color: #45a049;
        }
        .oauth-button {
            padding: 10px;
            border-radius: 5px;
            background-color: #4285F4;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border: none;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .oauth-button:hover {</head>
<body>

    <h1>Welcome to FlowVid</h1>
    <p>Please log in to continue</p>

    <div class="login-container">
        <form method="POST" action="index.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="login-button">Login</button>
        </form>

        <br>
        <p>Or log in using Google:</p>
        <a href="<?= $loginUrl ?>" class="oauth-button">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Google_Logo_2013.png>
            Login with Google
        </a>
    </div>

</body>
</html>

            background-color: #357AE8;
        }
        .oauth-button img {
            margin-right: 10px;
        }
    </style>
