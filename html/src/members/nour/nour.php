<?php

$data = file_get_contents("https://datasets-server.huggingface.co/rows?dataset=dair-ai%2Femotion&config=split&split=train&offset=0");
$jsonObject = json_decode($data, JSON_NUMERIC_CHECK);

$emotions = ['sadness', 'joy', 'anger', 'fear', 'suprise'];

$newArray = [];
foreach ($jsonObject['rows'] as $dict) {
    // Append elements to the new array
    $newArray[] =[
        'text'=>$dict['row']['text'],
        'label'=>$emotions[$dict['row']['label']]
    ];
}

$apiUrl = "https://api.cohere.ai/v1/classify";

$examples = [
    [
        'text' => 'Dermatologists don\'t like her!',
        'label' => 'Spam'
    ],
    [
        'text' => 'Hello, open to this?',
        'label' => 'Spam'
    ],
    [
        'text' => 'I need help please wire me $1000 right now',
        'label' => 'Spam'
    ],
    [
        'text' => 'Nice to know you ;)',
        'label' => 'Spam'
    ],
    [
        'text' => 'Please help me?',
        'label' => 'Spam'
    ],
    [
        'text' => 'Your parcel will be delivered today',
        'label' => 'Not spam'
    ],
    [
        'text' => 'Review changes to our Terms and Conditions',
        'label' => 'Not spam'
    ],
    [
        'text' => 'Weekly sync notes',
        'label' => 'Not spam'
    ],
    [
        'text' => 'Re: Follow up from today\'s meeting',
        'label' => 'Not spam'
    ],
    [
        'text' => 'Pre-read for tomorrow',
        'label' => 'Not spam'
    ]
    ];
var_dump($examples);
echo '<br><br>';
var_dump(array_slice($newArray, 0, 10));
echo '<br><br>';

// Create an array with the request data
$data = [
    'truncate' => 'END',
    'inputs' => [
        'I am very sad'
    ],
    'examples' => array_slice($newArray, 0, 10)
];

// Set the HTTP headers
$headers = [
    'http' => [
        'method' => 'POST',
        'header' => "Content-type: application/json\r\n" .
                    "Authorization: Bearer exQMw58EGsXQxGwpYk5y03hlkqJP434HAJ8ohHpC",
        'content' => json_encode($data),
    ]
];

$context = stream_context_create($headers);

// Make the HTTP request using file_get_contents
$response = file_get_contents($apiUrl, false, $context);

if ($response === false) {
    $error = error_get_last();
    echo "Error making the request: " . $error['message'];
} else {
    echo $response;
}
?>
