<?php
require_once __DIR__ . '../../../config/database.php';

$tran= new Transaction();

$req = "SELECT store_name,longitude,latitude,store_address,store_phone,store_mail,store_open FROM stores";
$ptstm = $tran->init_request($req);
$res = $tran->make_request($ptstm);
$stores_data = $res->fetchAll(PDO::FETCH_ASSOC);

// Set an API for map.js to call to get the data to pin the location of the stores on the interactive map

$action = $_GET['action'] ?? null;

if ($action=="get_stores"){
    if (ob_get_length()) ob_clean();
    header('Content-Type: application/json');
    echo json_encode($stores_data);
    exit; // Exit so that there is no HTML 
}

include __DIR__ . '/../views/contact.php';
?>