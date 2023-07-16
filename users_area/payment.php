<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            background-color: #edf6f2;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .payment {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }

        .cp {
            background-color: #50eb8b;
            border: none;
            padding: 8px;
            border-radius: 5px;
            margin-bottom: 0;
            width: 750px;
            height: 55px;
            font-weight: 600;
            cursor: pointer;
        }

        body a {
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            color: #000;
        }
        .payment{
            margin-left: 240px;
        }
    </style>
</head>

<body>
    
    <?php
    $user_ip = getIPAddress();
    $get_user = "Select * from `user_table` where user_ip='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];


    $get_orders_details = "select * from `user_orders` where user_id=$user_id";
    $result_orders = mysqli_query($con, $get_orders_details);
    $number = 1;
    while ($row_orders = mysqli_fetch_assoc($result_orders)) {
        $order_id = $row_orders['order_id'];
        $amount_due = $row_orders['amount_due'];
        $total_products = $row_orders['total_products'];
        $invoice_number = $row_orders['invoice_number'];
        $order_status = $row_orders['order_status'];
    }
    if (isset($_POST['confirm_payment'])) {
        $order_status = 'complete';
    } else {
        $order_status = 'pending';
    }
    ?>
    <a href="order.php?user_id=<?php echo $user_id; ?>"><button class="cp" name="confirm_payment"> Pay Offline </button></a>



    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
    <div class="payment mt-5 ml-5 " id="paypal-button-container"></div>
    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '88.56'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');

                });
            }


        }).render('#paypal-button-container');
    </script>
    </form>

</body>

</html>