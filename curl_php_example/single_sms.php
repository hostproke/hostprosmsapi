<?php

// Step 1: set your API_KEY from https://sms.hostpro.co.ke/sms-api/info

$api_key = 'a3l0am5pd3JodWxwQnhCbE9nYkM=';

// Step 2: Change the from number below. It can be a valid phone number or a String
$from = '254721000000';

// Step 3: the number we are sending to - Any phone number. You must have to insert country code at beginning of the number
$destination = '254710000000';

// Step 4: Use https://sms.hostpro.co.ke/sms/api is mandatory.

$url = 'https://sms.hostpro.co.ke/sms/api';

// the sms body
$sms = 'test message from Host Pro SMS';

// Create SMS Body for request
$sms_body = array(
    'action' => 'send-sms',
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms
);

$send_data = http_build_query($sms_body);

$gateway_url = $url . "?" . $send_data;

try {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $gateway_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    $output = curl_exec($ch);

    if (curl_errno($ch)) {
        $output = curl_error($ch);
    }
    curl_close($ch);

    var_dump($output);

}catch (Exception $exception){
    echo $exception->getMessage();
}