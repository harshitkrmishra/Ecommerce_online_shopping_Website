<?php
if(isset($_GET['delete_order'])){
    $delete_order=$_GET['delete_order'];
    // echo $delete_brand;

    $delete_query="Delete from `user_orders` where order_id=$delete_order";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo  "<script>alert('Order has been Deleted Successfully ')</script>"; 
        echo  "<script>window.open('./index.php?list_orders','_self')</script>"; 
    }
}
?>