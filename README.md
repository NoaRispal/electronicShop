# Web Programming Semester Project: Electronic Shop

## Project Overview
This project is a dynamic, database-driven website developed as part of the Web Programming course, HCMUT. It demonstrates the practical application of core web technologies, including server-side logic, responsive design, and database management.

**Assigned Domain:** Electronic Shop 
**Technologies Used:** PHP, MySQL, AJAX, and [Bootstrap].

---
## How to start ? 

Follow these steps to get the project running on your local machine:

### 1. Clone the repository
Clone the project into your local server directory (e.g., `htdocs` for XAMPP or `www` for WAMP):
```bash
git clone git@github.com:NoaRispal/electronicShop.git
```
## 2. Initialize the Database

The project requires a MySQL database. You must import the following files provided in the deliverables:

- Execute `create_database.sql`: Creates the necessary tables.
- Execute `push_data_db.sql`: Populates the tables with sample data for the final demonstration.

**Check Credentials:** Open `config/db_config.php` and verify that the database name, username, and password match your local MySQL configuration.

---

## 3. Launch the Server

Start your local Apache and MySQL services (via XAMPP, WAMP, MAMP,...).

Open your web browser and navigate to:

```txt
http://localhost/electronicShop
```
---

## 4. Demo Credentials

To login on the website you can use the following demo credentials

```txt
admin@example.com / admin123
john.doe@example.com / johndoe123
```
---

## Key Features

### Layout & Responsive Design
**Consistent Structure:** Includes a Header (with logo), Navigation Bar, Main Content Body, and Footer. \
**Navigation:** Links for Home, Products, Search, and Contact. \
**Fully Responsive:** Optimized for Desktop, Tablet, and Mobile devices. \
**Breadcrumbs:** Implemented to show navigation paths (e.g., Home > Products > Category). 

### Core Functionalities
**Dynamic Product Catalog:** Items are retrieved from a MySQL database with support for sorting (price, name, rating). \
**Data Handling:** Implementation of Pagination for item display. \
**AJAX Search:** A dynamic search feature that updates results in real-time without a full page reload. \
**Maps Integration:** Display of physical store locations with direct Google Maps links.

### User Authentication
**Secure Access:** Complete system for User Registration, Login, Logout, and Forgot Password. \
**Security Standards:** Input validation (email/password) and secure password storage (no plain text).

### SEO Implementation
Applied at least three SEO best practices:
1.  Meaningful page titles and meta descriptions (in [header.php](./pages/views/common/header.php)).
2.  Friendly URLs.
3.  Sitemap (in [sitemap.php](./public/sitemap.php)).

---

## Database Requirements
The system utilizes a MySQL database consisting of at least the following tables: \
**Users:** Authentication and profile data. \
**Products:** Core inventory data. \
**Categories:** Structural organization of items. \
**Stores:** Physical stores data. \
**Inventory:** Products that we can found in each store (many-to-many relation).

See the Entity-Relation diagram -> [ER Diagram](./diagram/er.png)

---

## Project Structure & Deliverables
This repository contains the following mandatory components:
1.  **Database Files:** [SQL file](./config/) for table creation/sample data and the [ER Diagram](./diagram/er.png). \
2.  **Project Report:** [PDF](./report.pdf) explaining design decisions and implementation details.

---

## Author
**Name:** [Noa RISPAL] \
**Student ID:** [2560118] \
**Course:** Web Programming 
