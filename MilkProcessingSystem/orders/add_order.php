<?php 
include_once("./connection/connection.php");

$order_id = "Auto";
$distributer_names = "";
$distributer_id = "";
$date_ = "";
$product_ = "";
$amount = "";
$confirm_status = "";

if(isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $sql = "SELECT * FROM orders WHERE id = $order_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $distributer_names = $row['distributer_names'];
        $distributer_id = $row['distributer_id'];
        $date_ = $row['date_'];
        $product_ = $row['product_'];
        $amount = $row['amount'];
        $confirm_status = $row['confirm_status'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Order' : 'Add New Order'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Orders</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Order' : 'Add New Order'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <!-- Loading image -->
    <div id="loadingImage" class="loading-image" style="display: none;">
        <img src="myImages/loading__.gif" alt="Loading...">
    </div>

    <form id="orderForm" action="insert_order.php" method="POST">
        <div class="form-group">
            <label for="order_id">Order ID:</label>
            <input type="text" id="order_id" name="order_id" class="form-control" value="<?php echo $order_id; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="distributer_names">Distributer Names:</label>
            <input type="text" id="distributer_names" name="distributer_names" class="form-control" value="<?php echo $distributer_names; ?>">
            <div id="distributer_names_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="distributer_id">Distributer ID:</label>
            <input type="text" id="distributer_id" name="distributer_id" class="form-control" value="<?php echo $distributer_id; ?>">
            <div id="distributer_id_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="date_">Date:</label>
            <input type="date" id="date_" name="date_" class="form-control" value="<?php echo $date_; ?>">
            <div id="date_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="product_">Product:</label>
            <input type="text" id="product_" name="product_" class="form-control" value="<?php echo $product_; ?>">
            <div id="product_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" class="form-control" value="<?php echo $amount; ?>">
            <div id="amount_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="confirm_status">Confirm Status:</label>
            <input type="text" id="confirm_status" name="confirm_status" class="form-control" value="<?php echo $confirm_status; ?>">
            <div id="confirm_status_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <button type="button" id="submitButton" class="btn-submit">Submit</button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<style>
    .error-message {
        color: red;
    }
    .error-border {
        border: 1px solid red;
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("submitButton").addEventListener("click", function(event) {
        var distributerNames = document.getElementById("distributer_names");
        var distributerId = document.getElementById("distributer_id");
        var date = document.getElementById("date_");
        var product = document.getElementById("product_");
        var amount = document.getElementById("amount");
        var confirmStatus = document.getElementById("confirm_status");
        var isValid = true;

        if (distributerNames.value.trim() === "") {
            document.getElementById("distributer_names_error").textContent = "Distributer Names is required";
            distributerNames.classList.add("error-border");
            distributerNames.focus();
            isValid = false;
        } else {
            document.getElementById("distributer_names_error").textContent = "";
            distributerNames.classList.remove("error-border");
        }

        if (distributerId.value.trim() === "") {
            document.getElementById("distributer_id_error").textContent = "Distributer ID is required";
            distributerId.classList.add("error-border");
            distributerId.focus();
            isValid = false;
        } else {
            document.getElementById("distributer_id_error").textContent = "";
            distributerId.classList.remove("error-border");
        }

        if (date.value.trim() === "") {
            document.getElementById("date_error").textContent = "Date is required";
            date.classList.add("error-border");
            date.focus();
            isValid = false;
        } else {
            document.getElementById("date_error").textContent = "";
            date.classList.remove("error-border");
        }

        if (product.value.trim() === "") {
            document.getElementById("product_error").textContent = "Product is required";
            product.classList.add("error-border");
            product.focus();
            isValid = false;
        } else {
            document.getElementById("product_error").textContent = "";
            product.classList.remove("error-border");
        }

        if (amount.value.trim() === "") {
            document.getElementById("amount_error").textContent = "Amount is required";
            amount.classList.add("error-border");
            amount.focus();
            isValid = false;
        } else {
            document.getElementById("amount_error").textContent = "";
            amount.classList.remove("error-border");
        }

        if (confirmStatus.value.trim() === "") {
            document.getElementById("confirm_status_error").textContent = "Confirm Status is required";
            confirmStatus.classList.add("error-border");
            confirmStatus.focus();
            isValid = false;
        } else {
            document.getElementById("confirm_status_error").textContent = "";
            confirmStatus.classList.remove("error-border");
        }

        if (!isValid) {
            event.preventDefault();
            return false;
        }

        // Show loading image
        var loadingImage = document.getElementById('loadingImage');
        loadingImage.style.display = 'block';
        // Hide the form
        document.getElementById('orderForm').style.display = 'none';

        // Wait for 3 seconds before submitting the form
        setTimeout(function() {
            document.getElementById('orderForm').submit();
        }, 3000);
    });
});
</script>
