<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenny's Cake Sales Monitoring System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f7e6e6;
            background-image: url("background-image.jpg");
            background-size: cover;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center aligning the content */
            width: 400px;
        }

        .logo {
            font-size: 2.5rem;
            color: #ff69b4;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            display: block;
            width: calc(100% - 20px);
            padding: 12px;
            background-color: #ff69b4;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #ff1493;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="login-container">
            <h1 class="logo">Jenny's Cake Sales Monitoring System</h1>
            <form id="loginForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <div class="mt-3">
                    <p id="error-message" class="text-danger" style="display: none;">Incorrect username
                        or password.</p>
                </div>
            </form>
            <div class="mt-3">
                <p>Don't have an account? <a href="#" id="toggleForm">Register</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Sample registered accounts including Jenny123
            var registeredAccounts = [{
                    username: "user",
                    password: "password"
                },
                {
                    username: "Jenny123",
                    password: "Jenny123"
                }
            ];

            // Login form submission
            $("#loginForm").submit(function(e) {
                e.preventDefault();
                var username = $("#username").val();
                var password = $("#password").val();
                var loggedIn = false;
                registeredAccounts.forEach(function(account) {
                    if (account.username === username && account.password === password) {
                        loggedIn = true;
                        // Successful login
                        // For demonstration, redirect to home page
                        window.location.href = "About.html.php";
                    }
                });
                if (!loggedIn) {
                    // Show error message for incorrect credentials
                    $("#error-message").show();
                }
            });

            // Registration form submission
            $("#registrationForm").submit(function(e) {
                e.preventDefault();
                var newUsername = $("#newUsername").val();
                var newPassword = $("#newPassword").val();
                // Check if the username already exists
                var exists = false;
                registeredAccounts.forEach(function(account) {
                    if (account.username === newUsername) {
                        exists = true;
                    }
                });
                if (exists) {
                    alert("Username already exists. Please choose a different username.");
                } else {
                    // Add the new account to registeredAccounts
                    registeredAccounts.push({
                        username: newUsername,
                        password: newPassword
                    });
                    alert("Registration successful!");
                    // Clear the registration form fields
                    $("#newUsername").val("");
                    $("#newPassword").val("");
                }
            });

            // Show registration form when register link is clicked
            $("#toggleForm").click(function() {
                $("#loginCard").toggle();
                $("#registerCard").toggle();
            });

            // Show login form when "Log in" link is clicked in registration form
            $("#backToLogin").click(function() {
                $("#registerCard").hide();
                $("#loginCard").show();
            });
        });
    </script>
</body>

</html>