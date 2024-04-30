<?php 
include_once("./connection/connection.php");

function validate_image($file){
    $ex_file = explode("?",$file)[0];
    if(!empty($ex_file)){
        if(is_file('myImages/'.$ex_file)){
            return 'myImages/'.$file;
        } else {
            return 'myImages/noImage.png';
        }
    } else {
        return 'myImages/noImage.png';
    }
}
?>

<div class="page">
    <div class="left">
        <h1> Products</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Products</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <a href="./?page=add_product" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New Product</span>
    </a>
</div>

<div id="loader" class="loading-image">
    <img src="myImages/loading__.gif" alt="Loading...">
</div>

<?php if(isset($_GET['message']) && ($_GET['message'] == 'edit' || $_GET['message'] == 'insert')): ?>
    <div id="successMessage" class="success-message">Record <?php echo $_GET['message']; ?>ed successfully!</div>
<?php elseif(isset($_GET['message']) && $_GET['message'] == 'delete'): ?>
    <div id="successMessage" class="success-message">Record deleted successfully!</div>
<?php endif; ?>

<div class="DataTable" style="display: none;">
    <div class="cardHeader">
        <h2>All Products</h2>
        <a href="#" class="btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Cnt</td>
                <td>Name</td>
                <td>Boxes</td>
                <td>Amount</td>
                <td>Image</td>
                <td>Date Added</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
            <?php
            // Fetch data from the products table
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            $x = 0;

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $x++;
                    echo "<tr>";
                    echo "<td>".$x."</td>";
                    echo "<td>".$row["product_name"]."</td>";
                    echo "<td>".$row["boxes"]."</td>";
                    echo "<td>".$row["amount"]."</td>";
                    echo "<td><div class='image-container'><img src='".validate_image($row["image"])."' alt='Product Image'></div></td>";
                    echo "<td>".$row["date_added"]."</td>";
                    echo "<td><a href='./?page=add_product&id=".$row["id"]."'>Update</a> | <a href='delete.php?table=products&id=".$row["id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<style>
    .success-message {
        opacity: 1;
        background-color: lightgreen;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
    .image-container img {
        border-radius: 50%;
        width: 50px; /* Adjust size as needed */
        height: 50px; /* Adjust size as needed */
    }
    .loading-image {
        display: block;
    }
</style>

<script>
    // JavaScript to hide loader and show table after 3 seconds
    setTimeout(function() {
        var loader = document.getElementById('loader');
        var dataTable = document.querySelector('.DataTable');
        
        if (loader && dataTable) {
            loader.style.display = 'none';
            dataTable.style.display = 'block';
        }
    }, 3000);
</script>
