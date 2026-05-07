<?php
require_once __DIR__ . '/../config/database.php'; 
$tran = new Transaction();

$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$host = $_SERVER['HTTP_HOST'];
$projectFolder = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$projectFolder = rtrim($projectFolder, '/') . '/';
define('BASE_URL', $protocol . "://" . $host . $projectFolder);

// To say that it is XML
header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Home URL
echo '<url>';
echo '  <loc>' . BASE_URL . '</loc>';
echo '  <changefreq>daily</changefreq>';
echo '  <priority>1.0</priority>';
echo '</url>';

// Categories URLs 
$ptstmt = $tran->init_request("SELECT category_name FROM categories");
$res_cat = $tran->make_request($ptstmt);
while ($cat = $res_cat->fetch(PDO::FETCH_ASSOC)) {
    echo '<url>';
    echo '  <loc>' . BASE_URL . 'products/' . rawurlencode($cat['category_name']) . '</loc>';
    echo '  <changefreq>weekly</changefreq>';
    echo '  <priority>0.8</priority>';
    echo '</url>';
}

// Products URLs 
$stmt = $tran->init_request("SELECT p.product_id, c.category_name as category_name 
                        FROM products p 
                        JOIN categories c ON p.category_id = c.category_id");
$res_prod = $tran->make_request($stmt);
while ($p = $res_prod->fetch(PDO::FETCH_ASSOC)) {
    echo '<url>';
    echo '  <loc>' . BASE_URL . 'products/' . rawurlencode($p['category_name']) . '/' . $p['product_id'] . '</loc>';
    echo '  <changefreq>monthly</changefreq>';
    echo '  <priority>0.6</priority>';
    echo '</url>';
}

echo '</urlset>';