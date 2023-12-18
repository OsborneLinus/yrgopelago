<?php
require 'bookings/curl.php';
$curlHandling = new CurlHandling();
$result = $curlHandling->transferCode('b7658251-372d-470e-be0f-d5aac17cf930', '10');
echo $result;
