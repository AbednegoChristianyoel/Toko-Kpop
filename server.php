<?php
require 'vendor/autoload.php';
$server = new soap_server();

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$server->configureWSDL('Toko Kpop - Jual Album K-POP');
$server->wsdl->schemaTargetNamespace = $namespace;

function welcome_msg($nama) {
    return "Selamat Datang Chingu $nama!";
}

$server->register('welcome_msg',
    array('nama' => 'xsd:string'),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Welcoming Messages'
);

function get_info_promo($tipe_album, $hari) {
    if ($tipe_album == "old_album" and $hari == "minggu"){
        return " Ada spesial diskon nih untuk kamu sebesar 15% di hari $hari ini!";
    } 
    elseif ($tipe_album == "new_album" and $hari == "minggu"){
        return " Ada spesial diskon nih untuk kamu sebesar 5% di hari $hari ini!";
    }
    else {
        return "Sayang sekali belum ada diskon untuk kamu hari ini :(";
    }
}

$server->register('get_info_promo',
    array(
        'tipe_buku' => 'xsd:string',
        'hari' => 'xsd:string'
    ),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Mencari informasi promo untuk client'
);

function hitung_diskon($diskon, $harga_album){
    $total = $harga_album-($harga_album*$diskon);
    return "Chukkaeee.. Harga album kamu setelah diskon menjadi Rp.$total saja!";
}

$server->register('hitung_diskon',
    array(
        'diskon' => 'xsd:float',
        'harga_album' => 'xsd:int'
    ),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Mencari hasil harga diskon album'
);

function best_seller($group){
    if($group == 'BTS') {
        $m_bestseller = join(', ', array(
            "Proof by BTS", "Map Of The Soul: 7 by BTS", "Love Yourself 轉 Tear by BTS"
        ));
        return "Album K-POP yang best seller minggu ini yaitu: <br>$m_bestseller";
    }
    elseif($group == 'TWICE'){
        $r_bestseller = $m_bestseller = join(', ', array(
            "Celebrate by TWICE", "Perfect World by TWICE", "Formula of Love: O+T=<3 by TWICE"
        ));
        return "Album K-POP yang best seller minggu ini yaitu: <br>$m_bestseller";
    }
    else {
        return "Album yang kamu masukan saat ini sedang tidak termasuk best seller Album.";
    }
}

$server->register('best_seller',
    array('group' => 'xsd:string',),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Mencari Album best selling'
);

$server->service(file_get_contents("php://input"));
exit();