<?php
session_start();
include 'db.php';

$cart = $_SESSION['cart'] ?? [];
$total = 0;

echo "<h2>Your Cart</h2>";
echo "<a href='index.php'>Continue Shopping</a><br><br>";

if (empty($cart)) {
  echo "Cart is empty!";
  exit;
}

echo "<table border='1' cellpadding='10'>
<tr><th>Name</th><th>Price</th><th>Quantity</th><th>Total</th></tr>";

foreach ($cart as $id => $qty) {
  $res = $conn->query("SELECT * FROM products WHERE id=$id");
  $item = $res->fetch_assoc();
  $subtotal = $item['price'] * $qty;
  $total += $subtotal;
  echo "<tr>
          <td>{$item['name']}</td>
          <td>₹{$item['price']}</td>
          <td>$qty</td>
          <td>₹$subtotal</td>
        </tr>";
}
echo "<tr><td colspan='3'><b>Total</b></td><td><b>₹$total</b></td></tr>";
echo "</table>";
