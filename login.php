<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
?>
// Dummy credentials for demonstration purposes
$valid_email = "user@example.com";
$valid_password = "1234";

// Check if the user is already logged in
if (isset($_SESSION['status']) && $_SESSION['status'] == 'logged_in') {
    // If logged in, redirect to dashboard
    header('Location: dashboard.html');
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Authenticate user
    if ($email === $valid_email && $password === $valid_password) {
        // Set session variables on successful login
        $_SESSION['status'] = 'logged_in';
        $_SESSION['email'] = $email;

        // Debugging session values
        echo "Session set: " . $_SESSION['status'];  // Temporary debug output

        // Redirect to dashboard
        header('Location: dashboard.html');
        exit();
    } else {
        // Invalid login attempt
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="validate.js"></script>
</head>
<body>

    <fieldset>
        <legend>Login</legend>
        <form method="POST" action="">
            <table>
                <tr>
                    <td>E-mail:</td>
                    <td><input type="email" id="email" name="email" onblur="validateEmail()" required></td>
                    <td><span id="errorEmail" style="color:red"></span></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" id="password" name="password" onblur="validatePassword()" required></td>
                    <td><span id="errorPassword" style="color:red"></span></td>
                </tr>
                <?php
                // Display error message if login fails
                if (isset($error_message)) {
                    echo "<tr><td colspan='2' style='color:red;'>$error_message</td></tr>";
                }
                ?>
                <tr>
                    <td><button type="submit">Login</button></td>
                </tr>
                <tr>
                    <td><a href="signup.html">Don't have an account? Sign up here</a></td>
                </tr>
            </table>
        </form>
    </fieldset>

</body>
</html>
