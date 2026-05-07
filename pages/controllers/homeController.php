<?php
require_once __DIR__ . '../../../config/database.php';
$tran= new Transaction();

$req_new = "SELECT p.*, c.category_name AS category_name 
            FROM products p
            INNER JOIN categories c ON p.category_id = c.category_id
            ORDER BY p.created_at DESC
            LIMIT 10;";

$ptstm = $tran->init_request($req_new);
$res = $tran->make_request($ptstm);

$new_products = $res->fetchAll(PDO::FETCH_ASSOC);

$req_top = "SELECT p.*, c.category_name
            FROM products p
            INNER JOIN categories c ON p.category_id = c.category_id
            ORDER BY p.sales_count DESC
            LIMIT 10;";

$ptstm = $tran->init_request($req_top);
$res = $tran->make_request($ptstm);

$top_products = $res->fetchAll(PDO::FETCH_ASSOC);

$reqCat = "SELECT category_name FROM categories";
$ptstmCat = $tran->init_request($reqCat);
$resCat = $tran->make_request($ptstmCat);
$all_categories = $resCat->fetchAll(PDO::FETCH_COLUMN);

$tran->close();


include __DIR__ . '../../views/home.php';
?>