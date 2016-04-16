<html>
<head>
	<link rel="stylesheet" href="style-admin.css" />
</head>
<title>Administrator Page</title>
<body>
<?php
session_start();
if($_SESSION['admin']) {
}
else{ header("location:index.php"); }
?>
	<img src="images/header.jpg"/><br/><Br/>
		<div class="header">
			<div class="tab1">
				<div class="tab2"><a href="admin.php">Home</a></div>
				<div class="tab2"><a href="itemname.php">Item Name</a></div>
				<div class="tab2"><a href="stockquantity.php">Stock Quantity</a></div>
				<div class="tab2"><a href="search.php">Search</a></div>
				<div class="tab2"><a href="report.php">Report</a></div>
				<div class="tab2"><a href="clients.php">Clients</a></div>
				<div class="tab2"><a href="supplier.php">Supplier</a></div>
				<div class="tab2"><a href="logout.php">Logout</a></div>
			</div>
		</div>

		<div id="container">
			<div id="upper-tab">
				<div id="crud-item">
					<div class="tab-cont">Add an Item</div>
					<div class="tab-cont"><a href="clients.php">Back to Clients</a></div>
				</div>
			</div>
			<div id="item-names">
				<form action="add_client.php" METHOD="POST">
					<div id="form-supplier">
						<p>Username: *<br/> <input type="text" name="username" required/>
						<p>Password: *<br/> <input type="password" name="password" required/>
						<p>Confirm Password: *<br/> <input type="password" name="cpassword" required/>
						<p>Client Name: *<br/> <input type="text" name="cname" placeholder="Last Name, Firstname Middle Name" required/>
						<p>Location: *<br/><input type="text" name="branch" placeholder="Branch Name" required/>
						<p>Phone Number: *<br/> <input type="text" name="phone" placeholder="Ex. 911" required/>
						<p>Email: *<br/> <input type="email" name="email" placeholder="email@domain.com" required/>
						<br/><br/><input type="submit" value="Register"/>
					</div>
				</form>
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						include 'config.php';
						$username = mysql_real_escape_string($_POST['username']);
						$password = mysql_real_escape_string($_POST['password']);
						$cpassword = mysql_real_escape_string($_POST['cpassword']);
						$cname = mysql_real_escape_string($_POST['cname']);
						$branch = mysql_real_escape_string($_POST['branch']);
						$phone = mysql_real_escape_string($_POST['phone']);
						$email = mysql_real_escape_string($_POST['email']);
						$boo = true;

						$query = mysql_query("Select * from clients");
						while($row = mysql_fetch_assoc($query))
						{
							$user = $row['username'];
							if($user == $username)
							{
								$boo = false;
								Print '<script>alert("Username already taken!");</script>';
								Print '<script>window.location.assign("add_client.php");</script>';
							}
						}
						if ($boo) {
							if($password != $cpassword)
							{
								Print '<script>alert("Your passwords dont match!");</script>';
								Print '<script>window.location.assign("add_client.php");</script>';
							}
							else
							{
								 mysql_query("INSERT INTO  `clients` VALUES('','$username','$password','$cname','$branch','$phone','$email')");
								$lo = "$username"."_history";
								$que = mysql_query("CREATE TABLE $lo (`client_name` varchar(50), `location` varchar(50), `prod_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `dept` varchar(50), `prod_name` varchar(50), `price` float, `quantity` int, `lead_time` varchar(50), `terms` varchar(50))")or die(mysql_error());
								$lo = "$username"."_pending";
								$que = mysql_query("CREATE TABLE $lo (`client_name` varchar(50), `location` varchar(50), `prod_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `dept` varchar(50), `prod_name` varchar(50), `price` float, `quantity` int, `status` varchar(50))")or die(mysql_error());
								if(!empty($que)){
									Print '<script>alert("Record Successfully Registered!");</script>';
								}else{
									Print '<script>alert("Record did not inserted!");</script>';
								}
							}
						}

					}
				?>
				</table>
			</div>
		</div>
</body>
</html>