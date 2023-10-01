<?php
$data = file_get_contents("https://datasets-server.huggingface.co/rows?dataset=dair-ai%2Femotion&config=split&split=train&offset=0");
$jsonObject = json_decode($data, JSON_NUMERIC_CHECK);
var_dump(json_encode($jsonObject['rows'][0]['row']));
