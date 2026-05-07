/* Stores */
INSERT INTO stores (store_name, longitude, latitude, store_phone, store_mail, store_address, store_open)
VALUES 
('Electronic Shop - Ly Thuong Kiet', 106.65882400, 10.77195800, '+84 28 1234 5678', 'ltk_store@electronic.vn', '268 Ly Thuong Kiet, Ward 14, District 10, HCMC', '1'),
('Electronic Shop - To Hien Thanh', 106.66612300, 10.77852100, '+84 28 8765 4321', 'tht_store@electronic.vn', '152 To Hien Thanh, Ward 15, District 10, HCMC', '1'),
('Electronic Shop - Ba Thang Hai', 106.67345600, 10.77023100, '+84 28 1122 3344', 'bth_store@electronic.vn', '602 Ba Thang Hai, Ward 14, District 10, HCMC', '1'),
('Electronic Shop - Su Van Hanh', 106.66784500, 10.77589200, '+84 28 5566 7788', 'svh_store@electronic.vn', 'Van Hanh Mall, 11 Sư Vạn Hạnh, Ward 12, District 10, HCMC', '1');

/* Categories */
INSERT INTO categories (category_id, category_name)
VALUES 
(1, 'SmartPhone'),
(2, 'accessories'),
(3, 'IT'),
(4, 'Audio & Music'),
(5, 'Video & Imaging'),
(6, 'Gaming'),
(7, 'Connected Devices');

/* Products 1->20 */
INSERT INTO products (product_id, name, price, description, number_available, created_at, link_image, sales_count, category_id)
VALUES 
(1, 'iPhone 15', 900, 'iPhone 15, 3*5', 4, '2026-04-10 14:30:38', 'images/placeholder.jpg', 201, 1),
(2, 'Google Phone X', 900, 'Google has phone ?', 4, '2026-04-10 14:36:12', 'images/placeholder.jpg', 40, 1),
(3, 'iPhone 16', 900, 'iPhone 16, stop the count', 4, '2026-04-10 14:36:12', 'images/placeholder.jpg', 4, 1),
(4, 'iPhone 1', 200, 'iPhone 1, the original', 4, '2026-04-10 14:36:12', 'images/placeholder.jpg', 12, 1),
(5, 'iPhone 2', 300, 'iPhone 2, 2>1+1', 4, '2026-04-10 14:36:12', 'images/placeholder.jpg', 12, 1),
(6, 'iPhone 6', 500, 'iPhone 6, nostalgia', 4, '2026-04-10 14:36:12', 'images/placeholder.jpg', 12, 1),
(7, 'iPhone 7', 200, 'iPhone 7, 67', 4, '2026-04-10 14:36:12', 'images/placeholder.jpg', 12, 1),
(8, 'iPhone 8', 200, 'iPhone 8, the old ones', 4, '2026-04-10 14:36:12', 'images/placeholder.jpg', 12, 1),
(9, 'XPlus', 200, 'SmartPhone X times better', 4, '2026-04-10 14:36:12', 'images/placeholder.jpg', 12, 1),
(10, 'fairPhone', 200, 'Greener SmartPhone where you can change its components', 4, '2026-04-10 14:36:12', 'images/placeholder.jpg', 12, 1),
(11, 'laptop Asus X', 689, 'Super light laptop from Asus', 5, '2026-04-11 10:38:51', 'images/placeholder.jpg', 23, 2),
(12, 'iPhone 15 Silicone Case', 59, 'MagSafe compatible silicone case', 50, '2026-04-11 10:45:56', 'images/placeholder.jpg', 120, 2),
(13, 'Samsung 45W Fast Charger', 35, 'Super fast charging wall adapter', 100, '2026-04-11 10:45:56', 'images/placeholder.jpg', 340, 2),
(14, 'Anker PowerBank 20k', 49, '20000mAh portable battery', 30, '2026-04-11 10:45:56', 'images/placeholder.jpg', 85, 2),
(15, 'Tempered Glass Protector', 15, '9H hardness screen protector', 200, '2026-04-11 10:45:56', 'images/placeholder.jpg', 500, 2),
(16, 'Belkin Wireless Pad', 39, '15W Qi wireless charging station', 40, '2026-04-11 10:45:56', 'images/placeholder.jpg', 45, 2),
(17, 'Google Pixel Fold Case', 45, 'Leather protective cover', 15, '2026-04-11 10:45:56', 'images/placeholder.jpg', 12, 2),
(18, 'Car Dash Mount', 25, 'Universal magnetic car holder', 60, '2026-04-11 10:45:56', 'images/placeholder.jpg', 95, 2),
(19, 'USB-C to Lightning Cable', 19, 'MFi certified 2-meter cable', 150, '2026-04-11 10:45:56', 'images/placeholder.jpg', 210, 2),
(20, 'PopSocket Grip', 12, 'Expandable stand and grip', 300, '2026-04-11 10:45:56', 'images/placeholder.jpg', 430, 2);

