#!/usr/bin/php
<?php

$autologin = file_get_contents('./autologin');
$wow = strtotime("Monday this week");
$wow = date("Y-m-d", $wow);
$waw = strtotime("Sunday this week");
$waw = date("Y-m-d", $waw);
$url = "https://intra.epitech.eu/" . $autologin ."/planning/load?format=json&start=". $wow . "&end=" . $waw;
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
$res = curl_exec($curl);
curl_close($curl);
$array = json_decode($res, true);
$config = file_get_contents('./config.json');
$something = json_decode($config, true);
for($i = 0; $i <= sizeof($array); $i++)
    echo $array[$i][$something["SOMETHING"]] ."\n";

?>