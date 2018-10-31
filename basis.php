
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Bootup the Composer autoloader
include __DIR__ . '/vendor/autoload.php';

use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;

$settings = array(
    'userName'   => '',             // Create a new user
    'password'   => ''              // Make it a secure password
);

// Initiate the auth object specifying to use BasicAuth
$initAuth = new ApiAuth();
$auth = $initAuth->newAuth($settings, 'BasicAuth');

$apiUrl   = "http://mautic.whatz.me";

$api      = new MauticApi();

$contactApi = $api->newApi("contacts", $auth, $apiUrl);

$data = array(
    'firstname' => 'Rodrigo 4',
    'lastname'  => 'my lastname Rodrigo',
    'email'     => 'email@email',
    'ipAddress' => '127.0.0.1',
    'link_easy_connect' => 'teste',
    'mobile' => 'mobile'
);

try {
    $contact = $contactApi->create($data);
    var_dump($contact);
} catch (Exception $e ){
    var_dump($e->getMessage());
}




