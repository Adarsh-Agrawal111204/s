<?php
include('db.php'); // Include database connection

// Fetch books from the database
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>

<div class="option"><a href="add_user.php">Add User</a></div>
<div class="option"><a href="add_book.php">Add Book</a></div>
<div class="option"><a href="view_users.php">View Users</a></div>
<!-- <div class="option"><a href="view_books.php">View Books</a></div> -->
<h2>Books List</h2>

<table>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Year</th>
        <th>Price</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['author'] . "</td>";
            echo "<td>" . $row['genre'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No books found</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>
