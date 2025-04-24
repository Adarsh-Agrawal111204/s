<?php
include('db.php'); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    $sql = "INSERT INTO books (title, author, genre, year, price) VALUES ('$title', '$author', '$genre', '$year', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Book added successfully.</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
</head>
<body>

<!-- <div class="option"><a href="add_user.php">Add User</a></div> -->
<!-- <div class="option"><a href="add_book.php">Add Book</a></div> -->
<div class="option"><a href="view_users.php">View Users</a></div>
<div class="option"><a href="view_books.php">View Books</a></div>

<h2>Add Book</h2>

<form method="POST" action="add_book.php">
    <label>Title:</label>
    <input type="text" name="title" required><br><br>

    <label>Author:</label>
    <input type="text" name="author" required><br><br>

    <label>Genre:</label>
    <input type="text" name="genre"><br><br>

    <label>Year:</label>
    <input type="number" name="year" required><br><br>

    <label>Price:</label>
    <input type="number" name="price" step="0.01" required><br><br>

    <input type="submit" value="Add Book">
</form>

</body>
</html>
