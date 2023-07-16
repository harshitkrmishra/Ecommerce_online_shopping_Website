<!-- <?php
include('../includes/connect.php');
if (isset($_POST['insert_cat'])) {
    $category_name = $_POST['cat_title'];

    $select_query = "Select * from `categories` where category_name='$category_name'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This category is present inside the database') </script>";
    } else {
        $insert_query = "insert into `categories` (category_name) values ('$category_name')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Category has been inserted successfully')</script>";
        }
    }
}
?>

<h3 class="text-center p-4">Insert Categories</h3>
<form action="" method="post" class="mb-2" id="insert">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control " name="cat_title" placeholder="Insert categories" aria-label="Insert categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class=" border-0 p-2 my-3" name="insert_cat" value="Insert" id="btn">
    </div>
</form> -->