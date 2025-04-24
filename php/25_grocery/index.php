<?php
session_start();
include 'db.php';

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

if (isset($_POST['add'])) {
  $id = $_POST['id'];
  $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
}

$result = $conn->query("SELECT * FROM products");
?>

<h2>Grocery Store</h2>
<table border="1" cellpadding="10">
<tr><th>Name</th><th>Price</th><th>Action</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?= $row['name'] ?></td>
    <td>₹<?= $row['price'] ?></td>
    <td>
      <form method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <button type="submit" name="add">Add to Cart</button>
      </form>
    </td>
  </tr>
<?php endwhile; ?>
</table>

<br>
<a href="cart.php">View Cart</a>
