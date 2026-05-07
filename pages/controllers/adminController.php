<?php
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: /signin'); // Redirection vers login si pas admin
    exit();
}

$subPage = $segments[2] ?? 'dashboard'; 

require_once __DIR__ . '../../../config/database.php';
$tran = new Transaction();

switch ($subPage) {
    case 'dashboard':
        $req = "SELECT COUNT(*) as total FROM products";
        $res = $tran->make_request($tran->init_request($req));
        $stats['total_products'] = $res->fetch(PDO::FETCH_ASSOC)['total'];

        $req_orders = "SELECT COUNT(*) as total FROM users";
        $res_orders = $tran->make_request($tran->init_request($req_orders));
        $stats['total_users'] = $res_orders->fetch(PDO::FETCH_ASSOC)['total'];
        break;

    default:
        $subPage = 'dashboard';
        break;
}

$tran->close();

include __DIR__ . '/../views/admin/dashboard.php';