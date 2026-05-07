<?php
require_once __DIR__ . '../../../config/database.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $fullname = htmlspecialchars($_POST['full_name']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } elseif (strlen($password) < 6) {
        $message = "Password length need to be more than 6 characters.";
    } else {
        // Hash
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $tran = new Transaction();
        
        $req = "INSERT INTO users (full_name,email, password,role) VALUES (?, ?, ?,?)";
        $ptstmt = $tran->init_request($req);
        $res = $tran->make_request($ptstmt,$fullname,$email, $hashed_password,'customer');
        
        
        if ($res) {
            $_SESSION['flash'] = "Account created!";
            $_SESSION['flash_type'] = "success";
            header("Location: ".BASE_URL."signin");
        } else {
            $_SESSION['flash'] =  "Error : This email is already used.";
            $_SESSION['flash_type'] = "danger";
            header("Location: ".BASE_URL."register");
        }
    }
}
include __DIR__ . '/../views/signup.php';
?>