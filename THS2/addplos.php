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
if(!empty($_GET['id'])){
	$name = $_GET['id'];
	$_SESSION['tempname'] = $name;
}
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
					<div class="tab-cont">Add Category</div>
					<div class="tab-cont"><a href="plos.php?token=sdcfw0sd98f7sd098f7crs09d8f70d9g8v7f98j7bgh987b0gh98k7n0gh987f0d986wq976349320ksytsdcfw0sd98f7sd098f7crs09d8f70d9g8v7f98j7bgh987b0gh98k7n0gh987f0d986wq976349320ksyt&id=<?php $name = $_SESSION['tempname'];Print "$name";?>">Back to Primary Line of Supply</a></div>
				</div>
			</div>
			<div id="item-names">
				<form action="addplos.php" METHOD="POST">
					<div id="form-supplier">
						<p>Category: <br/> <input type="text" name="name" placeholder="Eg. Mens Accessories"/>
						<p>Category Code: <br/> <input type="text" name="code" placeholder="Eg. MA11"/>
						<br/><input type="submit" value="Submit"/>
					</div>
				</form>
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						include 'config.php';
						$name = mysql_real_escape_string($_POST['name']);
						$code = mysql_real_escape_string($_POST['code']);
						$ses = $_SESSION['supplier'];
						$query = mysql_query("Select * from supplier WHERE name='$ses'");
						while($row = mysql_fetch_assoc($query)){
							$un_id = $row['supplier_id'];
						}

						$usertable = "$un_id"."_"."$code";
						mysql_query("CREATE TABLE $usertable (`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,`category` varchar(50))");
						$usertable = "$un_id"."_category";
						$lo = mysql_query("INSERT INTO  $usertable (`category` ,`code`) VALUES('$name','$code')");
						if(!empty($lo)){
							Print '<script>alert("Record Successfully Registered!");</script>';
						}else{
							Print "No insert $usertable";
						}

					}
				?>
				</table>
			</div>
		</div>
</body>
</html>