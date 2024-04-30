<?php 
include_once("./connection/connection.php");

$sale_id = "Auto";
$distributer_names = "";
$distributer_id = "";
$date = "";
$product = "";
$amount = "";
$boxes = "";

if(isset($_GET['id'])) {
    $sale_id = $_GET['id'];
    $sql = "SELECT * FROM sales WHERE id = $sale_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $distributer_names = $row['distributer_names'];
        $distributer_id = $row['distributer_id'];
        $date = $row['date_'];
        $product = $row['product_'];
        $amount = $row['amount'];
        $boxes = $row['boxes'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Sale' : 'Add New Sale'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Sales</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Sale' : 'Add New Sale'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="saleForm" action="insert_sale.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="sale_id">Sale ID:</label>
            <input type="text" id="sale_id" name="sale_id" class="form-control" value="<?php echo $sale_id; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="distributer_names">Distributor Names:</label>
            <input type="text" id="distributer_names" name="distributer_names" class="form-control" value="<?php echo $distributer_names; ?>">
            <div id="distributer_names_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="distributer_id">Distributor ID:</label>
            <input type="text" id="distributer_id" name="distributer_id" class="form-control" value="<?php echo $distributer_id; ?>">
            <div id="distributer_id_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" class="form-control" value="<?php echo $date; ?>">
            <div id="date_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="product">Product:</label>
            <input type="text" id="product" name="product" class="form-control" value="<?php echo $product; ?>">
            <div id="product_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" class="form-control" value="<?php echo $amount; ?>">
            <div id="amount_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="boxes">Boxes:</label>
            <input type="number" id="boxes" name="boxes" class="form-control" value="<?php echo $boxes; ?>">
            <div id="boxes_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <button type="button" id="submitBtn" class="btn-submit">Submit</button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<div id="loader" class="loading-image" style="display: none;">
    <img src="myImages/loading.gif" alt="Loading...">
</div>

<style>
    .error-message {
        color: red;
    }
    .error-border {
        border: 1px solid red;
    }
    .loading-image {
        display: none;
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("submitBtn").addEventListener("click", function(event) {
        var isValid = true;
        var distributerNames = document.getElementById("distributer_names");
        var distributerId = document.getElementById("distributer_id");
        var date = document.getElementById("date");
        var product = document.getElementById("product");
        var amount = document.getElementById("amount");
        var boxes = document.getElementById("boxes");

        // Validation for Distributor Names
        if (distributerNames.value.trim() === "") {
            document.getElementById("distributer_names_error").textContent = "Distributor Names is required";
            distributerNames.classList.add("error-border");
            distributerNames.focus();
            isValid = false;
        } else {
            document.getElementById("distributer_names_error").textContent = "";
            distributerNames.classList.remove("error-border");
        }

        // Validation for Distributor ID
        if (distributerId.value.trim() === "") {
            document.getElementById("distributer_id_error").textContent = "Distributor ID is required";
            distributerId.classList.add("error-border");
            distributerId.focus();
            isValid = false;
        } else {
            document.getElementById("distributer_id_error").textContent = "";
            distributerId.classList.remove("error-border");
        }

        // Validation for Date
        if (date.value.trim() === "") {
            document.getElementById("date_error").textContent = "Date is required";
            date.classList.add("error-border");
            date.focus();
            isValid = false;
        } else {
            document.getElementById("date_error").textContent = "";
            date.classList.remove("error-border");
        }

        // Validation for Product
        if (product.value.trim() === "") {
            document.getElementById("product_error").textContent = "Product is required";
            product.classList.add("error-border");
            product.focus();
            isValid = false;
        } else {
            document.getElementById("product_error").textContent = "";
            product.classList.remove("error-border");
        }

        // Validation for Amount
        if (amount.value.trim() === "") {
            document.getElementById("amount_error").textContent = "Amount is required";
            amount.classList.add("error-border");
            amount.focus();
            isValid = false;
        } else {
            document.getElementById("amount_error").textContent = "";
            amount.classList.remove("error-border");
        }

        // Validation for Boxes
        if (boxes.value.trim() === "") {
            document.getElementById("boxes_error").textContent = "Boxes is required";
            boxes.classList.add("error-border");
            boxes.focus();
            isValid = false;
        } else {
            document.getElementById("boxes_error").textContent = "";
            boxes.classList.remove("error-border");
        }

        if (isValid) {
            // Show loading image
            document.getElementById("loader").style.display = "block";

            // Delay form submission for 3 seconds
            setTimeout(function() {
                // Submit the form
                document.getElementById("saleForm").submit();
            }, 3000);
        }
    });
});
</script>
