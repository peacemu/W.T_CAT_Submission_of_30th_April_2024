<?php 
include_once("./connection/connection.php");

if (isset($_GET['table']) && isset($_GET['id']) && !isset($_GET['status'])) {
    $table = $_GET['table'];

    if ($table == 'products') {
        $id = $_GET['id'];
        $sql = "DELETE FROM products WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=products&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else if ($table == 'students') {
        $id = $_GET['id'];
        $sql = "DELETE FROM students WHERE id =$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=students&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    } else if ($table == 'employees') {
        $id = $_GET['id'];
        $sql = "DELETE FROM employees WHERE id =$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=employees&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    } else if ($table == 'clients') {
        $id = $_GET['id'];
        $sql = "DELETE FROM clients WHERE id =$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=clients&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    } else if ($table == 'orders') {
        $id = $_GET['id'];
        $sql = "DELETE FROM orders WHERE id =$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=orders&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    }
} else if (isset($_GET['status'])) {
    $table = $_GET['table'];
    $status = $_GET['status'];
   
    if ($status == 'block') {
        if ($table == 'customer') {
            $id = $_GET['id'];
            $sql = "UPDATE customer SET status='non_active' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page with a success message
                header('location:./?page=customers');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else if ($table == 'employees') {
            $id = $_GET['id'];
            $sql = "UPDATE employees SET status='non_active' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page with a success message
                header('location:./?page=employees');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        if ($table == 'customer') {
            $id = $_GET['id'];
            $sql = "UPDATE customer SET status='active' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page with a success message
                header('location:./?page=customers');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else if ($table == 'employees') {
            $id = $_GET['id'];
            $sql = "UPDATE employees SET status='active' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page with a success message
                header('location:./?page=employees');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
} else {
    // Do nothing
}
?>
