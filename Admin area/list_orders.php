<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <style>
        .th {
            background-image: linear-gradient(to right, #90f0b5, #cfffe1);
            border: black;
            align-items: center;
        }

        .tb {
            background-color: #e2fced;
            border: black;
        }

        .tb .icon {
            color: black;
        }
    </style>
</head>

<body>
    <h3 class="text-center">All Orders</h3>
    <table class="table table-bordered mt-5  text-center">
        <thead class="th">
            <?php
            $get_orders="select * from `user_orders` ";
            $result=mysqli_query($con,$get_orders);
            $row_count=mysqli_num_rows($result);
            echo  "<tr>
            <th>Sl no.</th>
            <th>Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='tb'>";

    if($row_count==0){
        echo "<h2 class='bg-danger text-center mt-5'>NO Orders Yet</h2>";
    }else{
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $user_id=$row_data['user_id'];
            $amount_due=$row_data['amount_due'];
            $invoice_number=$row_data['invoice_number'];
            $total_products=$row_data['total_products'];
            $order_date=$row_data['order_date'];
            $order_status=$row_data['order_status'];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>";
            echo "<td><a href='index.php?delete_order=$order_id' class='icon'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
        }
    }

            ?>
            
            
        </tbody>
    </table>
</body>

</html>