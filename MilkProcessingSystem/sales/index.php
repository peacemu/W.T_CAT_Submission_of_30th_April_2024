<h1>Sales</h1>
<?php include_once("./connection/connection.php"); ?>

<?php 
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
        <h1> Sales</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Sales</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <a href="./?page=add_sale" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New Sale</span>
    </a>
</div>

<?php if(isset($_GET['message']) && ($_GET['message'] == 'edit' || $_GET['message'] == 'insert')): ?>
    <div id="successMessage" class="success-message">Record <?php echo $_GET['message']; ?>ed successfully!</div>
<?php elseif(isset($_GET['message']) && $_GET['message'] == 'delete'): ?>
    <div id="successMessage" class="success-message">Record deleted successfully!</div>
<?php endif; ?>

<!-- Loading image -->
<div id="loadingImage" class="loading-image">
    <img src="myImages/loading__.gif" alt="Loading...">
</div>

<div class="DataTable" style="display: none;">
    <div class="cardHeader">
        <h2>All Sales</h2>
        <a href="#" class="btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Cnt</td>
                <td>Distributor Names</td>
                <td>Distributor ID</td>
                <td>Date</td>
                <td>Product</td>
                <td>Amount</td>
                <td>Boxes</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
            <?php
            // Fetch data from the sales table
            $sql = "SELECT * FROM sales";
            $result = $conn->query($sql);
            $x = 0;

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $x++;
                    echo "<tr>";
                    echo "<td>".$x."</td>";
                    echo "<td>".$row["distributer_names"]."</td>";
                    echo "<td>".$row["distributer_id"]."</td>";
                    echo "<td>".$row["date_"]."</td>";
                    echo "<td>".$row["product_"]."</td>";
                    echo "<td>".$row["amount"]."</td>";
                    echo "<td>".$row["boxes"]."</td>";
                    echo "<td><a href='./?page=add_sale&id=".$row["id"]."'>Update</a> </td>"; // Action buttons
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No records found</td></tr>";
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

    .loading-image {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        display: block;
    }

    .loading-image img {
        width: 100px;
        height: 100px;
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Show loading image initially
    var loadingImage = document.getElementById('loadingImage');
    var dataTable = document.querySelector('.DataTable');

    setTimeout(function() {
        loadingImage.style.display = 'none';
        dataTable.style.display = 'block';
    }, 3000);
});
</script>
