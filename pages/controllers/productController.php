<?php
require_once __DIR__ . '../../../config/database.php';


$category = $_GET['category'] ?? null;

$tran= new Transaction();

$reqCat = "SELECT category_name FROM categories";
$ptstmCat = $tran->init_request($reqCat);
$resCat = $tran->make_request($ptstmCat);
$all_categories = $resCat->fetchAll(PDO::FETCH_COLUMN);

$search = $_GET['search'] ?? null;
if (isset($search)){
    $displayMode = 'precise_search';
    $param = "%".$search."%";

    // PAGINATION
    $reqCount = "SELECT COUNT(*) FROM products WHERE name LIKE ? OR description LIKE ?";
    $ptstmt = $tran->init_request($reqCount);
    $res = $tran->make_request($ptstmt,$param,$param);
    $total_items = $res->fetchColumn();
    $limit = 12; // number of products max/page
    $current_page = isset($_GET['p']) ? max(1, (int)$_GET['p']) : 1;
    $offset = ($current_page - 1) * $limit;
    $total_pages = ceil($total_items / $limit);
    //

    $req = "SELECT p.*, c.category_name
        FROM products p
        INNER JOIN categories c ON p.category_id = c.category_id
        WHERE p.name LIKE ? OR p.description LIKE ? 
        LIMIT $limit OFFSET $offset";
    $param = "%".$search."%";
    $ptstmt = $tran->init_request($req);
    $res = $tran->make_request($ptstmt,$param,$param);
    $all_products = $res->fetchAll(PDO::FETCH_ASSOC);

}
elseif (isset($category)){
    $sort = $_GET['sort'] ?? 'default';
    $displayMode = 'single_category';

    $orderBy = "p.sales_count DESC"; // default (popularity)

    if ($sort === 'price_asc') {
        $orderBy = "p.price ASC";
    } elseif ($sort === 'price_desc') {
        $orderBy = "p.price DESC";
    } elseif ($sort === 'alpha_asc') {
        $orderBy = "p.name ASC";
    }

    // PAGINATION
    $limit = 12; // Nombre de produits par page
    $current_page = isset($_GET['p']) ? max(1, (int)$_GET['p']) : 1;
    $offset = ($current_page - 1) * $limit;
    $countReq = "SELECT COUNT(*) FROM products p 
                 JOIN categories c ON p.category_id = c.category_id 
                 WHERE c.category_name = :cat AND p.number_available > 0";
    $countStm = $tran->init_request($countReq);
    $countRes = $tran->make_request($countStm, $category);
    $total_items = $countRes->fetchColumn();
    $total_pages = ceil($total_items / $limit);
    //

    $req = "SELECT p.*
            FROM products p 
            JOIN categories c ON p.category_id = c.category_id 
            WHERE c.category_name = :cat AND p.number_available > 0 
            ORDER BY $orderBy
            LIMIT $limit OFFSET $offset";

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