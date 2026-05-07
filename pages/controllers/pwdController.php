<?php

require_once __DIR__ . '../../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['reset_user_id'])) {
    $new_password = $_POST['new_password'];
    $user_id = $_SESSION['reset_user_id'];

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $tran = new Transaction();
    $req = "UPDATE users SET password = ? WHERE id = ?";
    $ptstm = $tran->init_request($req);
    $tran->make_request($ptstm, $hashed_password, $user_id);
    $tran->close();

    unset($_SESSION['reset_user_id']);
    header("Location: ".BASE_URL."signin&reset=success");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $tran = new Transaction();
    $req = "SELECT id, full_name FROM users WHERE email = ?";
    $ptstm = $tran->init_request($req);
    $res = $tran->make_request($ptstm, $email);
    $user = $res->fetch();
    $tran->close();

    if ($user) {
        $_SESSION['reset_user_id'] = $user['id'];
        include __DIR__ . '/../views/change_password.php';
    } else {
        $error = "No account found with this email.";
        include __DIR__ . '/../views/forgot_password.php';
    }
}


?>