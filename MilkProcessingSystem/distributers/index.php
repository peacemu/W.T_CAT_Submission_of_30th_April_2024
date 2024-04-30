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
        <h1> Clients</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Distributers</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <a href="./?page=add_client" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New Distributers</span>
    </a>
</div>

<?php if(isset($_GET['message']) && ($_GET['message'] == 'edit' || $_GET['message'] == 'insert')): ?>
    <div id="successMessage" class="success-message">Record <?php echo $_GET['message']; ?>ed successfully!</div>
<?php elseif(isset($_GET['message']) && $_GET['message'] == 'delete'): ?>
    <div id="successMessage" class="success-message">Record deleted successfully!</div>
<?php endif; ?>

<div class="loader" style="display: none;">
    <img src="myImages/loading__.gif" alt="Loading...">
</div>

<div class="DataTable" style="display: none;">
    <div class="cardHeader">
        <h2>All Distributers</h2>
        <a href="#" class="btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Cnt</td>
                <td>Name</td>
                <td>Address</td>
                <td>Age</td>
                <td>Gender</td>
                <td>Email</td>
            </tr>
        </thead>

        <tbody>
            <?php
            // Fetch data from the clients table
            $sql = "SELECT * FROM clients";
            $result = $conn->query($sql);
            $x = 0;

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $x++;
                    echo "<tr>";
                    echo "<td>".$x."</td>";
                    echo "<td>".$row["names"]."</td>";
                    echo "<td>".$row["address"]."</td>";
                    echo "<td>".$row["age"]."</td>";
                    echo "<td>".$row["gender"]."</td>";
                    echo "<td>".$row["email"]."</td>";
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
</style>

<script>
    // JavaScript to hide success message after 3 seconds and show the table after 3 seconds
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 1000);
        }
        var loader = document.querySelector('.loader');
        var table = document.querySelector('.DataTable');
        loader.style.display = 'none';
        table.style.display = 'block';
    }, 3000);
</script>
