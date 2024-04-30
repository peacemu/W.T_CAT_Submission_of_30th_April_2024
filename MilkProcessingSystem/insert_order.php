<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $distributer_names = $_POST["distributer_names"];
    $distributer_id = $_POST["distributer_id"];
    $date_ = $_POST["date_"];
    $product_ = $_POST["product_"];
    $amount = $_POST["amount"];
    $confirm_status = $_POST["confirm_status"];

    // Check if ID is provided for updating
    if ($_POST['order_id'] != 'Auto') {
        $id = $_POST['order_id'];
        // Update data in the orders table
        $sql = "UPDATE orders SET distributer_names='$distributer_names', distributer_id='$distributer_id', date_='$date_', product_='$product_', amount='$amount', confirm_status='$confirm_status' WHERE id=$id";
    } else {
        // Insert data into the orders table
        $sql = "INSERT INTO orders (distributer_names, distributer_id, date_, product_, amount, confirm_status) 
                VALUES ('$distributer_names', '$distributer_id', '$date_', '$product_', '$amount', '$confirm_status')";
    }

    if ($conn->query($sql) === TRUE) {
        // Redirect to the orders page
        if ($_POST['order_id'] != 'Auto') {
            header('location:./?page=orders&message=edit');
        } else {
            header('location:./?page=orders&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
