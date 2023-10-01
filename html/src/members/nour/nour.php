<?php

function curl_get_contents($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

$data = curl_get_contents("https://datasets-server.huggingface.co/rows?dataset=dair-ai%2Femotion&config=split&split=train&offset=0");
$jsonObject = json_decode($data, JSON_NUMERIC_CHECK);
echo '<p>';
var_dump($jsonObject);
echo '</p>';
