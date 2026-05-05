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
        $res = $tran->make_request($ptstmt,$fullname,$email, $hashed_password,"client");
        
        
        if ($res) {
            $message = "Account created! <a href='login.php'>Log In Here</a>";
        } else {
            $message = "Error : This email is already used.";
        }
    }
}
include __DIR__ . '/../views/signup.php';
?>