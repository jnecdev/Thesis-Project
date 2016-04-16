<?php

include 'config.php';

$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);

session_start();

$query = mysql_query("Select * from admin");

while($row = mysql_fetch_assoc($query)){
	$temp = $row['username'];
	$temp2 = $row['password'];

	if($username == $temp && $password == $temp2){
		$_SESSION['admin'] = $username;
		 header("location: admin.php");
	}
}

include 'checklogin-client.php';

Print '<script>
var x = confirm("Your username or password is wrong! Kindly check your spelling");
if(x == true){
	window.location.assign("index.php");
}
else{
	window.location.assign("index.php");
}
</script>';


?>