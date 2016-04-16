<html>
<head>
	<link rel="stylesheet" href="style-admin.css" />
	<script type="text/javascript" src="ajax.js"></script>
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
					<div class="tab-cont"><a href="itemname.php">Back to Items</a></div>
				</div>
			</div>
			<div id="item-names">
				<form action="additem.php" METHOD="POST">
					<div id="form-supplier">
						<p>Item Name:<br/> <input type="text" name="name"/>
						<p>Description: <br/><input type="text" name="desc"/>
						<p>Unit:<br/> 
						<select name="unit">
							<option>Boxes</option>
							<option>Pieces</option>
						</select>
						<p>Unit Price<br/> <input type="text" name="up"/>
						<p>Selling Price: <br/><input type="text" name="sp"/>
						<p>Quantity:<br/> <input type="text" name="quantity"/>
						<p>Supplier: <br/>
						<select name="supplier" onchange="showUser(this.value)">
						<?php
							include 'config.php';
							//Print '<optgroup label="Suppliers"></option>';
							Print "<option disabled selected>Select Supplier</option>";
							$query = mysql_query("select * from supplier");
							while($row = mysql_fetch_assoc($query)){
								$temp = $row['name'];
								Print '<option value="'.$temp.'">'.$temp.'</option>';
							}
						?>
						</select>
						<div id="txtHint"></div>
						<br/>
						<p>Active: <input type="radio" name="damage"/> Inactive: <input type="radio" name="damage"/> 
						<p>Number of Damaged:<br/> <input type="number" name="numdam"/>
						<br/><br/><input type="submit" value="Submit"/>
					</div>
				</form>
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						include 'config.php';
						$name = mysql_real_escape_string($_POST['name']);
						$desc = mysql_real_escape_string($_POST['desc']);
						$unit = mysql_real_escape_string($_POST['unit']);
						$up = mysql_real_escape_string($_POST['up']);
						$sp = mysql_real_escape_string($_POST['sp']);
						$quantity = mysql_real_escape_string($_POST['quantity']);
						$supplier = mysql_real_escape_string($_POST['supplier']);
						$damage = mysql_real_escape_string($_POST['damage']);
						$numdam = mysql_real_escape_string($_POST['numdam']);
						$category = mysql_real_escape_string($_POST['category']);
						$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
						$today2 = date("Y/m/d", $today);

						$lo = mysql_query("INSERT INTO  items (`itemname` ,`desc` ,`unit` ,`category` ,`unitprice` ,`sellingprice` ,`quantity` ,`supplier` ,`damaged` ,`numberofdamaged`,`date_recieved`) VALUES('$name','$desc','$unit','$category','$up','$sp','$quantity','$supplier','$damage','$numdam','$today2')");
						if(!empty($lo)){
							Print '<script>alert("Record Successfully Registered!");</script>';
						}else{
							Print "No insert";
						}

					}
				?>
				</table>
			</div>
		</div>
</body>
</html>