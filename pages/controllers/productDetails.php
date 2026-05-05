<?php 
require_once __DIR__ . '../../../config/database.php';
$tran= new Transaction();
$id = $_GET['id'] ?? null;
$req = "SELECT p.*, c.category_name as catName FROM products p JOIN categories c ON p.category_id = c.category_id WHERE p.product_id = ?";
$ptstm = $tran->init_request($req);
$res = $tran->make_request($ptstm,$id);
$item = $res->fetch();

$req = "SELECT s.store_name, s.store_address, i.stock_quantity 
        FROM stores s
        LEFT JOIN inventory i ON s.store_id = i.store_id AND i.product_id = :id";

$ptstmt = $tran->init_request($req);
$res = $tran->make_request($ptstmt, $id);
$tran->close();

$availabilities =  $res->fetchAll(PDO::FETCH_ASSOC);

if (!$item) { echo "<div class='container mt-5'>Product not found.</div>";}
include __DIR__ . '../../views/product_details.php';
?>

