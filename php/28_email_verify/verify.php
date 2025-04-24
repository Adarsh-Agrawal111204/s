<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_code = $_POST['code'];
    
    if ($user_code == $_SESSION['code']) {
        header("Location: verify_success.php");
        exit();
    } else {
        $error = "Invalid verification code.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Verify Email</title>
</head>
<body>
  <h2>Enter Verification Code</h2>
  <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="post">
    <label>Verification Code:</label><br>
    <input type="text" name="code" required><br><br>
    <input type="submit" value="Verify">
  </form>
</body>
</html>