/* Products 21->35 */
INSERT INTO products (product_id, name, price, description, number_available, created_at, link_image, sales_count, category_id)
VALUES 
(21, 'Selfie Stick Tripod', 29, 'Bluetooth remote shutter tripod', 25, '2026-04-11 10:45:56', 'images/placeholder.jpg', 38, 2),
(22, 'MacBook Air M2', 1199, 'Liquid Retina display, 8GB RAM', 10, '2026-04-11 10:44:37', 'images/placeholder.jpg', 55, 3),
(23, 'Logitech MX Master 3S', 99, 'Performance wireless mouse', 45, '2026-04-11 10:44:37', 'images/placeholder.jpg', 150, 3),
(24, 'Dell UltraSharp 27', 450, '4K USB-C Hub Monitor', 12, '2026-04-11 10:44:37', 'images/placeholder.jpg', 30, 3),
(25, 'Keychron K2 V2', 89, 'Mechanical wireless keyboard', 20, '2026-04-11 10:44:37', 'images/placeholder.jpg', 88, 3),
(26, 'iPad Air 64GB', 599, '10.9-inch Wi-Fi tablet', 18, '2026-04-11 10:44:37', 'images/placeholder.jpg', 42, 3),
(27, 'HP Pavilion Laptop', 749, 'Intel Core i7, 16GB RAM, 512GB SSD', 8, '2026-04-11 10:44:37', 'images/placeholder.jpg', 20, 3),
(28, 'Samsung T7 1TB SSD', 115, 'Portable external SSD', 35, '2026-04-11 10:44:37', 'images/placeholder.jpg', 110, 3),
(29, 'Seagate IronWolf 4TB', 95, 'Internal NAS Hard Drive', 25, '2026-04-11 10:44:37', 'images/placeholder.jpg', 40, 3),
(30, 'Microsoft Surface Pro 9', 999, '2-in-1 laptop-tablet', 7, '2026-04-11 10:44:37', 'images/placeholder.jpg', 15, 3),
(31, 'TP-Link WiFi 6 Router', 129, 'AX3000 Dual-Band Gigabit', 22, '2026-04-11 10:44:37', 'images/placeholder.jpg', 64, 3),
(32, 'Sony WH-1000XM5', 349, 'Noise canceling wireless headphones', 15, '2026-04-11 10:44:46', 'images/placeholder.jpg', 95, 4),
(33, 'AirPods Pro Gen 2', 249, 'Active noise cancellation earbuds', 40, '2026-04-11 10:44:46', 'images/placeholder.jpg', 280, 4),
(34, 'JBL Flip 6', 110, 'Portable waterproof speaker', 50, '2026-04-11 10:44:46', 'images/placeholder.jpg', 190, 4),
(35, 'Bose SoundLink Revolve', 199, '360 degree portable speaker', 20, '2026-04-11 10:44:46', 'images/placeholder.jpg', 75, 4);

