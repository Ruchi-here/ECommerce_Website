<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin registration</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New Admin registration</h2>
        <div class="row d-flex align-tems-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!-- adminname field -->
                        <label for="admin_adminame" class="form-label">admin name</label>
                        <input type="text" id="admin_adminame" class="form-control" placeholder="Enter your name" autocomplete="off" required="required" name="admin_adminame">
                    </div>
                    <!-- admin email field -->
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="email" id="admin_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="admin_email">
                    </div>
                    <!-- user image field -->
                    <div class="form-outline mb-4">
                        <label for="admin_image" class="form-label">admin image</label>
                        <input type="file" id="admin_image" class="form-control" placeholder="Enter your image" autocomplete="off" required="required" name="admin_image">
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="admin_password">
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="conf_admin_password" class="form-label">Confirm password</label>
                        <input type="password" id="conf_admin_password" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_admin_password">
                    </div>
                    <!-- submit button -->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="admin_register">
                        <p class="small font-weight-bold mt-2 pt-1 mb-0">Already have an account? <a href="admin_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php
if (isset($_POST['admin_register'])){
    $admin_adminame = $_POST['admin_adminame'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password = $_POST['conf_admin_password'];
    $admin_image = $_FILES['admin_image']['name'];
    $admin_image_tmp = $_FILES['admin_image']['tmp_name'];
    $admin_ip = getIPAddress();

    // select query
    $select_query = "Select * from `admin_table` where adminame='$admin_adminame' or admin_email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count>0){
        echo "<script>alert('adminame and Email already exist')</script>";
    }
    else if ($admin_password!=$conf_admin_password){
        echo "<script>alert('Passwords doesn't match')</script>";
    }
    else {
        // Insert query
        move_uploaded_file($admin_image_tmp, "./admin_images/$admin_image");
        $insert_query = "INSERT INTO `admin_table` (adminame, admin_email, admin_password, admin_image, admin_ip) VALUES ('$admin_adminame', '$admin_email', '$hash_password', '$admin_image', '$admin_ip')";
        $sql_execute = mysqli_query($con, $insert_query);
        
        // Redirect to admin area
        header("Location: http://localhost/Ecommerce%20Website/admin_area/admin_registeration.php");
        exit(); // Ensure that subsequent code is not executed after redirection
    }
    

}

        
?>