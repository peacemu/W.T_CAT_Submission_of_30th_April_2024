<?php include_once("./connection/connection.php");
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
}  include_once('pageSection/card.php');?><main>
            
            <div class="page-header">
                <h1>you are welcome  <?php echo $_SESSION['role']; ?></h1>
                <small>Home / Dashboard</small>
            </div>
            
            <div class="page-content">
            
                <div class="analytics">
<?php 
     $users = "SELECT COUNT(*) AS users FROM users";
    $users = $conn->query($users);
    $users = $users->fetch_assoc();
    $users = $users['users'];

    $clients = "SELECT COUNT(*) AS clients FROM users";
    $clients = $conn->query($clients);
    $clients = $clients->fetch_assoc();
    $clients = $clients['clients'];

    generateCard($users, 'All users');
    generateCard($clients, 'All Clients');



?>
                   
 
 

                </div>


                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                             
                            <button>All products</button>
                        </div>

                      
                    </div>

                    <div>
                    <table width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th><span class="las la-sort"></span> Product Name</th>
                <th><span class="las la-sort"></span> Boxes</th>
                <th><span class="las la-sort"></span> Amount</th>
                <th><span class="las la-sort"></span> Image</th>
                <th><span class="las la-sort"></span> Date Added</th>
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
                    echo "<td><div class='client-img bg-img' style='background-image: url(".validate_image($row["image"]).")'></div></td>";
                    echo "<td>".$row["date_added"]."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
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
    .client-img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-size: cover;
        background-position: center;
    }
</style>
                    </div>

                </div>
            
            </div>
            
        </main>
        