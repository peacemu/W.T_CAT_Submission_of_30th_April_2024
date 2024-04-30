<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Form</title>
<style>
    body {
    font-family: Arial, sans-serif;
}

h2 {
    text-align: center;
    color: #fff;
}

form {
    max-width: 400px;
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="email"],
input[type="password"],
select,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
</style>
</head>
<body style="background-image: url('myImages/milk.jpg'); background-repeat: no-repeat;">

<h2>User Form</h2>

<form action="insert_user.php" method="POST" enctype="multipart/form-data">
  <label for="names">Names:</label><br>
  <input type="text" id="names" name="names" required><br><br>
  
  <label for="address">Address:</label><br>
  <input type="text" id="address" name="address" required><br><br>
  
  <label for="age">Age:</label><br>
  <input type="number" id="age" name="age" required><br><br>
  
  <label for="gender">Gender:</label><br>
  <input type="text" id="gender" name="gender" required><br><br>
  
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br><br>
  
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br><br>
  
  <label for="role">Role:</label><br>
  <select id="role" name="role" required>
    <option value="admin">Admin</option>
    <option value="distributer">Distributer</option>
  </select><br><br>
  
  <label for="image">Image:</label><br>
  <input type="file" id="image" name="image" accept="image/*" required><br><br>
  
  <button type="submit">Submit</button>
</form>

</body>
</html>
