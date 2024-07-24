<?php
session_start();

if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'admin') {
        header('Location: admin/dashboard.php');
    } elseif ($_SESSION['role'] == 'salesman') {
        header('Location: salesman/search_product.php');
    } elseif ($_SESSION['role'] == 'stock_maintainer') {
        header('Location: stock_maintainer/add_stock.php');
    }
    exit;
} else {
    header('Location: login.php');
    exit;
}
?>
