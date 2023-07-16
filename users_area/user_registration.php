<?php
include("../includes/connect.php");
include("../functions/common_function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .cp {
            background-color: #90f0b5;
            text-decoration: none;
            border: none;
            padding: 10px;
            height: 40px;
            border-radius: 5px;

        }

        body {
            background-color: #edf6f2;
        }
        .form{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .form .input{
            width: 500px;
        }
    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">
            New User Registration
        </h2>
        <div class="form">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-12 ">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-outline mb-4">
                            <label for="user_username" class="input form-label"> Username</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter your Username" autocomplete="off" required="required" name="user_username">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="user_email" class="input form-label"> Email Id</label>
                            <input type="email" id="user_email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" name="user_email">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="user_image" class="input form-label"> User Image</label>
                            <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="user_password" class="input form-label"> Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="conf_user_password" class="input form-label"> Confirm Password</label>
                            <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required" name="conf_user_password">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="user_address" class="input form-label"> Address</label>
                            <input type="text" id="user_address" class="form-control" placeholder="Enter your Address" autocomplete="off" required="required" name="user_address">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="user_contact" class="input form-label"> Contact</label>
                            <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_contact">
                        </div>
                        <div class="text center">
                            <input type="submit" value="Register" class="cp" name="user_register">
                            <p class="small fw-bold mt-2 pt-1">Already have an account ?<a href="user_login.php" class="text-danger"> Login</a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();



    // select query
    $select_query = "select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('The username or email address you entered is already in use. Please choose a different one.')</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>alert('The passwords entered do not match. Please try again.')</script>";
    } else {
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact' )";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('Data inserted successfully')</script>";
        } else {
            die(mysqli_connect_error());
        }
    }

    $select_cart_items = "select* from `cart_details` where session_id='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if ($rows_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('you have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

?>