
<?php

$databaseHost = 'localhost';
$databaseName = 'milkprocessing';
$databaseUsername = 'root';
$databasePassword = '';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

if($conn){
	echo "";
}else {
	 echo "error while c=getting cinnected";
}
?>