<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Generate a random 6-digit code
    $verification_code = rand(100000, 999999);

    // Store email and code in session
    $_SESSION['email'] = $email;
    $_SESSION['code'] = $verification_code;

    // "Simulate" sending email by displaying the code
    echo "<h3>Verification Code Sent (Simulated): <code>$verification_code</code></h3>";
    echo "<p>Check your email (simulated). Now enter the code below to verify.</p>";
    echo "<a href='verify.php'>Go to Verification Page</a>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
</head>
<body>
  <h2>Email Registration</h2>
  <form method="post">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <input type="submit" value="Register & Send Code">
  </form>
</body>
</html>
