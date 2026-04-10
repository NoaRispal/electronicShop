<?php
$page = $_GET['page'] ?? 'home';

include __DIR__ . '/../pages/views/common/header.php';

switch($page) {
    case 'products':
        require_once '../pages/controllers/productController.php';
        break;
        
    case 'contact':
        require_once '../pages/controllers/contactController.php';
        break;

    case 'signin':
        require_once '../pages/controllers/signinController.php';
        break;
        
    default:
        require_once '../pages/controllers/homeController.php';
        break;
}

include __DIR__ . '/../pages/views/common/footer.php';

?>