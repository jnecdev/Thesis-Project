<?php
$query = mysql_query("Select * from clients");

while($row = mysql_fetch_assoc($query)){
	$temp = $row['username'];
	$temp2 = $row['password'];

	if($username == $temp && $password == $temp2){
		$_SESSION['client'] = $username;
		 header("location: clientportal.php");
	}
}

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