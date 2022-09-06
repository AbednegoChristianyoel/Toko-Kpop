<?php
require 'vendor/autoload.php';

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$namespace = str_replace('client.php','server.php', $namespace);
$client = new nusoap_client($namespace);

$response = $client->call('welcome_msg', array(
    'nama' => 'Abednego Christianyoel Rumagit'
));
echo $response;

echo '<br>';

$response = $client->call('get_info_promo', array(
    'tipe_album' => 'old_album',
    'hari' => 'minggu'
));
echo $response;

echo '<br>';

$response = $client->call('hitung_diskon', array(
    'diskon' => 0.15,
    'harga_album' => 585000
));
echo $response;

echo '<br>';

$response = $client->call('best_seller', array(
    'group' => "TWICE"
));
echo $response;