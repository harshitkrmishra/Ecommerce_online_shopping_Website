<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
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
        .tb .icon{
            color: black;
        }
        .tb #pimage{
            width:80px;
            height: 80px;
            object-fit: contain;
            
        }
    </style>
</head>
<body>
    <h3 class="text-center">All products</h3>
    <table class="table table-bordered mt-5">
        <thead class="th">
            <tr  class="text-center">
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="tb">
            <?php

            $get_products="select * from `products`";
            $result=mysqli_query($con,$get_products);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['product_id'] ;
                $product_name=$row['product_name'] ;
                $product_img1=$row['product_img1'] ;
                $product_price=$row[ 'product_price'] ;
                $status=$row['status'] ;
                $number++; 
                ?>
                
                <tr class='text-center'>
                <td><?php echo $number ; ?></td>
                <td> <?php echo $product_name;?></td>
                <td><img src='./product_images/<?php echo $product_img1; ?>' alt='' id='pimage'></td>
                <td>  <?php echo$product_price; ?>/-</td>
                <td><?php
                $get_count="select  *  from `orders_pending` where product_id=$product_id";
                $result_count=mysqli_query($con,$get_count);
                $rows_count=mysqli_num_rows($result_count);
                echo $rows_count;
                ?></td>
                <td> <?php echo$status; ?></td>
                <td ><a href='index.php?edit_products=<?php echo $product_id; ?>' class='icon'><i class='fa-regular fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_product=<?php echo $product_id; ?>' class='icon'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
           
            <?php
            }
            ?>
            
        </tbody>
    </table>
</body>
</html>