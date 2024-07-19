<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>Sl no.</th>
            <th>category title</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_cat = "Select * from `categories`";
        $result = mysqli_query($con, $get_cat);
        $number = 0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
            ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $category_title; ?></td>
            <td><a href='index.php?edit_categories=<?php echo $category_id; ?>' class='text-light'><i class='fas fa-pen-square'></i></a></td>
            <td><a href='index.php?delete_categories=<?php echo $category_id; ?>' class='text-light'><i class='fas fa-trash-alt'></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>