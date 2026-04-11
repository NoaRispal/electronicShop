<?php
require_once __DIR__ . '../../../config/database.php';


$category = $_GET['category'] ?? null;

$tran= new Transaction();

$reqCat = "SELECT category_name FROM categories";
$ptstmCat = $tran->init_request($reqCat);
$resCat = $tran->make_request($ptstmCat);
$all_categories = $resCat->fetchAll(PDO::FETCH_COLUMN);

if (isset($category)){
    $displayMode = 'single_category';
    $req = "SELECT p.*
            FROM products p 
            JOIN categories c ON p.category_id = c.category_id 
            WHERE c.category_name = :cat AND p.number_available > 0 
            ORDER BY p.sales_count DESC";

    $ptstm = $tran->init_request($req);
    $res = $tran->make_request($ptstm, $category);
    $tran->close();
    $all_products = $res->fetchAll();
}
else {
    $displayMode = 'all_categories';
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
}

include __DIR__ . '../../views/products.php';
?>