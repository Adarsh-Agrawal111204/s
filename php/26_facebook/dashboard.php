<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { width: 400px; margin: 100px auto; padding: 20px; background-color: #fff; border-radius: 10px;  }
        h2 { text-align: center; }
        .button { width: 100%; padding: 10px; margin-top: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .button:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Welcome to Facebook, <?php echo $_SESSION['email']; ?></h2>
    <form method="POST">
        <input type="submit" name="logout" value="Logout" class="button">
    </form>
</div>

</body>
</html>
