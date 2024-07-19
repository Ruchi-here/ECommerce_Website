<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website-Card Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css files -->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
            width: 80px;
            height: 80px;
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
        <a class="nav-link" href="./users_area/user_registeration.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"><sup>
            <?php
            cart_item();
            ?>
        </sup></i></a>
      </li>
      
    </ul>
    
  </div>
</nav>

<!-- calling cart function -->

<?php
cart();
?>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./users_area/user_login.php">Login</a>
      </li>
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

<!-- fourth child table -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            
            <?php
            global $con;
            $get_ip_add = getIPAddress();
            $total_price = 0;
            $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
            $result = mysqli_query($con, $cart_query);
            $result_count = mysqli_num_rows($result);
            if ($result_count>0){
                echo "<thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
            </thead>
            <tbody>";
            while($row=mysqli_fetch_array($result)){
                $product_id = $row['product_id'];
                $select_products = "Select * from `products` where product_id='$product_id'";
                $result_products = mysqli_query($con, $select_products);
                while($row_product_price=mysqli_fetch_array($result_products)){
                    //print_r($row_product_price);
                    $product_price = array($row_product_price['product_price']);
                    $product_table = $row_product_price['product_price'];
                    $product_title = $row_product_price['product_title'];
                    $product_image1 = $row_product_price['product_image1'];
                    $product_values = array_sum($product_price);
                    $total_price += $product_values;
            
            ?>
            
                <tr>
                <td><?php echo $product_title ?></td>
            <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
            <td><input type="text" name="qty[<?php echo $product_id; ?>]" class="form-input w-50"></td>
            <?php
            $get_ip_add = getIPAddress();
            if (isset($_POST['update_cart'])) {
                $quantities = $_POST['qty'];
                //echo "1";
                foreach ($quantities as $product_id => $quantity) {
                    // Update the cart details for this product
                    $update_cart = "UPDATE `cart_details` SET quantity = '$quantity' WHERE product_id = '$product_id' AND ip_address = '$get_ip_add'";
                    $result_products_quantity = mysqli_query($con, $update_cart);
                
                    // Get the product price for the current product
                    $select_product_price = "SELECT product_price FROM `products` WHERE product_id = '$product_id'";
                    $result_product_price = mysqli_query($con, $select_product_price);
                    $row_product_price = mysqli_fetch_array($result_product_price);
                    $product_price = $row_product_price['product_price'];
                
                    // Convert quantity to integer
                    $quantity = intval($quantity);
                    
                    // Recalculate the total price for each product based on the new quantity
                    $total_price += $product_price * $quantity;
                }                
                
            }
            ?>

                    <td><?php echo $product_table?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php
                    echo $product_id;
                    ?>"></td>
                    <td>
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">
                            Update
                        </button> -->
                        <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">

                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">
                            Remove
                        </button> -->
                        <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">

                    </td>
                </tr>
                <?php 
                }}}
                else{
                    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                }
                
                
                ?>
            </tbody>
        </table>
<!-- subtotal -->
<div class="d-flex mb-5">
    <?php
    // Ensure the getIPAddress() function is defined and working correctly
    $get_ip_add = getIPAddress();

    // Use prepared statement to prevent SQL injection
    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = ?";
    $stmt = mysqli_prepare($con, $cart_query);
    mysqli_stmt_bind_param($stmt, "s", $get_ip_add);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if there are items in the cart
    $result_count = mysqli_num_rows($result);
    if ($result_count > 0) {
        echo "<h4 class='px-3'>Subtotal: <strong class='text-info'>$total_price</strong></h4>
        <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
        <button class='bg-secondary p-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
    } else {
        echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
    }

    // Handle form submission
    if (isset($_POST['continue_shopping'])) {
        echo "<script>window.open('index.php','_self')</script>";
    }
    ?>
            </div>
        </div>
    </div>
</div>
</form>
<!-- function to remove items -->
<?php

function remove_cart_item(){
    global $con;
    if (isset($_POST['remove_cart']) && isset($_POST['removeitem']) && is_array($_POST['removeitem'])) {
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query = "DELETE FROM `cart_details` WHERE product_id = '$remove_id'";
            $run_delete = mysqli_query($con, $delete_query);
            if ($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}


echo $remove_item = remove_cart_item();

?>
</div>
    </div>
<!-- bootstrap js link -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>