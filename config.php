<?php
require_once "google-api/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("896303384300-4t0u328f4rerc1kcvk9uqtehsrm77eki.apps.googleusercontent.com");
$gClient->setClientSecret("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");
$gClient->setApplicationName("Google Login");
$gClient->setRedirectUri("http://localhost/shopphone/controller.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

// login URL
$login_url = $gClient->createAuthUrl();
?>