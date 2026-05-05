<?php
session_start();
$page = $_GET['page'] ?? 'home';

if ($page==='logout'){
    require_once '../pages/controllers/logoutController.php';
    exit();
}

if ($page === 'update_password') {
    require_once '../pages/controllers/pwdController.php';
    exit();
}

if ($page === 'cart' && isset($_GET['action'])) {
    if (!isset($_SESSION['user_id'])) {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'redirect' => 'index.php?page=signin'
        ]);
        exit();
    }
    require_once '../pages/controllers/cartController.php';
    exit();
}

if ($page === 'contact' && isset($_GET['action'])) {
    require_once '../pages/controllers/contactController.php';
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'item_search') {
    require_once '../pages/controllers/item_search.php';
    exit();
}

include __DIR__ . '/../pages/views/common/header.php';


switch($page) {
    case 'products':
        if (isset($_GET['id'])) {
            require_once '../pages/controllers/productDetails.php';
            break;
        }
        require_once '../pages/controllers/productController.php';
        break;
        
    case 'contact':
        require_once '../pages/controllers/contactController.php';
        break;

    case 'signin':
        require_once '../pages/controllers/signinController.php';
        break;

    case 'register':
        require_once '../pages/controllers/signupController.php';
        break;

    case 'forgot_password':
        include __DIR__ . '/../pages/views/forgot_password.php';
        break;

    case 'reset_request':
        require_once '../pages/controllers/pwdController.php';
        break;

    case 'cart':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?signin");
        }
        require_once '../pages/controllers/cartController.php';
        break;
        
    default:
        require_once '../pages/controllers/homeController.php';
        break;
}

include __DIR__ . '/../pages/views/common/footer.php';

?>