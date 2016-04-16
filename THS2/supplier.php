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
if(!empty($_GET['category'])){
	$cat = $_GET['category'];
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
					<div class="tab-cont"><a href="addsupplier.php">Add Supplier</a></div>
					<div class="tab-cont"><?php if(!empty($_GET['category'])){
						Print '<a href="supplier.php">International</a>';}
						else{ Print '<span>International</span>';} 
						?>
					</div>
					<div class="tab-cont">
						<?php if(!empty($_GET['category'])){
							Print '<span>Local</span>'; }
							else{ Print '<a href="supplier.php?category=local">Local</a>';} 
						?></div>
				</div>
			</div>
			<div id="item-names">
				<table BORDER="2"    WIDTH="100%"   CELLPADDING="4" CELLSPACING="3">
				<TR>
					<TH>ID</TH>
					<TH>Name</TH>
					<TH>Location</TH>
					<TH>Company Name</TH>
					<TH>Company Number</TH>
					<TH>Supplier Contact Number</TH>
					<TH>Person to contact incase of emergency</TH>
					<TH>Emergency Person's number</TH>
					<TH>Primary Line of Supply</TH>
					<!--<TH>Purchase History</TH>-->
				</TR>

				<?php
					include 'config.php';
					if(isset($_GET['category'])){
						$inter = $_GET['category'];
						$query = mysql_query("Select * from supplier where inter='$inter'");
					}
					else
					{
						$query = mysql_query("Select * from supplier where inter='international'");
					}
					while($row = mysql_fetch_assoc($query)){
						Print "<TR>";
							Print '<TD ALIGN="Center">'.$row['id']."</TD>";
							Print '<TD ALIGN="Center">'.$row['name']."</TD>";
							Print '<TD ALIGN="Center">'.$row['address']."</TD>";
							Print '<TD ALIGN="Center">'.$row['contact']."</TD>";
							Print '<TD ALIGN="Center">'.$row['company_name']."</TD>";
							Print '<TD ALIGN="Center">'.$row['person_contact']."</TD>";
							Print '<TD ALIGN="Center">'.$row['person_contact2']."</TD>";
							Print '<TD ALIGN="Center">'.$row['another_num']."</TD>";
							Print '<TD ALIGN="Center"><a href="plos.php?token=sdcfw0sd98f7sd098f7crs09d8f70d9g8v7f98j7bgh987b0gh98k7n0gh987f0d986wq976349320ksytsdcfw0sd98f7sd098f7crs09d8f70d9g8v7f98j7bgh987b0gh98k7n0gh987f0d986wq976349320ksyt&id='.$row['name'].'">Primary Line of Supply</a></TD>';
							//Print '<TD ALIGN="Center"><a href="supplierhistory.php?token=sdcfw0sd98f7sd098f7crs09d8f70d9g8v7f98j7bgh987b0gh98k7n0gh987f0d986wq976349320ksytsdcfw0sd98f7sd098f7crs09d8f70d9g8v7f98j7bgh987b0gh98k7n0gh987f0d986wq976349320ksyt&id='.$row['name'].'">Purchase History</a></TD>';
						Print "</TR>";
					}
				?>
				</table>
			</div>
		</div>
</body>
</html>