<?php

require __DIR__ . '/vendor/autoload.php';

use StackOverflowTwilioPHPExamples\JsonMessageInstance;
use Twilio\Rest\Client;

// Load the variables in .env into PHP's $_SERVER and $_ENV superglobals
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Your Twilio Account SID and Auth Token.
// You can retrieve them from from https://twilio.com/console
$account_sid = $_SERVER['TWILIO_ACCOUNT_SID'];
$auth_token = $_SERVER['TWILIO_AUTH_TOKEN'];

// A Twilio phone number you own with SMS capabilities
$twilio_number = $_SERVER['TWILIO_PHONE_NUMBER'];

$client = new Client($account_sid, $auth_token);
$response = new JsonMessageInstance($client->messages->create(
    // The number to send the text message to (ideally, your mobile phone)
    $_SERVER['MY_PHONE_NUMBER'],
    [
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    ]
));

// Print a JSON-representation of the response returned from the request
echo json_encode($response);