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
	$_SESSION['supplier'] = $name;
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
					<div class="tab-cont"><span><?php $name = $_SESSION['supplier']; Print "$name" ?></span></div>
					<div class="tab-cont">
						<form action="plos.php?token=sdcfw0sd98f7sd098f7crs09d8f70d9g8v7f98j7bgh987b0gh98k7n0gh987f0d986wq976349320ksytsdcfw0sd98f7sd098f7crs09d8f70d9g8v7f98j7bgh987b0gh98k7n0gh987f0d986wq976349320ksyt" method="POST">
							<select name="sort">
							<?php
							include 'config.php';
							$ses = $_SESSION['supplier'];
							$query = mysql_query("Select * from supplier WHERE name='$ses'");
							while($row = mysql_fetch_assoc($query)){
								$un_id = $row['supplier_id'];
							}
							$usertable = "$un_id"."_category";
							$query = mysql_query("Select * from $usertable");
							while($row = mysql_fetch_assoc($query)){
								Print '<option>'.$row['category'].'</option>';
							}
							?>
							</select>
							<input type="submit" value="Sort"/>
							</form>
					</div>
					<div class="tab-cont"><a href="addplos.php?token=sdcfw0sd98f7sd098f7crs09d8f70d9g8v7f98j7bgh987b0gh98k7n0gh987f0d986wq976349320ksytsdcfw0sd98f7sd098f7crs09d8f70d9g8v7f98j7bgh987b0gh98k7n0gh987f0d986wq976349320ksyt&id=<?php Print "$name";?>">Add Category</a></div>
				</div>
			</div>
			<div id="item-names">
				<?php
				if($_SERVER['REQUEST_METHOD'] == "POST"){
						$sel = mysql_real_escape_string($_POST['sort']);
					Print '<h2 align="center">'.$sel.'</h2>';
				}
				?>
				<table BORDER="2"    WIDTH="100%"   CELLPADDING="4" CELLSPACING="3">
				<?php
					include 'config.php';
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						Print'
				<TR>
					<TH>ID Code</TH>
					<TH>Name</TH>
				</TR>';
						$sel = mysql_real_escape_string($_POST['sort']);
						$_SESSION['plositem'] = $sel;
						$ses = $_SESSION['supplier'];
						$query = mysql_query("Select * from items");

						/*while($row = mysql_fetch_assoc($query)){
							$un_id = $row['supplier_id'];
						}

						$usertable = "$un_id"."_"."category";
						$query = mysql_query("Select * from $usertable where category='$sel'");
						while($row = mysql_fetch_assoc($query))
						{
							$code = $row['code'];
						}

						$usertable = "$un_id"."_"."$code";
						$query = mysql_query("Select * from $usertable");*/
						while($row = mysql_fetch_assoc($query))
						{
							if(($row['supplier'] == $ses)&&($row['category'] == $sel)){
							Print "<TR>";
							Print '<TD ALIGN="Center">'.$row['itemcode']."</TD>";
							Print '<TD ALIGN="Center">'.$row['itemname']."</TD>";
							Print "</TR>";
							}
						}
					}
					else
					{
						Print "<h2>Select Category</h2>";
					}
					/*while($row = mysql_fetch_assoc($query)){
						Print "<TR>";
							Print '<TD ALIGN="Center">'.$row['code']."</TD>";
							Print '<TD ALIGN="Center">'.$row['category']."</TD>";
						Print "</TR>";
					}*/
				?>
				</table>
			</div>
		</div>
</body>
</html>