CREATE DATABASE electronic_store;
USE electronic_store;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'customer') NOT NULL
);

CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL
);

CREATE TABLE stores (
    store_id INT AUTO_INCREMENT PRIMARY KEY,
    store_name VARCHAR(100) NOT NULL,
    longitude DECIMAL(11, 8),
    latitude DECIMAL(10, 8),
    store_phone VARCHAR(20),
    store_mail VARCHAR(150),
    store_address TEXT,
    store_open int
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    number_available INT DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    link_image VARCHAR(255),
    sales_count INT DEFAULT 0,
    category_id INT,
    CONSTRAINT fk_category 
        FOREIGN KEY (category_id) 
        REFERENCES categories(category_id)
        ON DELETE SET NULL
);

CREATE TABLE inventory (
    product_id INT,
    store_id INT,
    stock_quantity INT DEFAULT 0,
    PRIMARY KEY (product_id, store_id),
    CONSTRAINT fk_product_inv
        FOREIGN KEY (product_id) 
        REFERENCES products(product_id)
        ON DELETE CASCADE,
    CONSTRAINT fk_store_inv
        FOREIGN KEY (store_id) 
        REFERENCES stores(store_id)
        ON DELETE CASCADE
);