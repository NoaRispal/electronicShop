<div class="container bodyCarrousel">
    <!-- Catalogue with Bootstrap -->
    <?php foreach($products_by_category as $catName => $products):?>
    <div><p><?= $catName ?></p></div>
    <div class="swiper mySwiper">
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
    <?php endforeach; ?>
    </div>
</div>
