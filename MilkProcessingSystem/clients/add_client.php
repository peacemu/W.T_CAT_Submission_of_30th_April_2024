<?php 
include_once("./connection/connection.php");

$client_id = "Auto";
$names = "";
$address = "";
$age = "";
$gender = "";
$email = "";
$password = "";
$role = "";

if(isset($_GET['id'])) {
    $client_id = $_GET['id'];
    $sql = "SELECT * FROM clients WHERE id = $client_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $names = $row['names'];
        $address = $row['address'];
        $age = $row['age'];
        $gender = $row['gender'];
        $email = $row['email'];
        $password = $row['password'];
        $role = $row['role'];
    }
}
?>

<style>
    .error-message {
        color: red;
    }
    .error-border {
        border: 1px solid red;
    }
</style>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Client' : 'Add New Client'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Clients</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Client' : 'Add New Client'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="clientForm" action="insert_client.php" method="POST">
        <div class="form-group">
            <label for="client_id">Client ID:</label>
            <input type="text" id="client_id" name="client_id" class="form-control" value="<?php echo $client_id; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="names">Names:</label>
            <input type="text" id="names" name="names" class="form-control" value="<?php echo $names; ?>">
            <div id="names_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" class="form-control" value="<?php echo $address; ?>">
            <div id="address_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" class="form-control" value="<?php echo $age; ?>">
            <div id="age_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" class="form-control">
                <option value="male" <?php if($gender == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if($gender == 'female') echo 'selected'; ?>>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>">
            <div id="email_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <div id="password_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <input type="text" id="role" name="role" class="form-control" value="<?php echo $role; ?>">
            <div id="role_error" class="error-message"></div>
        </div>
      
        <div class="form-group">
            <button type="submit" class="btn-submit">Submit</button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("clientForm").addEventListener("submit", function(event) {
        var names = document.getElementById("names");
        var address = document.getElementById("address");
        var age = document.getElementById("age");
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        var role = document.getElementById("role");
        var isValid = true;
        var image = document.getElementById("image");

        // Validation for names
        if (names.value.trim() === "") {
            document.getElementById("names_error").textContent = "Names is required";
            names.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("names_error").textContent = "";
            names.classList.remove("error-border");
        }

        // Validation for address
        if (address.value.trim() === "") {
            document.getElementById("address_error").textContent = "Address is required";
            address.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("address_error").textContent = "";
            address.classList.remove("error-border");
        }

        // Validation for age
        if (age.value.trim() === "") {
            document.getElementById("age_error").textContent = "Age is required";
            age.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("age_error").textContent = "";
            age.classList.remove("error-border");
        }

        // Validation for email
        if (email.value.trim() === "") {
            document.getElementById("email_error").textContent = "Email is required";
            email.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("email_error").textContent = "";
            email.classList.remove("error-border");
        }

        // Validation for password
        if (password.value.trim() === "") {
            document.getElementById("password_error").textContent = "Password is required";
            password.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("password_error").textContent = "";
            password.classList.remove("error-border");
        }

        // Validation for role
        if (role.value.trim() === "") {
            document.getElementById("role_error").textContent = "Role is required";
            role.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("role_error").textContent = "";
            role.classList.remove("error-border");
        }
      
        if (!isValid) {
            event.preventDefault();
            return false;
        }
    });
});
</script>
