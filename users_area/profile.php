<?php

include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        #cb {
            background-color: #97f7bb;

        }

        #cp {
            background-color: #e2fced;
        }

        .pi {
            width: 70%;
            height: 70%;
            text-align: center;
            margin: auto;
        }

        #pi {
            background-color: #e2fced;
        }
        .cp {  
            background-color: #50eb8b;
            border: none;
            padding: 8px;
            border-radius: 5px;
        }
        .cp a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
            <div class="container-fluid">
                <img src="../img/logo/logo1.png" alt="" class="logo m-1">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-success" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <?php cart(); ?>

        <nav class="navbar navbar-expand-lg navbar-drak bg-secondary text mt-5 pt-4">
            <ul class="navbar-nav me-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest </a>
                </li> -->


                <!-- try -->
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo "
                    <li class=nav-item>
                    <a class=nav-link href=#>Welcome $username </a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest </a>
                </li>";
                }

                ?>



                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Logout </a>
                </li>";
                }

                ?>
            </ul>
        </nav>

        <!-- <div class="bg-light mt-2 ">
            <h3 class="text-center p-2">Newest Arrival !!</h3>
            <p class="text-center pb-2 m-0"> Discover the latest 2023 collection</p>
        </div> -->

        <div class="row">
            <div class="col-md-2 p-0" id="cp">
                <ul class="navbar-nav bg-secondary text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="cb">
                            <h5>Your profile</h5>
                        </a>
                    </li>
                    <?php

                    $username = $_SESSION['username'];
                    $user_image = "select * from `user_table` where username='$username'";
                    $result_image = mysqli_query($con, $user_image);
                    $row_image = mysqli_fetch_array($result_image);
                    $user_image = $row_image['user_image'];
                    echo "<li class='nav-item' id='pi'>
                        <img src='./user_images/$user_image ' alt='' class='pi my-3' >
                    </li>";
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="profile.php" id="cp">
                            Pending orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?edit_account" id="cp">
                            Edit account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?my_orders" id="cp">
                            My orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?delete_account" id="cp">
                            Delete account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" id="cp">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
                <div class="bg-light mt-2 ">
                    <h3 class="text-center p-2">Newest Arrival !!</h3>
                    <p class="text-center pb-2 m-0"> Discover the latest 2023 collection</p>
                </div>
                <?php get_user_order_details();
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }
                    if(isset($_GET['my_orders'])){
                        include('user_orders.php');
                    }
                    if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                    }
            ?>
            </div>

        </div>



        <!-- <p>All rightt reserved ©- Designed by Harshit Kumar </p> -->
        <?php include('../includes/footer.php') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>