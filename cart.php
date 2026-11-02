<?php
session_start();

// Clear the cart after Checkout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'clear') {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $action = $_POST['action'];

        if ($action === 'increase') {
            $_SESSION['cart'][$product_id]['quantity']++;
        } elseif ($action === 'decrease' && $_SESSION['cart'][$product_id]['quantity'] > 1) {
            $_SESSION['cart'][$product_id]['quantity']--;
        } elseif ($action === 'remove') {
            unset($_SESSION['cart'][$product_id]);
        }
    }
}


// Calculate total
$total = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-logo">
                <a href="index.php" class="logo-text">SmartMarketHub</a>
            </div>
            <div class="navbar-nav">
                <a href="index.php" class="nav-link">Home</a>
                <a href="cart.php" class="nav-link active">Your Cart</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Your Cart</h2>
        <?php if (!empty($_SESSION['cart'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $product_id => $item): ?>
                        <tr>
                            <td>
                                <!-- Display the product image and name -->
                                <img src="images/item<?= $product_id ?>.jpg" alt="<?= htmlspecialchars($item['name']) ?>" style="width: 50px; height: 50px; margin-right: 10px;">
                                <?= htmlspecialchars($item['name']) ?>
                            </td>
                            <td>$<?= number_format($item['price'], 2) ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                            <td>
                                <form method="post" style="display: inline;">
                                    <input type="hidden" name="product_id" value="<?= $product_id ?>">
                                    <button type="submit" name="action" value="increase">+</button>
                                    <button type="submit" name="action" value="decrease">-</button>
                                    <button type="submit" name="action" value="remove">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><strong>Total:</strong> $<?= number_format($total, 2) ?></p>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <form method="post">
        <button type="submit" name="action" value="clear" class="checkout-btn">Checkout</button>
    </form>





    <footer class="footer">
        <div class="footer-container">
            <a class="footer-brand" href="index.php">SmartMarketHub</a>
            <div class="footer-links">
                <a href="contact.php">Contact Us</a>
                <a href="about.php">About Us</a>
            </div>
        </div>
        <p>&copy; 2024 SmartMarketHub. All rights reserved.</p>
    </footer>
</body>

</html>