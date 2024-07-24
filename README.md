

```markdown
# Inventory and Stock Management System

This is a comprehensive Inventory and Stock Management System built using PHP and MySQL. The system includes functionalities for administrators, stock maintainers, and salesmen, providing a centralized platform for managing users, products, and sales.

## Features

- **Admin Dashboard**:
  - View and manage all users.
  - View sales data for today.
  - Manage stock and sales activities.
  - Print and download bill details.
  - Access salesman portal.
  - View and edit products with live search functionality.

- **Stock Maintainer**:
  - Add new products.
  - Update existing product details.
  - View and manage product inventory with live search.

- **Salesman**:
  - Search for products with live search functionality.
  - Add products to cart and checkout.
  - Print bills and save sales data in the database.

## Project Structure

```
inventory-management/
├── css/
│   └── styles.css
├── admin/
│   ├── dashboard.php
│   ├── create_user.php
│   ├── view_users.php
├── stock_maintainer/
│   ├── add_stock.php
│   ├── update_stock.php
│   ├── dashboard.php
│   ├── search_live.php
├── salesman/
│   ├── search_product.php
│   ├── checkout.php
│   ├── print_bill.php
│   ├── add_to_cart.php
├── config.php
├── index.php
├── login.php
└── README.md
```

## Installation

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/yourusername/inventory-management.git
    cd inventory-management
    ```

2. **Setup the Database**:
    - Create a new MySQL database.
    - Run the SQL script provided below to create the necessary tables and insert an initial admin user.

    ```sql
    CREATE DATABASE inventory_management;

    USE inventory_management;

    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        role ENUM('admin', 'salesman', 'stock_maintainer') NOT NULL
    );

    CREATE TABLE products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        product_name VARCHAR(255) NOT NULL,
        barcode VARCHAR(50) NOT NULL,
        quantity INT NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        stock_update_date DATE NOT NULL DEFAULT (CURRENT_DATE)
    );

    CREATE TABLE bills (
        id INT AUTO_INCREMENT PRIMARY KEY,
        total_price DECIMAL(10, 2) NOT NULL,
        total_items INT NOT NULL,
        purchase_date DATE NOT NULL DEFAULT (CURRENT_DATE)
    );

    CREATE TABLE bill_items (
        id INT AUTO_INCREMENT PRIMARY KEY,
        bill_id INT NOT NULL,
        product_id INT NOT NULL,
        quantity INT NOT NULL,
        total_price DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (bill_id) REFERENCES bills(id),
        FOREIGN KEY (product_id) REFERENCES products(id)
    );

    INSERT INTO users (username, password, role) VALUES ('admin', '$2y$10$7Q6YeKK3tJ/Rp47mPRpWxeXvBka6QzD8k3TAeZ8wNqV5j/SnOLpR2', 'admin');
    ```

3. **Configure the Database Connection**:
    - Update the `config.php` file with your database connection details.

    ```php
    <?php
    $servername = "your_server";
    $username = "your_username";
    $password = "your_password";
    $dbname = "inventory_management";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    ```

4. **Start the Server**:
    - Use a local server environment like XAMPP, WAMP, or MAMP to run the application.
    - Place the project files in the appropriate directory (`htdocs` for XAMPP, etc.).
    - Start the server and navigate to `http://localhost/inventory-management` to access the application.

## Usage

- **Admin**:
  - Log in with the admin credentials (`admin` / `youradminpassword`).
  - Access the dashboard to manage users, view sales data, and handle stock.

- **Stock Maintainer**:
  - Log in with stock maintainer credentials.
  - Add or update product information and manage inventory.

- **Salesman**:
  - Log in with salesman credentials.
  - Search for products, add to cart, and checkout.
  - Print bills and save sales data.

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your changes.

## License

This project is licensed under the MIT License.

## Contact

If you have any questions or suggestions, please contact [your name] at [your email].

```

Replace placeholders like `your_server`, `your_username`, `your_password`, `youradminpassword`, `yourusername`, `[your name]`, and `[your email]` with your actual information.
