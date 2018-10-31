
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Bootup the Composer autoloader
include __DIR__ . '/vendor/autoload.php';

use Mautic\Auth\ApiAuth;

// $initAuth->newAuth() will accept an array of OAuth settings
$settings = array(
    'baseUrl'      => 'http://mautic.whatz.me',
    'version'      => 'OAuth2',
    'clientKey'    => '',
    'clientSecret' => '',
    'callback'     => 'http://www.google.com.br/'
);




// Initiate the auth object
$initAuth = new ApiAuth();
$auth     = $initAuth->newAuth($settings);



// Initiate process for obtaining an access token; this will redirect the user to the authorize endpoint and/or set the tokens when the user is redirected back after granting authorization

if ($auth->validateAccessToken()) {
    die('entrei');
    if ($auth->accessTokenUpdated()) {
        $accessTokenData = $auth->getAccessTokenData();

        var_dump($accessTokenData); die;

        //store access token data however you want
    }
}