/* Products 36->50 */
INSERT INTO products (product_id, name, price, description, number_available, created_at, link_image, sales_count, category_id)
VALUES 
(36, 'Audio-Technica LP120X', 279, 'Direct-drive turntable', 8, '2026-04-11 10:44:46', 'images/placeholder.jpg', 34, 4),
(37, 'Marshall Emberton II', 169, 'Compact portable speaker', 25, '2026-04-11 10:44:46', 'images/placeholder.jpg', 56, 4),
(38, 'Sennheiser HD 600', 299, 'Open-back professional headphones', 10, '2026-04-11 10:44:46', 'images/placeholder.jpg', 22, 4),
(39, 'Blue Yeti USB Mic', 129, 'Professional podcast microphone', 30, '2026-04-11 10:44:46', 'images/placeholder.jpg', 145, 4),
(40, 'Beats Studio Buds', 149, 'True wireless noise canceling', 35, '2026-04-11 10:44:46', 'images/placeholder.jpg', 112, 4),
(41, 'Focusrite Scarlett 2i2', 189, 'USB Audio Interface', 15, '2026-04-11 10:44:46', 'images/placeholder.jpg', 89, 4),
(42, 'LG C3 OLED 55"', 1399, '4K Smart TV Cinema HDR', 5, '2026-04-11 10:44:58', 'images/placeholder.jpg', 18, 5),
(43, 'Canon EOS R6 Mark II', 2499, 'Mirrorless full-frame camera', 3, '2026-04-11 10:44:58', 'images/placeholder.jpg', 7, 5),
(44, 'Ring Video Doorbell 4', 159, 'WiFi smart security camera', 25, '2026-04-11 10:44:58', 'images/placeholder.jpg', 130, 5),
(45, 'GoPro Hero 12 Black', 399, 'Waterproof action camera', 20, '2026-04-11 10:44:58', 'images/placeholder.jpg', 65, 5),
(46, 'Sony Alpha a7 IV', 2299, 'Hybrid full-frame mirrorless', 4, '2026-04-11 10:44:58', 'images/placeholder.jpg', 12, 5),
(47, 'DJI Mini 4 Pro', 759, 'Ultralight folding camera drone', 10, '2026-04-11 10:44:58', 'images/placeholder.jpg', 44, 5),
(48, 'TCL 6-Series 65"', 899, '4K QLED Roku Smart TV', 8, '2026-04-11 10:44:58', 'images/placeholder.jpg', 29, 5),
(49, 'Arlo Pro 5S 2K', 220, 'Wire-free security camera', 15, '2026-04-11 10:44:58', 'images/placeholder.jpg', 50, 5),
(50, 'Fujifilm Instax Mini 12', 79, 'Instant film camera', 40, '2026-04-11 10:44:58', 'images/placeholder.jpg', 210, 5);

/* Products 51 -> 65 */

INSERT INTO products (product_id, name, price, description, number_available, created_at, link_image, sales_count, category_id)
VALUES 
(51, 'BenQ TK700STi', 1499, '4K HDR Gaming Projector', 5, '2026-04-11 10:44:58', 'images/placeholder.jpg', 11, 5),
(52, 'Apple Watch Series 9', 399, 'Always-On Retina display', 25, '2026-04-11 10:45:13', 'images/placeholder.jpg', 140, 6),
(53, 'Philips Hue Starter Kit', 129, 'Smart lighting bridge + 3 bulbs', 30, '2026-04-11 10:45:13', 'images/placeholder.jpg', 88, 6),
(54, 'Google Nest Hub Gen 2', 99, 'Smart display with Assistant', 40, '2026-04-11 10:45:13', 'images/placeholder.jpg', 120, 6),
(55, 'Fitbit Charge 6', 159, 'Fitness and health tracker', 50, '2026-04-11 10:45:13', 'images/placeholder.jpg', 195, 6),
(56, 'Amazon Echo Dot 5th Gen', 49, 'Smart speaker with Alexa', 100, '2026-04-11 10:45:13', 'images/placeholder.jpg', 500, 6),
(57, 'Nanoleaf Shapes Panels', 199, 'Modular smart wall lights', 12, '2026-04-11 10:45:13', 'images/placeholder.jpg', 35, 6),
(58, 'August Smart Lock', 229, 'Keyless entry for front door', 15, '2026-04-11 10:45:13', 'images/placeholder.jpg', 27, 6),
(59, 'Withings Body+ Scale', 99, 'Smart composition WiFi scale', 20, '2026-04-11 10:45:13', 'images/placeholder.jpg', 62, 6),
(60, 'Nest Learning Thermostat', 249, 'Energy-saving smart thermostat', 18, '2026-04-11 10:45:13', 'images/placeholder.jpg', 48, 6),
(61, 'Wyze Bulb Color', 15, 'RGB smart LED bulb', 150, '2026-04-11 10:45:13', 'images/placeholder.jpg', 250, 6),
(62, 'PlayStation 5 Console', 499, 'Sony PS5 Disc Edition', 10, '2026-04-11 10:45:22', 'images/placeholder.jpg', 300, 7),
(63, 'RTX 4070 Ti Graphics Card', 799, '12GB GDDR6X GPU', 5, '2026-04-11 10:45:22', 'images/placeholder.jpg', 45, 7),
(64, 'Xbox Wireless Controller', 59, 'Robot White Controller', 60, '2026-04-11 10:45:22', 'images/placeholder.jpg', 220, 7),
(65, 'Nintendo Switch OLED', 349, '7-inch OLED screen model', 20, '2026-04-11 10:45:22', 'images/placeholder.jpg', 180, 7);

