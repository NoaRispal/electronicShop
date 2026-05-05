<?php
require_once __DIR__ . '../../../config/database.php';
$tran= new Transaction();

if (isset($_POST['query'])) {
    $query = $_POST['query'] ?? '';

    if (strlen($query) > 1) {
        $req = "SELECT product_id, name, price, link_image FROM products WHERE name LIKE ? LIMIT 3";
        $ptstmt = $tran->init_request($req);
        $search_param = "%" . $query . "%";
        $res = $tran->make_request($ptstmt,$search_param);
        $products = $res->fetchAll();

        if ($products) {
            foreach ($products as $p) {
                echo "
                <a href='index.php?page=products&id=" . (int)$p['product_id'] . "' 
                   class='list-group-item list-group-item-action border-0 d-flex align-items-center p-2'>
                    
                    <!-- Image : plus petite, entière et centrée dans son carré -->
                    <div class='flex-shrink-0 border-0 d-flex align-items-center justify-content-center' style='width: 100px; height: 100px;'>
                        <img src='" . htmlspecialchars($p['link_image']) . "' 
                             alt='" . htmlspecialchars($p['name']) . "' 
                             class='rounded' 
                             style='max-width: 100%; max-height: 100%; object-fit: contain;'>
                    </div>
                
                    <!-- Texte : interdit le passage à la ligne, aligné horizontalement -->
                    <div class='flex-grow-1 ms-3 text-nowrap border-0'>
                        <div class='d-flex align-items-baseline border-0'>
                            <h6 class='mb-0 text-dark me-2'>" . htmlspecialchars($p['name']) . "</h6>
                            <span class='text-success fw-bold'>" . number_format($p['price'], 2, ',', ' ') . " $</span>
                        </div>
                    </div>
                </a>";
            }
        } else {
            echo "<div class='p-3 text-muted'>No products found.</div>";
        }
    }
}
?>