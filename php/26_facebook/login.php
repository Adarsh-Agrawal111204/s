<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'user_db');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect email and password from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check the database for user
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            echo "Login successful!";
            header("Location: dashboard.php");
            exit();
        } else {
            $loginError = "Invalid password!";
        }
    } else {
        $loginError = "No user found with this email!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { width: 300px; margin: 100px auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; }
        .input-field { width: 100%; padding: 10px; margin-top: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .button { width: 100%; padding: 10px; margin-top: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .button:hover { background-color: #45a049; }
        .error { color: red; font-size: 0.9em; text-align: center; }
        a { text-decoration: none; color: #4CAF50; display: block; text-align: center; margin-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Login to Facebook</h2>
    <?php if (isset($loginError)) { echo "<div class='error'>$loginError</div>"; } ?>
    <form method="POST" action="login.php">
        <input type="email" name="email" placeholder="Email" class="input-field" required>
        <input type="password" name="password" placeholder="Password" class="input-field" required>
        <input type="submit" value="Login" class="button">
    </form>
    <a href="index.php">Back to Home</a>
</div>

</body>
</html>
