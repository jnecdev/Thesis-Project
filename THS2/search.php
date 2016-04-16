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
					<div class="tab-cont">
						 <form action="search.php" method="POST">
							<input type="text" name="search"/>
								<select name="category">
									<option>Item Code</option>
									<option>Item Name</option>
									<option>Unit</option>
									<option>Supplier</option>
									<option>Damaged</option>
									<option>Number of Damaged</option>
									<option>Total Quantity</option>
								</select>
						 	<input type="submit" value="Search"/>
						</form>
					</div>
				</div>
			</div>
			<div id="item-names">
				<table BORDER="2"    WIDTH="100%"   CELLPADDING="4" CELLSPACING="3">
				<TR>
					<TH>ItemCode</TH>
					<TH>ItemName</TH>
					<TH>Unit</TH>
					<TH>Current Quantity</TH>
					<TH>Supplier</TH>
					<TH>Damaged</TH>
					<TH>Number of Damaged</TH>
					<TH>Total Quantity</TH>
				</TR>

				<?php

				if($_SERVER['REQUEST_METHOD'] == "POST"){
					include 'config.php';

					$search = mysql_real_escape_string($_POST['search']);
					$category = mysql_real_escape_string($_POST['category']);

					if($category == "Item Code"){
						$query = mysql_query("Select * from items WHERE itemcode LIKE '%$search%'");
					}
					else if($category == "Item Name"){
						$query = mysql_query("Select * from items WHERE itemname LIKE '%$search%'");
					}
					else if($category == "Unit"){
						$query = mysql_query("Select * from items WHERE unit LIKE '%$search%'");
					}
					else if($category == "Supplier"){
						$query = mysql_query("Select * from items WHERE supplier LIKE '%$search%'");
					}
					else if($category == "Number of Damaged"){
						$query = mysql_query("Select * from items WHERE numberofdamaged LIKE '%$search%'");
					}
					else if($category == "Total Quantity"){
						$query = mysql_query("Select * from items WHERE quantity LIKE '%$search%'");
					}
					
					while($row = mysql_fetch_assoc($query)){
						Print "<TR>";
						$temp = $row['numberofdamaged'];
						$temp2 = $row['quantity'];
						$ans = $temp2 - $temp;
							$len = strlen($row['itemcode']);
						if($len == 1){
							Print '<TD Align = "Center">PP-00'.$row['itemcode'].'</TD>';
						}
						else if($len == 2){
							Print '<TD Align = "Center">PP-0'.$row['itemcode'].'</TD>';
						}
						else{
							Print '<TD Align = "Center">PP-'.$row['itemcode'].'</TD>';
						}
							Print '<TD Align = "Center">'.$row['itemname'].'</TD>';
							Print '<TD Align = "Center">'.$row['unit'].'</TD>';
							Print '<TD Align = "Center">'.$ans.'</TD>';
							Print '<TD Align = "Center">'.$row['supplier'].'</TD>';
							Print '<TD Align = "Center">'.$row['damaged'].'</TD>';
							Print '<TD Align = "Center">'.$row['numberofdamaged'].'</TD>';
							Print '<TD Align = "Center">'.$row['quantity'].'</TD>';
						Print "</TR>";
					}
				}
				?>
				</table>
			</div>
		</div>
</body>
</html>