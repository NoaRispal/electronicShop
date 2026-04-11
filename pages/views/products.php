<!-- Search Bar -->

<div class="searchBar mt-5">
    <nav class="navbar navbar-expand-md">
        <div class="collapse navbar-collapse d-flex flex-column flex-md-row justify-content-center" id="navbarSupportedContent">
            <!-- Search bar  -->
            <form class="d-flex w-75" method="get">
                <input id = "searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>

<!-- Category filter -->

<div class="container">
    <!-- Catalogue with Bootstrap -->
    <div class="swiper categoriesSwiper">
    <div class="d-flex justify-content-center align-items-center"><h4>Category filter</h4></div>
        <div class="swiper-wrapper">
            <?php foreach($all_categories as $catName):?>
            <div class="swiper-slide">
                <div class="card">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <a href="index.php?page=products&category=<?= urlencode($catName) ?>" class="btn categoryBtn stretched-link"><?= $catName ?></a>
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


<?php if ($displayMode === 'all_categories'): ?>
<!-- Products carrousels -->

<div class="container">
    <!-- Catalogue with Bootstrap -->
    <?php foreach($products_by_category as $catName => $products):?>
    <div class="d-flex justify-content-center align-items-center">
        <div class="card">
            <div class="card-body d-flex justify-content-center align-items-center">
                <a href="index.php?page=products&category=<?= urlencode($catName) ?>" class="btn categoryBtn stretched-link"><?= $catName ?></a>
            </div>
        </div>
    </div>
    <div class="swiper productsSwiper">
        <div class="swiper-wrapper">
            <?php foreach ($products as $p): ?>
                <div class="swiper-slide">
                    <div class="card">
                        <img class="card-img-top" src="images/item1.jpg">
                        <div class="card-body">
                            <h5 class="card-title"> <?= $p['name'] ?>  </h5>
                            <p class="card-text"> <?= $p['description'] ?>  </p>
                            <button class="btn btn-secondary">View details</button>
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
<!-- single category items -->

<div class="container">
    <div class="row g-4"> 
        <?php foreach ($all_products as $p): ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <img src="images/item1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p['name'] ?></h5>
                        <p class="card-text"><?= $p['description'] ?></p>
                        <button class="btn btn-primary">Details</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php endif; ?>