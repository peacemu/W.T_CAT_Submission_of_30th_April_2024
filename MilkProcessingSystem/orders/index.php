<?php include_once("./connection/connection.php"); ?>

<div class="page">
    <div class="left">
        <h1> Orders</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Orders</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <a href="./?page=add_order" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New Order</span>
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
        <h2>All Orders</h2>
        <a href="#" class="btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Distributer Names</td>
                <td>Distributer ID</td>
                <td>Date</td>
                <td>Product</td>
                <td>Amount</td>
                <td>Confirm Status</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
            <?php
            // Fetch data from the orders table
            $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);
            $x = 0;

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $x++;
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["distributer_names"]."</td>";
                    echo "<td>".$row["distributer_id"]."</td>";
                    echo "<td>".$row["date_"]."</td>";
                    echo "<td>".$row["product_"]."</td>";
                    echo "<td>".$row["amount"]."</td>";
                    echo "<td>".$row["confirm_status"]."</td>";
                    echo "<td><a href='./?page=add_order&id=".$row["id"]."'>Update</a> | <a href='delete.php?table=orders&id=".$row["id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
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
    // Show loading image initially
    var loadingImage = document.getElementById('loadingImage');
    var dataTable = document.querySelector('.DataTable');

    setTimeout(function() {
        loadingImage.style.display = 'none';
        dataTable.style.display = 'block';
    }, 2000);
</script>
