<?php
include "connection.php";

$order_id = $_POST["orderID"];
$product_name = $_POST["productName"];
$product_cost = $_POST["productCost"];
$loan_amount = $_POST["loanAmount"];
$date = date('Y-m-d');

if (empty($product_name)) {
    echo "Please enter the product name";
} else if (empty($loan_amount)) {
    echo "Please enter the loan amount";
} else if (!is_numeric($loan_amount)) {
    echo "Please enter a valid loan amount";
} else {
    $q = "INSERT INTO loan (loan_order_id, product_name, product_cost, loan_amount, order_date, order_status_id) 
          VALUES ('$order_id', '$product_name', '$product_cost', '$loan_amount', '$date', 1)";

    Database::iud($q);

    echo ("Success");
}
