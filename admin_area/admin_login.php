<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        body{
            overflow-x:hidden;
        }
    </style>


</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">admin Login</h2>
        <div class="row d-flex align-tems-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="admin_adminame" class="form-label">admin name</label>
                        <input type="text" id="admin_adminame" class="form-control" placeholder="Enter your admin name" autocomplete="off" required="required" name="admin_adminame">
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="admin_password">
                    </div>
                    <!-- submit button -->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="admin_login">
                        <p class="small font-weight-bold mt-2 pt-1 mb-0">Don't have account? <a href="admin_registeration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if (isset($_POST['admin_login'])){
    $admin_adminame = $_POST['admin_adminame'];
    $admin_password = $_POST['admin_password'];

    $select_query = "Select * from `admin_table` where adminame='$admin_adminame'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    $_SESSION['adminame']=$admin_adminame;
    if (password_verify($admin_password, $row_data['admin_password'])){
            echo "<script>alert('Logged in successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }else{
        echo "<script>alert('Invalid credentials')</script>";
    }


?>
