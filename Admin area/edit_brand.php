<?php
if(isset($_GET['edit_brand'])){
    $edit_brand=$_GET['edit_brand'];
    // echo $edit_brand;

    $get_brands="select * from `brands` where brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_name=$row['brand_name'];
    
}
if(isset($_POST['edit_brand'])){
    $brand_name=$_POST['brand_name'];

    $update_query="update `brands` set brand_name='$brand_name' where brand_id=$edit_brand" ;
    $result_brand=mysqli_query($con,$update_query);
    if($result_brand){
        echo  "<script>alert('Brand has been  updated Successfully ')</script>"; 
        echo  "<script>window.open('./index.php?view_brands','_self')</script>"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Brands </title>
    <style>
        .cp {
            background-color: #90f0b5;
            text-decoration: none;
            border: none;
            padding: 5px;
            height: 40px;
            border-radius: 5px;
            margin: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">Edit Brand</h1>
        <form action="" method="post" class="text-center ">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="brand_name" class="form-label ">Brand Title</label>
                <input type="text" name="brand_name" id="brand_name" class="form-control" required="required" value="<?php  echo   $brand_name;  ?>">

            </div>
            <input type="submit" value="Update brand" class="cp" name="edit_brand">
        </form>
    </div>
</body>

</html>