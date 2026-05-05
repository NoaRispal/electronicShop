<?php
require_once __DIR__ . '../../../config/database.php';
if (isset($_SESSION['user_id'])) { 
    header("Location: index.php"); 
    exit();
}
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $tran= new Transaction();
    $req = "SELECT id, password, full_name FROM users WHERE email = ?";
    $ptstm = $tran->init_request($req);
    $res = $tran->make_request($ptstm,$email);
    $tran->close();
    $user = $res->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['full_name'];
        header("Location: index.php?page=home");
        exit();
    } else {
        $error = "Invalid password or email.";
    }
}

include __DIR__ . '/../views/signin.php';

?>