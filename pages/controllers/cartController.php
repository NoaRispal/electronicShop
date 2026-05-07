<?php
require_once __DIR__ . '../../../config/database.php';
function getProductById($id) {
    try {
        $tran= new Transaction();
        $req = "SELECT * FROM products WHERE product_id = :id";
        $ptstmt = $tran->init_request($req);
        $res = $tran->make_request($ptstmt,$id);
        $tran->close();
        $product = $res->fetch(PDO::FETCH_ASSOC);
        return $product;

    } catch (PDOException $e) {
        error_log("Error in getProductById: " . $e->getMessage());
        return null;
    }
}

$action = $_GET['action'] ?? 'view'; // 'add', 'remove', 'view'

// Init
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($action === 'add') {
    $id = $_GET['id'] ?? null;
    if ($id){
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]++;
        } else {
            $_SESSION['cart'][$id] = 1;
        }
        $totalItems = array_sum($_SESSION['cart']);
        echo json_encode([
            'success' => true,
            'newCount' => $totalItems
        ]);
        exit();
    } else {
        echo json_encode(['success' => false]);
        exit();
    }
}

if ($action === 'remove') {
    $id = $_GET['id'] ?? null;
    if ($id) unset($_SESSION['cart'][$id]);
    header("Location: ".BASE_URL."cart");
    exit();
}
if ($action === 'view') {
    include __DIR__ . '../../views/cart.php';
}
?>