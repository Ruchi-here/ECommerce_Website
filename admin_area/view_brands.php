<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>Sl no.</th>
            <th>brand title</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_brand = "Select * from `brands`";
        $result = mysqli_query($con, $get_brand);
        $number = 0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $number++;
            ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $brand_title; ?></td>
            <td><a href='index.php?edit_brands=<?php echo $brand_id; ?>' class='text-light'><i class='fas fa-pen-square'></i></a></td>
            <td><a href='index.php?delete_brands=<?php echo $brand_id; ?>' class='text-light'><i class='fas fa-trash-alt'></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>