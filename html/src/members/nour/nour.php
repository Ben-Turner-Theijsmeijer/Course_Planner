<?php

$data = file_get_contents("https://datasets-server.huggingface.co/rows?dataset=dair-ai%2Femotion&config=split&split=train&offset=0");
$jsonObject = json_decode($data, JSON_NUMERIC_CHECK);

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
