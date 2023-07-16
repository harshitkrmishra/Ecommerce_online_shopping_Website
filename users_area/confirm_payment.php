<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "Select * from `user_orders` where order_id=$order_id";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if (isset($_POST['Confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "insert into `user_payments` (order_id,invoice_number,amount,payment_mode) values($order_id,$invoice_number,$amount,'$payment_mode')";
    $result = mysqli_query($con, $insert_query);
    if ($result) {
        echo "<script> alert('Payment Completed')</script>";
        echo "<script>window.open( 'bill.php','_self' )</script> ";     
    }
    $update_orders = "update `user_orders` set order_status='Complete' where order_id=$order_id";
    $result_orders = mysqli_query($con, $update_orders);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Offline</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            background-color: #cfffe1;
        }

        #t {
            margin-left: 150px;
            margin-bottom: 10px;
        }

        #b {
            background-color: #50eb8b;
            border: none;
            padding: 8px;
            border-radius: 5px;
            margin-left: 150px;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center text-dark">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 w-50 m-auto">
                <label for="" class="text-dark " id="t">Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number; ?>">
            </div>
            <div class=" form-outline my-4 w-50 m-auto">
                <label for="" class="text-dark " id="t">Amount</label>
                <input type=" text" class=" form-control w-50 m-auto" name="amount" value="<?php echo $amount_due; ?>">
            </div>
            <div class=" form-outline my-4 w-50 m-auto">
                <label for="" class="text-dark " id="t">Payment Method</label>
                <select name="payment_mode" id="" class="form-select w-50 m-auto">
                    <option>Select payment mode</option>
                    <option>COD</option>
                </select>
            </div>
            <div class=" form-outline my-4 w-50 m-auto">
                <input type="submit" id="b" value="Confirm" name="Confirm_payment">
            </div>
</body>

</html>