<?php
session_start();
$url = $_GET['url'] ?? '';
$params = explode('/', trim($url, '/'));

$page = $params[0] ?? 'home';

$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$host = $_SERVER['HTTP_HOST'];
$projectFolder = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$projectFolder = rtrim($projectFolder, '/') . '/';
define('BASE_URL', $protocol . "://" . $host . $projectFolder);

if ($page==='logout'){
    require_once '../pages/controllers/logoutController.php';
    exit();
}

if ($page === 'update_password') {
    require_once '../pages/controllers/pwdController.php';
    exit();
}

if ($page === 'cart' && isset($params[1])) {
    $_GET['action'] = $params[1];
    $_GET['id'] = isset($params[2]) ? $params[2] : null;
    if (!isset($_SESSION['user_id'])) {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'redirect' => BASE_URL."signin"
        ]);
        exit();
    }
    require_once '../pages/controllers/cartController.php';
    exit();
}

if ($page === 'contact' && isset($params[1])) {
    $_GET['action'] = $params[1];
    require_once '../pages/controllers/contactController.php';
    exit();
}

if ($page==='item_search') {
    require_once '../pages/controllers/item_search.php';
    exit();
}


switch($page) {
    case 'products':
        if (isset($params[1])) {
            $_GET['category'] = urldecode($params[1]);
        }
        if (isset($params[2])) {
            $_GET['id'] = $params[2];
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