<html>
<head>
	<link rel="stylesheet" href="style-admin.css" />
</head>
<title>Administrator Page</title>
<body>
<?php
session_start();
if($_SESSION['client']) {
}
else{ header("location:index.php"); }
?>
	<img src="images/header.jpg"/><br/><Br/>
		<div class="header">
			<div class="tab1">
				<div class="tab2"><a href="clientportal.php">Home</a></div>
				<div class="tab2"><a href="order_summary.php">Order Summary</a></div>
				<div class="tab2"><a href="order_create.php">Create an Order</a></div>
				<div class="tab2"><a href="logout.php">Logout</a></div>
			</div>
		</div>

		<div id="container">
			<div id="upper-tab">
				<div id="crud-item">
					<div class="tab-cont"><span>Personal Information</span></div>
					<div class="tab-cont"><a href="updateinfo_client.php">Update Password</a></div>
				</div>
			</div>
			<div id="item-names">
				<?php		
					include 'config.php';
					$username = $_SESSION['client'];
					$query = mysql_query("Select * from `clients` WHERE username='$username'");
					while($row = mysql_fetch_assoc($query)){
						
							Print '<p><strong>Client Id</strong>: '.$row['client_id'].'</p>';
							Print '<p><strong>Username</strong>: '.$row['username'].'</p>';
							Print '<p><strong>Complete Name</strong>: '.$row['client_name'].'</p>';
							Print '<p><strong>Location</strong>: '.$row['branches'].'</p>';
							Print '<p><strong>Phone Number</strong>: '.$row['phone_number'].'</p>';
							Print '<p><strong>Email</strong>: '.$row['email'].'</p>';
						Print "</TR>";
					}
				?>
			</div>
		</div>
</body>
</html>