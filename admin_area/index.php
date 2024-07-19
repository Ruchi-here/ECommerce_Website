<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
        width: 100px;
        object-fit: contain;
    }
    body{
        overflow-x:hidden;
    }
    .product_img{
        width: 30%;
        object-fit: contain;
    }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
            </div>
        </nav>
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#" class="admin_image"><img src="../images/images (8).jpeg" alt=""></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                <button class="my-3"><a href="insert_products.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                <button class="my-3"><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                <button class="my-3"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                <button class="my-3"><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                <button class="my-3"><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                <button class="my-3"><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                <button class="my-3"><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
                <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>
                <button class="my-3"><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
                <button class="my-3"><a href="logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])){
                include('insert_brand.php');
            }
            if (isset($_GET['view_products'])){
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if (isset($_GET['delete_product'])){
                include('delete_product.php');
            }
            if (isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if (isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if (isset($_GET['edit_categories'])){
                include('edit_categories.php');
            }
            if (isset($_GET['edit_brands'])){
                include('edit_brands.php');
            }
            if (isset($_GET['delete_categories'])){
                include('delete_categories.php');
            }
            if (isset($_GET['delete_brands'])){
                include('delete_brands.php');
            }
            if (isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if (isset($_GET['list_users'])){
                include('list_users.php');
            }
            ?>
        </div>

        <div class="bg-info p-3 text-center">
    <p>All rights reserved</p>
    </div>
    </div>

    <!-- bootstrap js link -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>