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
		<div id="container" >
			<p>
			<img src="images/HOLLOW BLOCKS.jpg"/> 
			<img src="images/GRAVEL.jpg" height="160" width="150" />
			<img src="images/WIRES.jpg" height="160" width="150" />
			<img src="images/NAILS.jpg" height="160" width="150" />
			<img src="images/White SAND.jpg" height="160" width="150" />
			<img src="images/Ham.jpg" height="160" width="150" />
			<img src="images/wood.jpg" height="160" width="150" />
			</p>
			<p class="desc"> ABOUT THE COMPANY :</p>
				<p class="desc">	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; In the year 1997, Bright Orion was founded and established by Pepito and Charito Aquino. Bright Orion specializes in providing hardware and construction supplies to consumers such as wood, nails, electric supplies, and many more. Bright Orion, also known as Lucky Gaps, is a hardware store that is based in Antipolo, with 30 to 40 employees in all the branches. The company started with one small branch that soon evolved and diversified along Marcos Highway specifically in Maries Village, Penafrancia, Cogeo Gate 1, Bagong Nayon and Padilla.
		</div>
</body>
</html>