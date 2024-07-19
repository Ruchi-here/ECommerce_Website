

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $username = $_SESSION['username'];
    $get_user = "Select * from `user_table` where username='$username'";
    $result = mysqli_query($con, $get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    //echo $user_id;
    ?>
<h3 class="text-success">All my orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
    <tr>
        <th>Serial no</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_order_details = "Select * from `user_orders` where user_id=$user_id";
        $result_orders = mysqli_query($con, $get_order_details);
        while($row_data=mysqli_fetch_assoc($result_orders)){
            $order_id = $row_data['order_id'];
            $amount_due = $row_data['amount_due'];
            $total_products = $row_data['total_products'];
            $invoice_number = $row_data['invoice_number'];
            $order_status = $row_data['order_status'];
            if ($order_status=='pending'){
                $order_status = 'Incomplete';
            }else{
                $order_status = 'Complete';
            }
            $order_date = $row_data['order_date'];
            $number = 1;
            echo " <tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='confirm_payment.php' class='text-light'>Confirm</a></td>
            </tr>";
            $number++; 
        }
        ?>

    </tbody>
    
</table>
</body>
</html>