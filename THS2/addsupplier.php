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
					<div class="tab-cont">Add a Supplier</div>
				</div>
			</div>
			<div id="item-names">
				<form action="addsupplier.php" METHOD="POST">
					<div id="form-supplier">
						<p>Complete Name: *<br/> <input type="text" name="name" required/>
						<p>Address: *<br/><input type="text" name="address" required/>
						<p>Company Name: *<br/> <input type="text" name="company" required/>
						<p>Company's Contact Number: *<br/><input type="text" name="contact" required/>
						<p>Supplier Contact: *<br/> <input type="text" name="person" required/>
						<p>Person to contact incase of emergency: *<br/> <input type="text" name="person2" required/>
						<p>Emergency Person's contact number: *<br/> <input type="text" name="another_num" required/>
						<p>Supplier Type:  <select name="category">
												<option>International</option>
												<option>Local</option>
											</select>
						<br/><br/><input type="submit" value="Submit"/>
					</div>
				</form>
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						include 'config.php';

						$name = mysql_real_escape_string($_POST['name']);
						$address = mysql_real_escape_string($_POST['address']);
						$company = mysql_real_escape_string($_POST['company']);
						$contact = mysql_real_escape_string($_POST['contact']);	
						$person_con = mysql_real_escape_string($_POST['person']);
						$person_con2 = mysql_real_escape_string($_POST['person2']);
						$another_num = mysql_real_escape_string($_POST['another_num']);
						$category = mysql_real_escape_string($_POST['category']);
						$boo = true;
						$query = mysql_query("Select * from supplier");
						while($row = mysql_fetch_assoc($query)){
							$temp = $row['name'];
							if($temp == $name){
								Print '<script>alert("Name Already Taken!");</script>';
								Print '<script>window.location.assign("addsupplier.php");</script>';
								$boo = false;
								break;
							}
						}

						if($boo == true){
							$num1 = rand(1,11);
							$num2 = rand(1,11);
							$num3 = rand(1,11);
							$un = "$num1"."$num2"."$num3";
							$lo = mysql_query("INSERT INTO supplier (name, address, contact, company_name, person_contact, person_contact2, another_num, inter, supplier_id) VALUES('$name','$address','$contact','$company','$person_con','$person_con2','$another_num','$category', '$un')");
							$un = "$un"."_category";
							$create = mysql_query("CREATE TABLE $un (`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,`category` VARCHAR(50) NOT NULL, `code` VARCHAR(50) NOT NULL)")or die(mysql_error());
							if(!empty($create)){
								Print '<script>alert("Record Successfully Registered!");</script>';
							}else{
								Print "No insert";
							}
						}

					}
				?>
				</table>
			</div>
		</div>
</body>
</html>