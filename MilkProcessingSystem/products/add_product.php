<?php 
include_once("./connection/connection.php");

$product_id = "Auto";
$product_name = "";
$boxes = "";
$amount = "";
$image = "";
$date_added = "";

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_name = $row['product_name'];
        $boxes = $row['boxes'];
        $amount = $row['amount'];
        $image = $row['image'];
        $date_added = $row['date_added'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Product' : 'Add New Product'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Products</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Product' : 'Add New Product'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <div id="loader" class="loading-image" style="display: none;">
        <img src="myImages/loading__.gif" alt="Loading...">
    </div>

    <form id="productForm" action="insert_product.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="product_id">Product ID:</label>
            <input type="text" id="product_id" name="product_id" class="form-control" value="<?php echo $product_id; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" class="form-control" value="<?php echo $product_name; ?>">
        </div>
        <div class="form-group">
            <label for="boxes">Boxes:</label>
            <input type="number" id="boxes" name="boxes" class="form-control" value="<?php echo $boxes; ?>">
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" class="form-control" value="<?php echo $amount; ?>">
        </div>
        <div class="form-group">
            <label for="image">Product Image:</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="form-group">
            <button type="button" id="submitButton" class="btn-submit">Submit</button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<style>
    .loading-image {
        display: block;
        text-align: center;
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("submitButton").addEventListener("click", function() {
        var loader = document.getElementById('loader');
        loader.style.display = 'block';
        setTimeout(function() {
            document.getElementById("productForm").submit();
        }, 3000);
    });
});
</script>
