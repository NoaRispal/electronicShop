<?php include __DIR__ . '/common/header.php'; ?>
<div class="p-5 mb-4 bg-light rounded-3 shadow-sm border">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">ElectronicStore HCMC</h1>
        <p class="col-md-8 fs-4">
        Your high-tech destination in the heart of District 10. 
        Discover our latest phones, laptops, accessories and more
        </p>
        <a href="index.php?page=products" class="btn btn-primary btn-lg">See products</a>
    </div>
</div>

<div class="container">
    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="p-3 border h-100 bg-white rounded shadow-sm">
                <i class="bi bi-shield-check fs-1 text-primary"></i>
                <h3>2 year warranty</h3>
                <p>All our electronic products are certified original with manufacturer's warranty.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 border h-100 bg-white rounded shadow-sm">
                <i class="bi bi-geo-alt fs-1 text-primary"></i>
                <h3>Points of Sale</h3>
                <p>Four physical stores to serve you in District 10.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 border h-100 bg-white rounded shadow-sm">
                <i class="bi bi-geo-alt fs-1 text-primary"></i>
                <h3>Wide Range of Product</h3>
                <p>More than 100+ products in 7 categories.</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Top Products -->
    <h2 class="mb-4 mt-4 text-center">Best-seller</h2>
    <div class="swiper productsSwiper">
        <div class="swiper-wrapper">
            <?php foreach ($top_products as $p): ?>
                <div class="swiper-slide">
                    <div class="card h-200 shadow-sm">
                        <img src="<?=BASE_URL.$p['link_image']?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?> - Electronic Store">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title text-truncate"><?= $p['name'] ?></h6>
                            <p class="fw-bold text-primary mb-1"><?= number_format($p['price'], 2) ?> €</p>
                            
                            <div class="d-flex gap-2 mt-auto pt-2">
                                <a href="<?= BASE_URL ?>/products/<?=$p['category_name']?>/<?=$p["product_id"]?>" class="btn btn-outline-secondary btn-sm flex-grow-1">Details</a>
                                <button onclick="addToCart(<?= $p['product_id'] ?>)" class="btn btn-primary btn-sm px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- New Products -->
    <h2 class="mb-4 mt-4 text-center">New products</h2>
    <div class="swiper productsSwiper">
        <div class="swiper-wrapper">
            <?php foreach ($new_products as $p): ?>
                <div class="swiper-slide">
                    <div class="card h-200 shadow-sm">
                        <img src="<?=BASE_URL.$p['link_image']?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?> - Electronic Store">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title text-truncate"><?= $p['name'] ?></h6>
                            <p class="fw-bold text-primary mb-1"><?= number_format($p['price'], 2) ?> €</p>
                            
                            <div class="d-flex gap-2 mt-auto pt-2">
                                <a href="<?= BASE_URL ?>/products/<?=$p['category_name']?>/<?=$p["product_id"]?>" class="btn btn-outline-secondary btn-sm flex-grow-1">Details</a>
                                <button onclick="addToCart(<?= $p['product_id'] ?>)" class="btn btn-primary btn-sm px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- Categories -->
    <h2 class="mb-4 mt-4 text-center">Our different categories</h2>
    <div class="container">
        <div class="swiper categoriesSwiper">
            <div class="swiper-wrapper">
                <?php foreach($all_categories as $catName):?>
                <div class="swiper-slide">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <a href="<?php echo BASE_URL; ?>products/<?= rawurlencode($catName) ?>" class="btn categoryBtn stretched-link"><?= $catName ?></a>
                            <!-- url encode because some catName has special char like  "&" and we need the naviguator to undersand that it is not another parameter but the same -->
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

