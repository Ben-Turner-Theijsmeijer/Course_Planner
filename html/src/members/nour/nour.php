<?php
error_reporting(~0);
ini_set('display_errors', 1);
$data = file_get_contents("https://datasets-server.huggingface.co/rows?dataset=dair-ai%2Femotion&config=split&split=train&offset=0");
$jsonObject = json_decode($data, JSON_NUMERIC_CHECK);

if (ini_get('allow_url_fopen') == 1) {
    echo '<p style="color: #0A0;">fopen is allowed on this host.</p>';
} else {
    echo '<p style="color: #A00;">fopen is not allowed on this host.</p>';
}

$newArray = [];
foreach ($jsonObject['rows'] as $dict) {
    // Append elements to the new array
    $newArray[] =
        $dict['row'];
}

$postdata = http_build_query(
    array(
        'model' => 'embed-english-v2.0',
        'inputs' => array('I feel bad'),
        'examples' => $newArray
    )
);

$opts = array(
    'http' =>
    array(
        'method'  => 'POST',
        'header'  => array('Authorization: BEARER exQMw58EGsXQxGwpYk5y03hlkqJP434HAJ8ohHpC', 'Content-Type: application/json', 'Content-Length: 10', 'Connection: close\r\n'),
        'data-raw' => $postdata,
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents('https://api.cohere.ai/v1/classify', false, $context);

var_dump($result);
