<?php
// $con = mysqli_connect('localhost', 'root', '', 'meera');

function getproducts()
{
    global $con;

    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

            $select_query = "Select * from `products` limit 0,12";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $product_description = $row['product_description'];
                $product_img1 = $row['product_img1'];
                $product_price = $row['product_price'];
                // $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./Admin area/product_images/$product_img1' class='card-img-top' alt='$product_name'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_name</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='cp'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='cb'>View More</a>
                            </div>
                        </div>
                    </div>";
            }
        }
    }
}


function get_all_products()
{
    global $con;


    if (!isset($_GET['brand'])) {

        $select_query = "Select * from `products` order by rand() ";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_img1 = $row['product_img1'];
            $product_price = $row['product_price'];
            // $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./Admin area/product_images/$product_img1' class='card-img-top' alt='$product_name'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_name</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='cp'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='cb'>View More</a>
                            </div>
                        </div>
                    </div>";
        }
    }
}

// function get_unique_categories()
// {
//     global $con;

//     if (isset($_GET['category'])) {
//         $category_id = $_GET['category'];

//         $select_query = "SELECT * FROM `products` WHERE category_id=?";
//         $stmt = mysqli_prepare($con, $select_query);
//         mysqli_stmt_bind_param($stmt, "i", $category_id);
//         mysqli_stmt_execute($stmt);
//         $result_query = mysqli_stmt_get_result($stmt);
//         $num_of_rows = mysqli_num_rows($result_query);
//         if ($num_of_rows == 0) {
//             echo "<h2  class='text-center'> NO stock for this category </h2>";
//         } else {
//             while ($row = mysqli_fetch_assoc($result_query)) {
//                 $product_id = $row['product_id'];
//                 $product_name = $row['product_name'];
//                 $product_description = $row['product_description'];
//                 $product_img1 = $row['product_img1'];
//                 $product_price = $row['product_price'];
//                 $category_id = $row['category_id'];
//                 $brand_id = $row['brand_id'];
//                 echo "<div class='col-md-4 mb-2'>
//                         <div class='card'>
//                             <img src='./Admin area/product_images/$product_img1' class='card-img-top' alt='$product_name'>
//                             <div class='card-body'>
//                                 <h5 class='card-title'>$product_name</h5>
//                                 <p class='card-text'>$product_description</p>
//                                 <p class='card-text'>price: $product_price/-</p>
//                                 <a href='index.php?add_to_cart=$product_id' class='cp'>Add to Cart</a>
//                                 <a href='product_details.php?product_id=$product_id' class='cb'>View More</a>
//                             </div>
//                         </div>
//                     </div>";
//             }
//         }
//     }
// }



function get_unique_brands()
{
    global $con;

    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];

        $select_query = "SELECT * FROM `products` WHERE brand_id=?";
        $stmt = mysqli_prepare($con, $select_query);
        mysqli_stmt_bind_param($stmt, "i", $brand_id);
        mysqli_stmt_execute($stmt);
        $result_query = mysqli_stmt_get_result($stmt);

        if (!$result_query) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }

        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {
            echo "<h2>No products found in this Brand</h2>";
            return;
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_img1 = $row['product_img1'];
            $product_price = $row['product_price'];
            // $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./Admin area/product_images/$product_img1' class='card-img-top' alt='$product_name'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_name</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='cp'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='cb'>View More</a>
                        </div>
                    </div>
                </div>";
        }
    }
}




function getbrands()
{
    global $con;
    $select_brands = "Select * from `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_name = $row_data['brand_name'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
                                <a href=index.php?brand=$brand_id' class='nav-link'>$brand_name</a>
                                </li>";
    }
}

// function getcategories()
// {
//     global $con;
//     $select_categories = "Select * from `categories`";
//     $result_categories = mysqli_query($con, $select_categories);
//     while ($row_data = mysqli_fetch_assoc($result_categories)) {
//         $category_name = $row_data['category_name'];
//         $category_id = $row_data['category_id'];
//         echo "<li class='nav-item'>
//                                 <a href=index.php?category=$category_id' class='nav-link'>$category_name</a>
//                                 </li>";
//     }
// }



function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {
            echo "<h2 class='text-center'>No products found !!</h2>";
            return;
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_img1 = $row['product_img1'];
            $product_price = $row['product_price'];
            // $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./Admin area/product_images/$product_img1' class='card-img-top' alt='$product_name'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_name</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='cp'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='cb'>View More</a>
                            </div>
                        </div>
                    </div>";
        }
    }
}



function view_details()
{
    global $con;
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_query = "Select * from `products` where product_id='$product_id'";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    $product_description = $row['product_description'];
                    $product_img1 = $row['product_img1'];
                    $product_img2 = $row['product_img2'];
                    $product_img3 = $row['product_img3'];
                    $product_price = $row['product_price'];
                    // $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./Admin area/product_images/$product_img1' class='card-img-top' alt='$product_name'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_name</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='cp'>Add to Cart</a>
                                <a href='index.php' class='cb'>Go Home</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class='col-md-8'>
                        <div class='row'>
                            <div class='col-md-12 m-2'>
                                <h4 class='text-center'>Related Images</h4>
                            </div>
                            <div class='col-md-6'>
                                <img src='./Admin area/product_images/$product_img2' class='card-img-top' alt='$product_name'>
                            </div>
                            <div class='col-md-6'>
                                <img src='./Admin area/product_images/$product_img3' class='card-img-top' alt='$product_name'>
                            </div>
                            <div class='col-md-12 p-2 mt-2' id='dis'>
                                <p class='text-center'>$product_description</p>
                            </div>
                        </div>
                    </div>";
                }
            }
        }
    }
}


function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "select * from `cart_details` where session_id='$get_ip_add' and product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script> alert('This item is alredy present in the Cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id,session_id,quantity) values ($get_product_id,'$get_ip_add',0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script> alert('Item is added to Cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "select * from `cart_details` where session_id='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "select * from `cart_details` where session_id='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}



function total_cart_price()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM `cart_details` WHERE session_id='$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
        $result_products = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo "$total_price";
}



// get user order details

function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "select * from `user_table` where username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders = "select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders_query = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if (isset($_GET['order_id'])) {
                        $order_id = $_GET['order_id'];
                    }
                    if ($row_count > 0) {
                        while ($row_query = mysqli_fetch_array($result_orders_query)) {
                            $order_status = $row_query['order_status'];

                            if ($order_status == 'pending') {
                                echo "<h3 class='text-center my-4'>You have <span class='text-danger'>$row_count</span> pending orders!</h3>";
                                echo "<p class='text-center'><button class='cp'><a href='confirm_payment.php?order_id=" . $row_query['order_id'] . "'>Confirm payment</a></button></p>";
                                break;
                            }
                        }
                    } else {
                        echo "<h3 class='text-center my-4'>You have zero orders!</h3>";
                        echo "<p class='text-center'><button class='cp'><a href='../index.php'>Explore products</a></button></p>";
                    }
                }
            }
        }
    }
}
