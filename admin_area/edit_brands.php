<?php
if(isset($_GET['edit_brands'])){
    $edit_brands = $_GET['edit_brands'];
    $get_brands = "SELECT * FROM `brands` WHERE brand_id=$edit_brands";
    $result = mysqli_query($con, $get_brands);
    $row=mysqli_fetch_assoc($result);
    $brands_title = $row['brand_title'];
    echo $brands_title;
}

if (isset($_POST['edit_brands'])){
    $brands_title = $_POST['brands_title'];

    $update_query = "Update `brands` set brand_title='$brands_title' where brand_id=$edit_brands";
    $result_brand = mysqli_query($con, $update_query);
    if ($result_brand){
        echo "<script>alert('Brand updated successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
?>



<div class="container mt-3">
    <h1 class="text-center">Edit Brands</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brands_title" class="form_label">Brands Title</label>
            <input type="text" name="brands_title" value='<?php echo $brands_title;?>' id="brands_title" class=form-control required="required">
        </div>
        <input type="submit" value="Update brands" class= "btn btn-info px-3 mb-3" name="edit_brands">
    </form>
</div>