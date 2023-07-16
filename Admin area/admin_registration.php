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
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow-y: hidden;
        }
        .cp{
            width: 80%;
            height: 80%;
        }
        #imgg{
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
        <h2 class="text-center mb-5">Admin Registration</h2>
    </div>
    <div class="container">
  <div class="row">
    <div class="col-md-6">
      <img src="..//img/admin_login/img1.jpg" alt="" class="cp">
    </div>
    <div class="col-md-6">
    <form method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username">
        </div>
        <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" placeholder="Enter your Email" name="email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Enter your Password" name="password">
        </div>
        <div class="mb-3">
          <label for="confirm_password" class="form-label">Confirm password</label>
          <input type="password" class="form-control" id="confirm_password" placeholder="Enter your Confirm  Password" name="confirm_password">
        </div>
        <input type="submit" class="btn" name="admin_registration" value="Register">
        <p class="small fw-bold mt-2 pt-1">click here to <a href="admin_login.php">Login</a></p>
      </form>
    </div>
  </div>
</div>

</html>

<?php
if (isset($_POST['admin_registration'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];



    // select query
    $select_query = "select * from `admin_table` where admin_name='$username' or admin_email='$email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('The username or email address you entered is already in use. Please choose a different one.')</script>";
    } else if ($password != $confirm_password) {
        echo "<script>alert('The passwords entered do not match. Please try again.')</script>";
    }else{
        $insert_query = "insert into `admin_table` (admin_name,admin_email,admin_password) values ('$username','$email','$hash_password')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('Data inserted successfully')</script>";
        } else {
            die(mysqli_connect_error());
        }
    }
}
?>