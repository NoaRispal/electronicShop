<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Store</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper.js CDN pour les carrousels  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script type= "module" src="js/swiper.js" defer></script>
    <!-- Leaflet.js (Interactive Map) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="js/map.js" defer></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/general/button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-md navbar-light bg-light justify-content-between fixed-top">
            <!-- Logo -->
            <a class= "nav-brand" href="../../../index.php?page=home" id="logo-container">
                <img src="images/logo.png" id="logo">
            </a>
            <!-- Nav Bar for mobile  -->
            <button class="navbar-toggler me-2 order-0" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Nav Bar  -->
            <div class="collapse navbar-collapse d-flex flex-column flex-md-row" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php?page=home">Home</a></li>
                    <li class="nav-item active"><a class="nav-link" href="index.php?page=products">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=contact">Contact</a></li>
                </ul>
                <!-- Search bar  -->
                <form class="d-flex order-2 order-md-1" method="get">
                    <input id = "searchInput" class="form-control me-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <!-- Sign In button  -->
                <ul class="navbar-nav order-1 order-md-2">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=signin">Sign In</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<!-- Body and HTML will be closed in footer.php -->