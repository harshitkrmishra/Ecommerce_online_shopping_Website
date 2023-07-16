<?php
include('../includes/connect.php');

// Get payment details from database
$sql = "SELECT * FROM `user_payments`";
$result = mysqli_query($con, $sql);

// Check if the query was successful
if ($result) {
    // Generate bill HTML
    $bill_html = '<!DOCTYPE html><html><head><title>Payment Bill</title>';
    $bill_html .= '<style>
        body {
            background-color: #edf6f2;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ccc;
        }
        button {
            display: block;
            background-color: #50eb8b;
            color: #black;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin: 0 auto;
            margin-bottom: 20px;
        }
        button:hover {
            background-color: #40c77a;
        }
        a{
            text-decoration: none;
            
        }
        #a{
            margin: 50px;
        }
    </style>';
    $bill_html .= '</head><body>';
    $bill_html .= '<h1>Payment Bill</h1>';
    $bill_html .= '<div id="a"><table><tr><th>Order ID</th><th>Invoice Number</th><th>Amount</th><th>Payment Mode</th><th>Date</th></tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $bill_html .= '<tr><td>' . $row['order_id'] . '</td><td>' . $row['invoice_number'] . '</td><td>' . $row['amount'] . '</td><td>' . $row['payment_mode'] . '</td><td>' . $row['date'] . '</td></tr>';
    }

    $bill_html .= '</table>';
    $bill_html .= '<button onclick="window.print()">Print</button>';
    $bill_html .= '<a href="../index.php"><button>Go to Home</button></a>';
    $bill_html .= '</div></body></html>';

    echo $bill_html;
} else {
    echo "Error retrieving payment details from the database.";
}
