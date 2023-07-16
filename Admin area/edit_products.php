    <?php
    if (isset($_GET['edit_products'])) {
        $edit_id = $_GET['edit_products'];
        $get_data = "select * from `products` where product_id=$edit_id";
        $result = mysqli_query($con, $get_data);
        $row = mysqli_fetch_assoc($result);

        $product_name = $row['product_name'];
        
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_img1 = $row['product_img1'];
        $product_img2 = $row['product_img2'];
        $product_img3 = $row['product_img3'];
        $product_price = $row['product_price'];



        // fetching  cartegory
        $select_category = "select * from `categories` where category_id=$category_id";
        $result_category = mysqli_query($con, $select_category);
        $row_category = mysqli_fetch_assoc($result_category);
        $category_name = $row_category['category_name'];
        



        // fetching  brands
        $select_brand = "select * from `brands` where brand_id=$brand_id";
        $result_brand = mysqli_query($con, $select_brand);
        $row_brand = mysqli_fetch_assoc($result_brand);
        $brand_name = $row_brand['brand_name'];
        
    }
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .pimage {
                width: 80px;
                height: 80px;
                object-fit: contain;

            }

            #cp {
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
        <div class="container mt-4">
            <h2 class="text-center">
                Edit Product
            </h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outlie w-50 m-auto mb-3">
                    <label for="product_name" class="form-label">Product Title</label>
                    <input type="text" value="<?php echo $product_name; ?>" name="product_name" id="product_name" class="form-control" require="required">
                </div>
                <div class="form-outlie w-50 m-auto mb-3">
                    <label for="product_desc" class="form-label">Product Description</label>
                    <input type="text" value="<?php echo $product_description; ?>" name="product_desc" id="product_desc" class="form-control" require="required">
                </div>
                <div class="form-outlie w-50 m-auto mb-3">
                    <label for="product_keywords" class="form-label">Product Keywords</label>
                    <input type="text" value="<?php echo $product_keywords; ?>" name="product_keywords" id="product_keywords" class="form-control" require="required">
                </div>
                <div class="form-outlie w-50 m-auto mb-3">
                    <label for="product_category" class="form-label">Product Categories</label>
                    <select name="product_category" class="form-select">
                        <option value="<?php echo $category_name; ?>"><?php echo $category_name; ?></option>
                        <?php
                        $select_category_all = "select * from `categories`";
                        $result_category_all = mysqli_query($con, $select_category_all);
                        while ($row_category_all = mysqli_fetch_assoc($result_category_all)) {
                            $category_name = $row_category_all['category_name'];
                            $category_id = $row_category_all['category_id'];
                            echo "<option value='$category_id'>$category_name</option>";
                        }
                        ?>



                    </select>
                </div>
                <div class="form-outlie w-50 m-auto mb-3">
                    <label for="product_brands" class="form-label">Product Brands</label>
                    <select name="product_brands" class="form-select">
                        <option value="<?php echo $brand_name; ?>"><?php echo $brand_name; ?></option>
                        <?php
                        $select_brand_all = "select * from `brands`";
                        $result_brand_all = mysqli_query($con, $select_brand_all);
                        while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                            $brand_name = $row_brand_all['brand_name'];
                            $brand_id = $row_brand_all['brand_id'];
                            echo "<option value='$brand_id'>$brand_name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-outlie w-50 m-auto mb-3">
                    <label for="product_img1" class="form-label">Product Image1</label>
                    <div class="d-flex">
                        <input type="file" name="product_img1" id="product_img1" class="form-control w-90 m-auto " require="required">
                        <img src="../img/product_img/<?php echo $product_img1 ?>" alt="" class="pimage">
                    </div>
                </div>
                <div class="form-outlie w-50 m-auto mb-3">
                    <label for="product_img2" class="form-label">Product Image2</label>
                    <div class="d-flex">
                        <input type="file" name="product_img2" id="product_img2" class="form-control w-90 m-auto" require="required">
                        <img src="../img/product_img/<?php echo $product_img2 ?>" alt="" class="pimage">
                    </div>
                </div>
                <div class="form-outlie w-50 m-auto mb-3">
                    <label for="product_img3" class="form-label">Product Image3</label>
                    <div class="d-flex">
                        <input type="file" name="product_img3" id="product_img3" class="form-control w-90 m-auto" require="required">
                        <img src="../img/product_img/<?php echo $product_img3 ?>" alt="" class="pimage">
                    </div>
                </div>
                <div class="form-outlie w-50 m-auto mb-3">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" value="<?php echo $product_price; ?>" name="product_price" id="product_price" class="form-control" require="required">
                </div>
                <div class="w-50 m-auto">
                    <input type="submit" name="edit_product" id="cp" value="Update Product">
                </div>
                <div class="text-center mb-5">
                    <p> ....</p>
                </div>
            </form>
        </div>


        <?php
        if (isset($_POST['edit_product'])) {
            $product_name = $_POST['product_name'];
            $product_desc = $_POST['product_desc'];
            $product_keywords = $_POST['product_keywords'];
            $product_category = $_POST['product_category'];
            $product_brands = $_POST['product_brands'];
            $product_price = $_POST['product_price'];

            $product_img1 = $_FILES['product_img1']['name'];
            $product_img2 = $_FILES['product_img2']['name'];
            $product_img3 = $_FILES['product_img3']['name'];


            $temp_image1 = $_FILES['product_img1']['tmp_name'];
            $temp_image2 = $_FILES['product_img2']['tmp_name'];
            $temp_image3 = $_FILES['product_img3']['tmp_name'];


            if ($product_name=='' or  $product_desc=''  or  $product_keywords='' or $product_category=='' or $product_brands='' or $product_img1='' or $product_img2=='' or $product_img3=='' or $product_price=='') {
                echo "<script>alert('Fill are the fields')</script>"; 
            }else{
                move_uploaded_file($temp_image1, "./product_images/$product_img1");
                move_uploaded_file($temp_image2, "./product_images/$product_img2");
                move_uploaded_file($temp_image3, "./product_images/$product_img3");
            }

            $update_product = "update `products` set  product_name='$product_name',product_description='$product_desc',product_keywords='$product_keywords',category_id='$product_category',brand_id='$product_brands',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',date=NOW() where product_id=$edit_id ";
            $result_update=mysqli_query($con,$update_product);

            if($result_update){
                echo "<script>alert('Product updated Successfully')</script>"; 
                echo "<script>window.open('index.php','_self')</script>"; 
            }
        }

        ?>
    </body>

    </html>