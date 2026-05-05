<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded border shadow-sm">
            <li class="breadcrumb-item">
                <a href="index.php?page=home" class="text-primary text-decoration-none">
                    <i class="bi bi-house-door-fill"></i> Home
                </a>
            </li>
            
            <li class="breadcrumb-item">
                <a href="index.php?page=products" class="text-primary text-decoration-none">Products</a>
            </li>

            <li class="breadcrumb-item">
                <a href="index.php?page=products&category=<?=htmlspecialchars($item['catName'])?>" class="text-primary text-decoration-none"> <?= htmlspecialchars($item['catName']) ?></a>
               
            </li>
            <li class="breadcrumb-item active"><?php echo $item['name']; ?></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <img src="images/item1.jpg" class="img-fluid rounded" alt="Image">
            <!-- <img src=<?= $item["link"]?> class="img-fluid rounded" alt="Image"> -->
        </div>
        <div class="col-md-6">
            <h1><?php echo $item['name']; ?></h1>
            <p class="badge bg-secondary"><?php htmlspecialchars($item['catName']); ?></p>
            <h2 class="text-success"><?php echo $item['price']; ?> $</h2>
            <p class="mt-4"><?php echo $item['description']; ?></p>
            
            <div class="mt-4 border-top pt-3">
                <h5><i class="bi bi-geo-alt"></i> Shop availabilities :</h5>
                <ul class="list-group list-group-flush">
                    <?php foreach ($availabilities as $shop): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong><?= htmlspecialchars($shop['store_name']) ?></strong>
                            </div>
                            
                            <?php if ($shop['stock_quantity'] > 0): ?>
                                <span class="badge bg-success rounded-pill">Available</span>
                            <?php else: ?>
                                <span class="badge bg-danger rounded-pill">Out of stock</span>
                            <?php endif; ?>

                            <a href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($shop['store_address']) ?>" 
                            target="_blank" 
                            class="btn btn-sm btn-link">
                            Map
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="product-actions mt-3 mb-3">            
                <button class="btn btn-primary btn-lg" onclick="addToCart(<?php echo $item['product_id'] ?>)">
                    Add to cart
                </button>
                <span id="cart-message" class="ms-3 text-success fw-bold" style="display: none;">
                    <i class="bi bi-check-circle"></i> Added to cart!
                </span>
            </div>
        </div>
    </div>
</div>