/* Products 66 -> 71 */
INSERT INTO products (product_id, name, price, description, number_available, created_at, link_image, sales_count, category_id)
VALUES 
(66, 'Razer BlackWidow V4', 169, 'Mechanical gaming keyboard', 15, '2026-04-11 10:45:22', 'images/placeholder.jpg', 78, 7),
(67, 'SteelSeries Arctis Nova 7', 179, 'Multi-platform gaming headset', 25, '2026-04-11 10:45:22', 'images/placeholder.jpg', 110, 7),
(68, 'ASUS ROG Strix Motherboard', 289, 'Z790 Intel LGA 1700 ATX', 12, '2026-04-11 10:45:22', 'images/placeholder.jpg', 32, 7),
(69, 'Secretlab TITAN Evo', 549, 'Ergonomic gaming chair', 8, '2026-04-11 10:45:22', 'images/placeholder.jpg', 50, 7),
(70, 'Logitech G Pro X Superlight', 139, 'Ultra-lightweight gaming mouse', 30, '2026-04-11 10:45:22', 'images/placeholder.jpg', 140, 7),
(71, 'Corsair Vengeance 32GB RAM', 110, 'DDR5 6000MHz memory kit', 40, '2026-04-11 10:45:22', 'images/placeholder.jpg', 95, 7);

/* Inventory */
INSERT INTO inventory (product_id, store_id, stock_quantity)
VALUES 
(1, 1, 15),
(1, 2, 8),
(1, 3, 2),
(1, 4, 5),
(2, 1, 15),
(2, 3, 2),
(3, 2, 8),
(3, 4, 5),
(4, 3, 2),
(4, 4, 5),
(5, 1, 15),
(5, 2, 8),
(6, 1, 15),
(7, 2, 8),
(7, 3, 2),
(8, 1, 15),
(8, 2, 8),
(9, 4, 5),
(11, 3, 2),
(12, 4, 5),
(13, 1, 15),
(14, 2, 8),
(14, 3, 2),
(14, 4, 5),
(15, 1, 15);

INSERT INTO inventory (product_id, store_id, stock_quantity)
VALUES 
(16, 2, 8),
(18, 3, 2),
(18, 4, 5),
(19, 1, 15),
(19, 3, 2),
(20, 2, 8),
(20, 4, 5),
(21, 2, 8),
(22, 1, 15),
(22, 3, 2),
(23, 1, 15),
(23, 4, 5),
(24, 2, 8),
(25, 3, 2),
(25, 4, 5),
(26, 1, 15),
(27, 2, 8),
(28, 3, 2),
(29, 4, 5),
(30, 1, 15),
(31, 2, 8),
(32, 3, 2),
(33, 1, 15),
(33, 4, 5),
(34, 2, 8);

INSERT INTO inventory (product_id, store_id, stock_quantity)
VALUES 
(35, 3, 2),
(36, 4, 5),
(37, 3, 2),
(37, 4, 5),
(38, 2, 8),
(39, 1, 15),
(40, 4, 5),
(41, 3, 2),
(42, 2, 8),
(43, 1, 15),
(44, 3, 2),
(44, 4, 5),
(45, 2, 8),
(46, 1, 15),
(47, 4, 5),
(48, 3, 2),
(49, 2, 8),
(50, 1, 15),
(51, 4, 5),
(52, 3, 2),
(53, 2, 8),
(54, 1, 15),
(55, 4, 5),
(56, 3, 2),
(57, 2, 8);

INSERT INTO inventory (product_id, store_id, stock_quantity)
VALUES 
(58, 1, 15),
(59, 4, 5),
(60, 3, 2),
(61, 2, 8),
(62, 1, 15),
(63, 4, 5),
(64, 3, 2),
(65, 1, 15),
(65, 2, 8),
(66, 1, 15),
(67, 3, 2),
(67, 4, 5),
(68, 1, 15),
(68, 2, 8),
(69, 4, 5),
(70, 3, 2),
(71, 2, 8);

/* Users */
INSERT INTO users (id, full_name, email, password, role)
VALUES 
(6, 'Admin User', 'admin@example.com', '$2y$10$Q9w.IvQZKfvSh/3D8zdEHOYIQ07UIjbKUQSmtx6MKlZkm/jFoMljm', 'admin'),
(5, 'John Doe', 'john.doe@example.com', '$2y$10$519twvnW3gGyKLqVp/JV6uPj5XB6746v4QxCR.fTmeqX4fSFoANQS', 'customer'),
(7, 'Client User', 'client@example.com', '$2y$10$liVRHx/UWQvCLUQkhiRA8OnQrFze8XjmWVUrvjgMkOjGmcgdwwQgq', 'customer');