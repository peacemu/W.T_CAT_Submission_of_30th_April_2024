<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $product_name = $_POST["product_name"];
    $boxes = $_POST["boxes"];
    $amount = $_POST["amount"];
    $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

    // Check if ID is provided for updating
    if ($_POST['product_id'] != 'Auto') {
        $id = $_POST['product_id'];
        // Update data in the products table
        $sql = "UPDATE products SET product_name='$product_name', boxes='$boxes', amount='$amount', image='$image' WHERE id=$id";
    } else {
        // Insert data into the products table
        $sql = "INSERT INTO products (product_name, boxes, amount, image) 
                VALUES ('$product_name', '$boxes', '$amount', '$image')";
    }

    if ($conn->query($sql) === TRUE) {
        if (!empty($_FILES['image']['tmp_name'])) {
            $target_dir = "myImages/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }
        // Redirect to the products page
        if ($_POST['product_id'] != 'Auto') {
            header('location:./?page=products&message=edit');
        } else {
            header('location:./?page=products&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
