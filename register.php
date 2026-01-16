<?php
session_start();
require_once "config.php";

$message = "";

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Check if username exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->fetch()) {
        $message = "Username already exists!";
    } else {
        $stmt = $pdo->prepare(
            "INSERT INTO users (username, password_hash) VALUES (?, ?)"
        );
        $stmt->execute([$username, $password_hash]);

        $message = "Registration successful! You can now log in.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h2>Register</h2>

<?php if ($message) echo "<p>$message</p>"; ?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="register">Register</button>
</form>

<a href="login.php">Go to Login</a>
</body>
</html>
