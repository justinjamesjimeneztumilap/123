<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        nav a { margin-right: 20px; text-decoration: none; }
    </style>
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php endif; ?>
</nav>

<hr>

<h1>Welcome to My Website</h1>


<?php if (isset($_SESSION['user_id'])): ?>
    <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>! You are logged in.</p>
<?php else: ?>
    <p>Please log in or register to continue.</p>
<?php endif; ?>

</body>
</html>
