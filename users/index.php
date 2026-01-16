<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        a {
            margin-right: 15px;
        }
    </style>
</head>
<body>

<?php if (isset($_SESSION['user_id'])): ?>

    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>
    <p>You are logged in.</p>

    <a href="logout.php">Logout</a>

<?php else: ?>

    <h2>Welcome</h2>
    <p>Please log in or register.</p>

    <a href="login.php">Login</a>
    <a href="register.php">Register</a>

<?php endif; ?>

</body>
</html>
