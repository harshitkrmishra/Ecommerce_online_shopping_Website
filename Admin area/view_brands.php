<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brands</title>
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
    <h3 class="text-center">All Brands</h3>
    <table class="table table-bordered mt-5  text-center">
        <thead class="th">
            <th>slno</th>
            <th>Brand tilte</th>
            <th>Edit</th>
            <th>delete</th>
        </thead>
        <tbody class="tb">
            <tr>
                <?php
                $select_cat = "select * from `brands`";
                $result = mysqli_query($con, $select_cat);
                $number = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $brand_id = $row['brand_id'];
                    $brand_name = $row['brand_name'];
                    $number++;
                ?>
                    <td><?php  echo $number ; ?></td>
                    <td><?php  echo $brand_name ; ?></td>
                    <td><a href='index.php?edit_brand=<?php echo $brand_id; ?>' class='icon'><i class='fa-regular fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_brand=<?php echo $brand_id; ?>' class='icon'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php
                }
        ?>
        </tbody>
    </table>
</body>

</html>