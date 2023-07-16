<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
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
    <h3 class="text-center">All Categories</h3>
    <table class="table table-bordered mt-5  text-center">
        <thead class="th">
            <th>slno</th>
            <th>Category tilte</th>
            <th>Edit</th>
            <th>delete</th>
        </thead>
        <tbody class="tb">
            <tr>
                <?php
                $select_cat = "select * from `categories`";
                $result = mysqli_query($con, $select_cat);
                $number = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $category_id = $row['category_id'];
                    $category_name = $row['category_name'];
                    $number++;
                ?>
                    <td><?php  echo $number ; ?></td>
                    <td><?php  echo $category_name ; ?></td>
                    <td><a href='index.php?edit_category=<?php echo $category_id; ?>' class='icon'><i class='fa-regular fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_category=<?php echo $category_id; ?>' class='icon'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php
                }
        ?>
        </tbody>
    </table>
</body>

</html> -->