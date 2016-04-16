<html>
<head>
	<link rel="stylesheet" href="style-admin.css" />
	<script type="text/javascript" src="form_validate.js"></script>
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
					<div class="tab-cont"><span>Update Information</span></div>
					<div class="tab-cont"><a href="clientportal.php">Back to Personal Information</a></div>
				</div>
			</div>
			<div id="item-names">
				<form name="myForm" action="updateinfo_client.php" onsubmit="return validateForm()" method="POST">
					<H2>Change Password</H2>
					<p><strong>Old Password</strong>:<br/> <input type="password" name="opassword"/></p>
					<p><strong>New Password</strong>:<br/> <input type="password" name="npassword"/></p>
					<p><strong>Confirm New Password</strong>:<br/> <input type="password" name="cpassword"/></p>
					<input type="submit" value="Update Information"/>
				</form>
				<?php	
					if($_SERVER['REQUEST_METHOD'] == "POST"){	
						include 'config.php';
						$username = $_SESSION['client'];
						$opass = mysql_real_escape_string($_POST['opassword']);
						$npass = mysql_real_escape_string($_POST['npassword']);

						$query = mysql_query("Select * from `clients` WHERE username='$username'");
						while($row = mysql_fetch_assoc($query)){
								$password = $row['password'];
						}

						if($password != $opass){
							Print '<script>alert("Your old password is incorrect!");</script>';
							Print '<script>window.location.assign("updateinfo_client.php");';
						}
						else{
							mysql_query("UPDATE clients SET password='$npass' WHERE username='$username'");
							Print '<script>alert("Record Successfully Updated!");</script>';
							Print '<script>window.location.assign("updateinfo_client.php");';
						}
					}
				?>
			</div>
		</div>
</body>
</html>