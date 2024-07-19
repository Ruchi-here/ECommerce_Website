<?php
if(isset($_GET['edit_categories'])){
    $edit_categories = $_GET['edit_categories'];
    $get_categories = "SELECT * FROM `categories` WHERE category_id=$edit_categories";
    $result = mysqli_query($con, $get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];
    echo $category_title;
}

if (isset($_POST['edit_cat'])){
    $cat_title = $_POST['category_title'];

    $update_query = "UPDATE `categories` SET category_title=? WHERE category_id=?";
    $stmt = mysqli_prepare($con, $update_query);
    mysqli_stmt_bind_param($stmt, "si", $cat_title, $edit_categories);
    $result_cat = mysqli_stmt_execute($stmt);
    
    if ($result_cat) {
        echo "<script>alert('Category updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
?>



<div class="container mt-3">
    <h1 class="text-center">Edot Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form_label">Category Title</label>
            <input type="text" name="category_title" id="category_title" class=form-control required="required">
        </div>
        <input type="submit" value="Update Category" class= "btn btn-info px-3 mb-3" name="edit_cat">
    </form>
</div>