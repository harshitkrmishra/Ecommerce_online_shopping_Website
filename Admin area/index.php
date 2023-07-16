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
    <title>Admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow-x: hidden;
        }
        #navbar {
            background-image: linear-gradient(to right, #90f0b5, #cfffe1);
        }

        .logo {
            width: 10%;
            height: 10%;
            margin: 10px;
        }

        /* try */
        .side-menu {
            position: fixed;
            background-color: #ccf0e0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .side-menu button {
            width: 200px;
            text-decoration: none;
            padding: 0;
            border: none;
            margin: 5px;
            margin-right: 20px;
        }

        .side-menu a {
            text-decoration: none;
        }

        .side-menu ul {
            margin-top: 120px;
        }
        .side-menu li:hover,
        .side-menu li.active {
            background-color: #fff;
            color: #1a1a1a;
        }

        .container {
            position: absolute;
            right: 0;
            width: 76vw;
            height: 100vh;
            padding: 0;
            padding-left: 16px;
            margin-top: 70px;
            margin-right: 10px;
            
        }
        #insert {
            margin-left: 80px;
            width: 700px;
            height: 35px;
            margin-top: 30px;
        }

        #basic-addon1 {
            background-color: #90f0b5;
        }

        #btn {
            background-color: #cfffe1;
            width: 100px;
            margin-top: 10px;
            border-color: rgb(212, 235, 228);
        }

        #ip_body {
            /* background-image: linear-gradient(to right, #90f0b5, #cfffe1); */
            background-color: #edf6f2;
        }

        #btn1 {
            background-color: #90f0b5;
        }

        .side-menu li {
            font-weight: 500;
            padding:  15px;
            color: black;
            display: flex;
            align-items: center;
            background-color: #dff7ec;
        }

        .side-menu ul a {
            background-color: #ccf0e0;
        }

        .side-menu {
            width: 22vw;
        }

        .container .content .content-2 .md {
            width: 75vw;
            margin-bottom: 20px;

        }

    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
            <div class="container-fluid">
                <img src="../img/logo/logo1.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
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
                    <a class='nav-link' href='admin_login.php'>Login</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Logout </a>
                </li>";
                }

                ?>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>


    <!-- try -->
    <section id="sideMenu">
        <div class="side-menu">

            <ul>
                <button><a href="insert_product.php">
                        <li>Insert Product</li>
                    </a>
                </button>
                <button><a href="index.php?view_product">
                        <li>View Product</li>
                    </a>
                </button>
                <!-- <button><a href="index.php?insert_category">
                        <li>Insert Categories</li>
                    </a>
                </button>
                <button><a href="index.php?view_categories">
                        <li>View Categories</li>
                    </a>
                </button> -->
                <button><a href="index.php?insert_brand">
                        <li>Insert Brand</li>
                    </a>
                </button>
                <button><a href="index.php?view_brands">
                        <li>View Brand</li>
                    </a>
                </button>
                <button><a href="index.php?list_orders">
                        <li>All order</li>
                    </a>
                </button>

            </ul>
        </div>
    </section>
    <section id="workarea">
        <div class="container">
            <div class="content">
                <div class="content-2">
                    <div class="md">
                        <h3 class="text-center py-4 mx-5 my-3">Manage Details</h3>
                    </div>
                    <div class="all-order">
                        <?php
                        // if (isset($_GET['insert_category'])) {
                        //     include('insert_categories.php');
                        // }
                        if (isset($_GET['insert_brand'])) {
                            include('insert_brands.php');
                        }
                        if (isset($_GET['view_product'])) {
                            include('view_products.php');
                        }
                        if (isset($_GET['edit_products'])) {
                            include('edit_products.php');
                        }
                        if (isset($_GET['delete_product'])) {
                            include('delete_product.php');
                        }
                        // if (isset($_GET['view_categories'])) {
                        //     include('view_categories.php');
                        // }
                        if (isset($_GET['view_brands'])) {
                            include('view_brands.php');
                        }
                        // if (isset($_GET['edit_category'])) {
                        //     include('edit_category.php');
                        // }
                        if (isset($_GET['edit_brand'])) {
                            include('edit_brand.php');
                        }
                        // if (isset($_GET['delete_category'])) {
                        //     include('delete_category.php');
                        // }
                        if (isset($_GET['delete_brand'])) {
                            include('delete_brand.php');
                        }
                        if (isset($_GET['list_orders'])) {
                            include('list_orders.php');
                        }
                        if (isset($_GET['delete_order'])) {
                            include('delete_order.php');
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>