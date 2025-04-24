<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: register.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Verification Successful</title>
</head>
<body>
  <h2>Email Verified Successfully!</h2>
  <p>Welcome, <?= htmlspecialchars($_SESSION['email']) ?>.</p>
</body>
</html>
