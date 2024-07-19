<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website using PHP and MySQL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css files -->
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            overflow-x:hidden;
        }
        .profile_img{
            width: 90%;
            margin: auto;
            display: block;
            object-fit:contain;
        }
        .edit_image{
            width: 100px;
            height: 100px;
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
  <img src="./images/logo.jpg" alt="" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_registeration.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../cart.php"><i class="fas fa-shopping-cart"><sup>
            <?php
            cart_item();
            ?>
        </sup></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price: <?php
        total_cart_price();
        ?></a> 
      </li>
    </ul>
    <form class="d-flex" action="search_product.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
      <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
      
      <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
    </form>
  </div>
</nav>

<!-- calling cart function -->

<?php
cart();
?>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <?php
                // Check if the user is logged in
                if (!isset($_SESSION['username'])){
                    echo " <li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>";
                } else {
                    echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                    </li>";
                }

                // Display login/logout link based on user login status
              if (!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                    </li>";
              } else {
                  echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                    </li>";
                }
            ?>
    </ul>
</nav>

<!-- third child -->

<div class="bg-light">
    <h3 class="text-center">
        Hidden Store
    </h3>
    <p class="text-center">
        Communications is at the heart of e-commerce
    </p>
</div>

<!-- fourth child -->

<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Your Profile</h4></a>
        </li>
        <?php
        $username = $_SESSION['username'];
        $user_image = "Select * from `user_table` where username='$username'";
        $user_image = mysqli_query($con, $user_image);
        $row_image = mysqli_fetch_array($user_image);
        $user_image = $row_image['user_image'];
        echo $user_image;
        echo "<li class='nav-item'>
        <img src='./user_images/$user_image' class='profile_img my-4'>
    </li>";
        ?>
        <li class="nav-item">
            <a href="profile.php" class="nav-link text-light">Pending Orders</a>
        </li>
        <li class="nav-item">
            <a href="profile.php?edit_account" class="nav-link text-light">Edit Account</a>
        </li>
        <li class="nav-item">
            <a href="profile.php?my_orders" class="nav-link text-light">My Orders</a>
        </li>
        <li class="nav-item">
            <a href="profile.php?delete_account" class="nav-link text-light">Delete Orders</a>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="nav-link text-light">Logout</a>
        </li>
        </ul>
    </div>
    <div class="col-md-10">
        <?php
        get_user_order_details();
        if (isset($_GET['edit_account'])){
            include('edit_account.php');
        }
        if (isset($_GET['my_orders'])){
            include('user_orders.php');
        }

        ?>
    </div>
</div>


<!-- last child -->

<!-- <div class="bg-info p-3 text-center">
    <p>All rights reserved</p>
</div> -->
</div>
    </div>
<!-- bootstrap js link -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>