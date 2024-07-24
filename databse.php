-- Create database
CREATE DATABASE inventory_management;

-- Use the database
USE inventory_management;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'salesman', 'stock_maintainer') NOT NULL
);

-- Create products table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock_update_date DATE NOT NULL
);

-- Create bills table
CREATE TABLE bills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    purchase_date DATE NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);
