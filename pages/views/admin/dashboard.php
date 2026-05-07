<?php include __DIR__ . '/../common/header.php'; ?>

<div class="container-fluid">
    <main class="px-md-4 bg-light min-vh-100">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-4 border-bottom">
            <h1 class="h3 fw-bold"><?= ucfirst($subPage) ?></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <span class="badge bg-white text-dark shadow-sm p-2 border text-muted">
                    <i class="bi bi-calendar3 me-1"></i> <?= date('d M Y') ?>
                </span>
            </div>
        </div>
        <div class="row g-4 mb-5">
            <?php foreach ($stats as $label => $value): ?>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-primary-subtle p-3 rounded-3 text-primary">
                                    <i class="bi <?= $label === 'total_products' ? 'bi-box-seam' : 'bi-graph-up' ?> fs-4"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <small class="text-muted text-uppercase fw-bold" style="font-size: 0.75rem;">
                                        <?= str_replace('_', ' ', $label) ?>
                                    </small>
                                    <h3 class="mb-0 fw-bold"><?= number_format($value, 0, ',', ' ') ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</div>