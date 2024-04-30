<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $names = $_POST["names"];
    $address = $_POST["address"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : $_FILES['image']['name'];

    // Check if ID is provided for updating
    if ($_POST['client_id'] != 'Auto') {
        $id = $_POST['client_id'];
        // Update data in the clients table
        $sql = "UPDATE clients SET names='$names', address='$address', age='$age', gender='$gender', email='$email', password='$password', role='$role', image='$image' WHERE id=$id";
    } else {
        // Insert data into the clients table
        $sql = "INSERT INTO clients (names, address, age, gender, email, password, role, image) 
                VALUES ('$names', '$address', '$age', '$gender', '$email', '$password', '$role', '$image')";
    }

    if ($conn->query($sql) === TRUE) {
        if (!empty($_FILES['image']['tmp_name'])) {
            $target_dir = "myImages/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }
        // Redirect to the clients page
        if ($_POST['client_id'] != 'Auto') {
            header('location:./?page=clients&message=edit');
        } else {
            header('location:./?page=clients&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
