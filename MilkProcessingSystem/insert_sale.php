<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $distributer_names = $_POST["distributer_names"];
    $distributer_id = $_POST["distributer_id"];
    $date = $_POST["date"];
    $product = $_POST["product"];
    $amount = $_POST["amount"];
    $boxes = $_POST["boxes"];

    // Check if ID is provided for updating
    if ($_POST['sale_id'] != 'Auto') {
        $id = $_POST['sale_id'];
        // Update data in the sales table
        $sql = "UPDATE sales SET distributer_names='$distributer_names', distributer_id='$distributer_id', date_='$date', product_='$product', amount='$amount', boxes='$boxes' WHERE id=$id";
    } else {
        // Insert data into the sales table
        $sql = "INSERT INTO sales (distributer_names, distributer_id, date_, product_, amount, boxes) 
                VALUES ('$distributer_names', '$distributer_id', '$date', '$product', '$amount', '$boxes')";
            $sql2 = "INSERT INTO payment (distributer_names, distributer_id, amount) 
            VALUES ('$distributer_names', '$distributer_id', '$amount')";

    }

    if ($conn->query($sql) === TRUE) {
        // Redirect to the sales page
        if ($_POST['sale_id'] != 'Auto') {
            header('location:./?page=sales&message=edit');
        } else {
            if ($conn->query($sql2) === TRUE) {

            header('location:./?page=sales&message=insert');
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
