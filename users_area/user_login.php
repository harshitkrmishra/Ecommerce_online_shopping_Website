<?php
include("../includes/connect.php");
include("../functions/common_function.php");
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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

        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }

        .form .input {
            width: 500px;
        }
    </style>
</head>

<body>
    <div class="container-fluid m-3 ">
        <h2 class="text-center">
            User Login
        </h2>
        <div class="form">
            <div class="row ">
                <div class="col-lg-12 col-xl-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-outline mb-4">
                            <label for="user_username" class="form-label"> Username</label>
                            <input type="text" id="user_username" class="input form-control" placeholder="Enter your Username" autocomplete="off" required="required" name="user_username">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="user_password" class="form-label"> Password</label>
                            <input type="password" id="user_password" class="input form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                        </div>
                        <div class="text center">
                            <input type="submit" value="Login" class="cp" name="user_login">
                            <p class="small fw-bold mt-2 pt-1">Don't have an account ?<a href="user_registration.php" class="text-danger"> Register</a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "Select * from `user_table` where username='$user_username'";
    $result = mysqli_query($con, $select_query);
    if (!$result) {
        echo "Query execution failed: " . mysqli_error($con);
        exit;
    }

    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();


    // cart item
    $select_query_cart = "Select * from `cart_details` where session_id= '$user_ip' ";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);


    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            // echo "<script>alert('Login Successful')</script>"; 
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Password')</script>";
        }
    } else {
        echo "<script>alert('Invalid Password')</script>";
    }
}
?>