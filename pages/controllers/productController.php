<?php
require_once __DIR__ . '../../../config/database.php';

$tran= new Transaction();
$req = "SELECT p.*, c.category_name AS category_name 
        FROM products p
        JOIN categories c ON p.category_id = c.category_id
        WHERE number_available > 0
        ORDER BY p.category_id ASC, p.sales_count DESC;";

$ptstm = $tran->init_request($req);
$res = $tran->make_request($ptstm);
$tran->close();

$all_products = $res->fetchAll();

$products_by_category = [];
foreach ($all_products as $product) {
    $catName = $product['category_name'];

    if (!isset($products_by_category[$catName])) {
        $products_by_category[$catName] = [];
    }

    $products_by_category[$catName][] = $product;
}

include __DIR__ . '../../views/products.php';

?>