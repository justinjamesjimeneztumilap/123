<?php
$email = $_POST['email'];
$pass  = $_POST['password'];

$sql = "SELECT id, username, password_hash
        FROM users
        WHERE email = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($pass, $user['password_hash'])) {
    // Login success
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    echo "Login successful";
} else {
    echo "Invalid email or password";
}
?>
