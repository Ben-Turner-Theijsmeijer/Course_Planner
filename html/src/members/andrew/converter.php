<?php

// Receive values
$amount = floatval($_POST["amount"]);
$from_currency = $_POST["from_currency"];
$to_currency = $_POST["to_currency"];

// Stores conversion rates for currencies supported
$conversion_rates = [
    "USD" => [
        "CAD" => 1.35,
        "EUR" => 0.95,
        "GBP" => 0.82,
        "JPY" => 149.43,

    ],
    "EUR" => [
        "CAD" => 1.43,
        "USD" => 1.06,
        "GBP" => 0.87,
        "JPY" => 157.81,
    ],
    "CAD" => [
        "USD" => 0.74,
        "GBP" => 0.61,
        "JPY" => 110.63,
        "EUR" => 0.70,
    ],
    "GBP" => [
        "USD" => 1.22,
        "CAD" => 1.65,
        "JPY" => 182.27,
        "EUR" => 1.15,
    ]
];

// Output the converted amount
if (isset($conversion_rates[$from_currency]) && isset($conversion_rates[$from_currency][$to_currency])) {
    $converted_amount = $amount * $conversion_rates[$from_currency][$to_currency];
    echo "<h1 class='font-sans font-bold text-black'>Converted Amount: {$converted_amount} {$to_currency}</h1>";
} else {
    echo "<h1 class='font-sans font-bold text-black'>Invalid Currency!</h1>";
}


?>