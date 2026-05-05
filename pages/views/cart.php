<div class="container mt-5 mb-5">
    <h2>Your Shopping Cart</h2>
    <table class="table align-middle">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total_cart = 0;
            if (!empty($_SESSION['cart'])):
                foreach ($_SESSION['cart'] as $id => $qty):
                    $product = getProductById($id); 
                    // echo "<br>";
                    // print_r($_SESSION["cart"]);
                    // echo "<br>";
                    $subtotal = $product['price'] * $qty;
                    $total_cart += $subtotal;
            ?>
            <tr>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= number_format($product['price'], 0) ?> $</td>
                <td><?= $qty ?></td>
                <td><?= number_format($subtotal, 0) ?> $</td>
                <td>
                    <a href="index.php?page=cart&action=remove&id=<?= $id ?>" class="btn btn-sm btn-danger">Remove</a>
                </td>
            </tr>
            <?php endforeach; else: ?>
                <tr><td colspan="5" class="text-center">Your cart is empty.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="text-end">
        <h4>Total: <?= number_format($total_cart, 0) ?> $</h4>
        <button class="btn btn-success btn-lg">Pay</button>
    </div>
</div>