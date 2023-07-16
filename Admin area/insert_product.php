<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_name=$_POST['product_name'];
    $product_Description=$_POST['product_Description'];
    $product_keyword=$_POST['product_keyword'];
    $product_Category=$_POST['product_Category'];
    $product_Brands=$_POST['product_Brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';


    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];


    // Accessing temporary name of the temp
    $temp_image1=$_FILES['product_img1']['tmp_name'];
    $temp_image2=$_FILES['product_img2']['tmp_name'];
    $temp_image3=$_FILES['product_img3']['tmp_name'];


    if($product_name=='' or $product_Description=='' or $product_keyword=='' or $product_Category=='' or $product_Brands=='' or $product_price=='' or $product_img1=='' or $product_img2=='' or $product_img3==''){
        echo "<script> alert('Please fill all the avaliable fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_img1");
        move_uploaded_file($temp_image2,"./product_images/$product_img2");
        move_uploaded_file($temp_image3,"./product_images/$product_img3");


        $insert_products="insert into `products` (product_name,product_description,product_keywords,category_id,brand_id,product_img1,product_img2,product_img3,product_price,date,status) values('$product_name','$product_Description','$product_keyword','$product_Category','$product_Brands','$product_img1','$product_img2','$product_img3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script> alert('Successfully inserted the products')</script>";
        }
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        .cp {
            background-color: #50eb8b;
            border: none;
            padding: 8px;
            border-radius: 5px;
        }
    </style>
</head>

<body id="ip_body">
    <h1 class="text-center m-2">Insert Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- title-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_name" class="form-label">Product
                title</label>
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_Description" class="form-label">Product
                Description</label>
            <input type="text" name="product_Description" id="product_Description" class="form-control" placeholder="Enter product Description" autocomplete="off" required="required">
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keyword" class="form-label">Product
                keyword</label>
            <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keyword" autocomplete="off" required="required">
        </div>


        <!-- <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_Category" id="" class="form-select">
                <option value="">Select a Category</option>
                <?php
                $select_categories = "Select * from `categories`";
                $result_categories = mysqli_query($con, $select_categories);
                while ($row_data = mysqli_fetch_assoc($result_categories)) {
                    $category_name = $row_data['category_name'];
                    $category_id = $row_data['category_id'];
                    echo "<option value='$category_id'>$category_name</option>";
                }
                ?>
            </select>
        </div> -->


        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_Brands" id="" class="form-select">
                <option value="">Select a Brands</option>
                <?php
                $select_brands = "Select * from `brands`";
                $result_brands = mysqli_query($con, $select_brands);
                while ($row_data = mysqli_fetch_assoc($result_brands)) {
                    $brand_name = $row_data['brand_name'];
                    $brand_id = $row_data['brand_id'];
                    echo "<option value='$brand_id'>$brand_name</option>";
                }
                ?>
            </select>
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_img1" class="form-label">Product
                image 1</label>
            <input type="file" name="product_img1" id="product_img1" class="form-control" required="required">
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_img2" class="form-label">Product
                image 2</label>
            <input type="file" name="product_img2" id="product_img2" class="form-control" required="required">
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_img3" class="form-label">Product
                image 3</label>
            <input type="file" name="product_img3" id="product_img3" class="form-control" required="required">
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product
                Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product Price" autocomplete="off" required="required">
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <input type="Submit" name="insert_product" class="cp" value="Insert Products" id="btn1">
            <!-- <input type="Submit" name="home" class="cp" value="Home" id="btn1"> -->
            
            
        </div>
        
    </form>

</body>

</html>