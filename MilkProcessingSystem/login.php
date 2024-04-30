<?php session_start(); 

?>
<html>
    <header>
        <title>Test Login</title>
        <style>
            body {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    font-family: Arial, sans-serif;
}

header {
    text-align: center;
    margin-top: 50px;
    color: #fff;
}

.main {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    max-width: 400px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-actions {
    text-align: center;
}

.btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

.error-message {
    color: red;
    text-align: center;
    margin-top: 20px;
}

.register-link {
    text-align: center;
    margin-top: 10px;
}

.register-link a {
    color: #007bff;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}

        </style>
    </header>
    <body style="background-image: url('myImages/milk.jpg'); background-repeat: no-repeat;">
	<?php 
include("connection/connection.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['password']);
    $pass=md5($pass2);
    if($user == "" ||  $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.php'>Go back</a>";
    } else {
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$user' AND password='$pass'")
        or die("Could not execute the select query.");
        
        $row = mysqli_fetch_assoc($result);
        if(!empty($row)) {
            $validuser = $row['names'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['names'] = $row['names'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role']=$row['role'];
            $_SESSION['image']=$row['image'];
        } else {
            echo "<center>";
            echo "<h4 style='color:red;'>Invalid username or password.</h4>";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
            echo "</center>";
        }

        if(isset($_SESSION['valid'])) {
            header('Location: ./');          
        }
    }
} else {
?>
    <?php
}
?>

  
         <form class="form-login" method="post">
						<fieldset>
							<legend>
								Sign in to your account
							</legend>
							<p>
								Please enter your name and password to log in.<br />
								<span style="color:red;"><?php //echo $_SESSION['errmsg']; ?><?php //echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="username" placeholder="Username">
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="Password">
									<i class="fa fa-lock"></i>
									 </span>
									 <a href="register.php">
									Register
								</a>
                               
							</div>
							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>					
						</fieldset>
					</form>

     </body>
</html>