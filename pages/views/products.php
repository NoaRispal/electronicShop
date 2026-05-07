<?php include __DIR__ . '/common/header.php'; ?>
<!-- Search Bar -->
<div class="searchBar d-flex justify-content-center align-items-center mt-5">
    <form class="d-flex border-1 position-relative w-50" action="<?= BASE_URL ?>products" method="get" autocomplete="off">
        <input name="search" class="searchInput form-control me-sm-2 text-dark" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-light" type="submit">Search</button>
        
        <div class="search_results_dropdown list-group position-absolute shadow" style="display:none; top: 100%; left: 0; width: 100%; z-index: 1000;"></div>
    </form>
</div>

<!-- Category filter -->

<div class="container mt-5 mb-5">
    <hr>
    <!-- Catalogue with Bootstrap -->
    <div class="swiper categoriesSwiper">
    <div class="d-flex justify-content-center align-items-center"><h4>Category filter</h4></div>
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
    <hr>
</div>

<!-- Breadcrumb -->
<div class="container mt-4 mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded border shadow-sm">
            <li class="breadcrumb-item">
                <a href="<?php echo BASE_URL; ?>home" class="text-primary text-decoration-none">
                    <i class="bi bi-house-door-fill"></i> Home
                </a>
            </li>
            
            <?php if ($page === 'products'): ?>
                <li class="breadcrumb-item <?= !isset($category) ? 'active' : '' ?>">
                    <?php if (isset($category)): ?>
                        <a href="<?php echo BASE_URL; ?>products">Products</a>
                    <?php else: ?>
                        Products
                    <?php endif; ?>
                </li>
            <?php endif; ?>

            <?php if (isset($category)): ?>
                <li class="breadcrumb-item active text-secondary" aria-current="page">
                    <?= htmlspecialchars($category) ?>
                </li>
            <?php endif; ?>
        </ol>
    </nav>
</div>


<?php if ($displayMode === 'all_categories'): ?>
<!-- Products carrousels -->

<div class="container mt-4">
    <!-- Catalogue with Bootstrap -->
    <?php foreach($products_by_category as $catName => $products):?>
    <div class="d-flex justify-content-center align-items-center">
        <div class="card">
            <div class="card-body d-flex justify-content-center align-items-center">
                <a href="<?php echo BASE_URL; ?>products/<?= rawurlencode($catName) ?>" class="btn categoryBtn stretched-link"><?= $catName ?></a>
            </div>
        </div>
    </div>
    <div class="swiper productsSwiper">
        <div class="swiper-wrapper">
            <?php foreach ($products as $p): ?>
                <div class="swiper-slide">
                    <div class="card h-200 shadow-sm">
                        <img src="<?=BASE_URL. $p['link_image']?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?> - Electronic Store">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title text-truncate"><?= $p['name'] ?></h6>
                            <p class="fw-bold text-primary mb-1"><?= number_format($p['price'], 2) ?> €</p>
                            
                            <div class="d-flex gap-2 mt-auto pt-2">
                                <a href="<?php echo BASE_URL; ?>products/<?=rawurlencode($catName)?>/<?=$p["product_id"]?>" class="btn btn-outline-secondary btn-sm flex-grow-1">Details</a>
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
    <?php endforeach; ?>
</div>

<?php elseif ($displayMode === 'single_category'): ?>

<?php 
    $sort_order = $_GET['sort'] ?? 'default'; 
    $current_page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    // On imagine que tu calcules le nombre total de pages en SQL
    $total_pages = $total_pages ?? 1; 
?>

<div class="container mb-5 mt-4">
    <div class="row">
        <!--FILTER -->
        <aside class="col-md-3 mb-4">
            <div class="card shadow-sm bg-light p-3">
                <h5 class="mb-3">Filters</h5>
                <form method="GET" action="<?php echo BASE_URL; ?>products/<?=rawurlencode($category)?>">
                    <div class="mb-3">
                        <label class="form-label small">Sort by</label>
                        <select name="sort" class="form-select form-select-sm bg-light border-1">
                            <option value="default" <?= $sort_order == 'best-seller' ? 'selected' : '' ?>>Best-seller</option>
                            <option value="price_asc" <?= $sort_order == 'price_asc' ? 'selected' : '' ?>>Price: Low to High</option>
                            <option value="price_desc" <?= $sort_order == 'price_desc' ? 'selected' : '' ?>>Price: High to Low</option>
                            <option value="alpha_asc" <?= $sort_order == 'alpha_asc' ? 'selected' : '' ?>>Name: A-Z</option>
                        </select>
                    </div>
                    
                    <!-- Tu peux ajouter d'autres filtres ici (Marques, Stock, etc.) -->
                    <button type="submit" class="btn btn-secondary btn-sm w-100">Apply Filters</button>
                </form>
            </div>
        </aside>

        <!-- Products -->
        <div class="container col-md-9">
            <div class="row g-3"> 
                <?php foreach ($all_products as $p): ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?=BASE_URL .$p['link_image']?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?> - Electronic Store">
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title text-truncate"><?= $p['name'] ?></h6>
                                <p class="fw-bold text-primary mb-1"><?= number_format($p['price'], 2) ?> €</p>
                                
                                <div class="d-flex gap-2 mt-auto pt-2">
                                    <a href="<?php echo BASE_URL; ?>/products/<?=$category?>/<?=$p["product_id"]?>" class="btn btn-outline-secondary btn-sm flex-grow-1">Details</a>
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

            <!-- PAGINATION -->
            <?php if ($total_pages > 1): ?>
            <nav class="mt-5">
                <ul class="pagination justify-content-center">
                    <!-- Previous -->
                    <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= BASE_URL ?>products/<?= rawurlencode($category) ?>?p=<?= $current_page - 1 ?>&sort=<?= $sort_order ?>">Previous</a>
                    </li>

                    <!-- List -->
                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= ($current_page == $i) ? 'active' : '' ?>">
                            <a class="page-link" href="<?= BASE_URL ?>products/<?= rawurlencode($category) ?>?p=<?= $i ?>&sort=<?= $sort_order ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next -->
                    <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= BASE_URL ?>products/<?= rawurlencode($category) ?>?p=<?= $current_page + 1 ?>&sort=<?= $sort_order ?>">Next</a>
                    </li>
                </ul>
            </nav>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php elseif ($displayMode === 'precise_search'): ?>
