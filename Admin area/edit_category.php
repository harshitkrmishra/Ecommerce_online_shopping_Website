<!-- <?php
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    // echo $edit_category;

    $get_categories="select * from `categories` where category_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_name=$row['category_name'];
    
}
if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_name'];

    $update_query="update `categories` set category_name='$cat_title' where category_id=$edit_category" ;
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo  "<script>alert('Category has been  updated Successfully ')</script>"; 
        echo  "<script>window.open('./index.php?view_categories','_self')</script>"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Categories </title>
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
        <h1 class="text-center">Edit Category</h1>
        <form action="" method="post" class="text-center ">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="category_name" class="form-label ">Category Title</label>
                <input type="text" name="category_name" id="category_name" class="form-control" required="required" value="<?php  echo   $category_name;  ?>">

            </div>
            <input type="submit" value="Update Category" class="cp" name="edit_cat">
        </form>
    </div>
</body>

</html> -->