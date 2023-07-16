<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <style>
        body {
            background-color: #edf6f2;
        }
        #cz {  
            background-color: #50eb8b;
            border: none;
            padding: 8px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h3 class="text-danger m-4">
        Delete Account
    </h3>
    <form action="" method="post" >
        <div class="form-outline ">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account" id="cz">
        </div>
        
    </form>

<?php
$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="Delete from `user_table` where username='$username_session'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account Deleted Successfully')</script>"; 
        echo "<script>window.open('../index.php','_self')</script>"; 
    }
}

?>


</body>
</html>