<?php 
    $sort_order = $_GET['sort'] ?? 'default'; 
    $current_page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    $search_query = $_GET['search'] ?? null; // On récupère le mot-clé s'il existe
    
    $url_params = BASE_URL."products";
    if (isset($_GET['category'])) $url_params .= urlencode($_GET['category']);
    if ($search_query) {
        $url_params .= "?search=" . urlencode($search_query)."&";
    } else {
        $url_params .= "&";
    }
?>

<div class="container mb-5 mt-4">
    <div class="mb-4">
        <?php if ($search_query): ?>
            <h3>Results for "<?= htmlspecialchars($search_query) ?>"</h3>
            <p class="text-muted"><?= $total_items ?> product(s) found.</p>
        <?php endif; ?>
    </div>

    <div class="row">
        <!-- FILTER -->
        <aside class="col-md-3 mb-4">
            <div class="card shadow-sm bg-light p-3">
                <h5 class="mb-3">Filters</h5>
                <form method="GET" action="<?= BASE_URL ?>products/<?= rawurlencode($p['category_name']) ?>">
                    <input type="hidden" name="page" value="products">
                    
                    <?php if(isset($_GET['category'])): ?>
                        <input type="hidden" name="category" value="<?=htmlspecialchars($_GET['category']) ?>">
                    <?php endif; ?>

                    <?php if($search_query): ?>
                        <input type="hidden" name="search" value="<?= htmlspecialchars($search_query) ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label small">Sort by</label>
                        <select name="sort" class="form-select form-select-sm bg-light border-1">
                            <option value="default" <?= $sort_order == 'default' ? 'selected' : '' ?>>Best-seller</option>
                            <option value="price_asc" <?= $sort_order == 'price_asc' ? 'selected' : '' ?>>Price: Low to High</option>
                            <option value="price_desc" <?= $sort_order == 'price_desc' ? 'selected' : '' ?>>Price: High to Low</option>
                            <option value="alpha_asc" <?= $sort_order == 'alpha_asc' ? 'selected' : '' ?>>Name: A-Z</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-secondary btn-sm w-100">Apply Filters</button>
                </form>
            </div>
        </aside>

        <!-- Products -->
        <div class="container col-md-9">
            <?php if (empty($all_products)): ?>
                <div class="alert alert-info">No products match your request.</div>
            <?php else: ?>
                <div class="row g-3"> 
                    <?php foreach ($all_products as $p): ?>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="card h-100 shadow-sm"> 
                                <img src="<?=BASE_URL.$p['link_image']?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?> - Electronic Store">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title text-truncate"><?= $p['name'] ?></h6>
                                    <p class="fw-bold text-primary mb-1"><?= number_format($p['price'], 2) ?> €</p>
                                    
                                    <div class="d-flex gap-2 mt-auto pt-2">
                                        <a href="<?php echo BASE_URL; ?>products/<?=$p['category_name']?>/<?=$p["product_id"]?>" class="btn btn-outline-secondary btn-sm flex-grow-1">Details</a>
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
            <?php endif; ?>

            <!-- PAGINATION -->
            <?php if ($total_pages > 1): ?>
            <nav class="mt-5">
                <ul class="pagination justify-content-center">
                    <!-- Previous -->
                    <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= $url_params ?>p=<?= $current_page - 1 ?>&sort=<?= $sort_order ?>">Previous</a>
                    </li>

                    <!-- List -->
                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= ($current_page == $i) ? 'active' : '' ?>">
                            <a class="page-link" href="<?= $url_params ?>p=<?= $i ?>&sort=<?= $sort_order ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next -->
                    <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= $url_params ?>p=<?= $current_page + 1 ?>&sort=<?= $sort_order ?>">Next</a>
                    </li>
                </ul>
            </nav>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php endif; ?>