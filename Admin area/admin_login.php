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
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow-y: hidden;
        }

        .cp {
            width: 80%;
            height: 80%;
        }

        #imgg {
            display: flex;
            align-items: center;

        }

        .btn {
            background-color: #50eb8b;
            border: none;
            padding: 8px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fulid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="..//img/admin_login/img2.jpg" alt="" class="cp">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="class w-100">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your Password" name="password">
                        </div>
                        <input type="submit" class="btn" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</html>

<?php
if (isset($_POST['admin_login'])) {
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];

    $select_query = "Select * from `admin_table` where admin_name= '$user_username' ";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();


    if($row_count > 0){
        
        if(password_verify($user_password,$row_data['admin_password'])){
            $_SESSION['username'] = $user_username;
            echo "<script>alert('Login Successful')</script>"; 
            echo "<script>window.open('index.php','_self')</script>"; 
        }else{
            echo "<script>alert('Invalid Password')</script>";
        }
    }else{
        echo "<script>alert('Invalid Username')</script>";
    }
}
?>
