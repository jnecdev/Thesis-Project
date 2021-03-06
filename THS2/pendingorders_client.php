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
$user = $_SESSION['client'];
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
					<div class="tab-cont"><a href="order_summary.php">Order History</a></div>
					<div class="tab-cont"><strong>Pending Orders</strong></div>
					<?php

					include 'config.php';

					$query = mysql_query("Select * FROM clients");
					$pages_query = mysql_num_rows($query);
					$pages = ceil($pages_query / 10);
					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					$start = ($page - 1) * 10;

					if($pages > 1)
					{

						$temp = 1;

						if($pages >= 6)
						{
							$temp = $page - 3;
									if($temp <= 0){
										$temp = 1;
									}
									if($page > 1){
										echo '<div class="tab-cont"><a href="?page='.$temp.'">Previous</a></div>';
									}
						}

						
						if($page > 3){
							for($x = $page; $x <= $pages; $x++)
							{
								Print '<div class="tab-cont">';
								echo ($x == $page) ? '<strong> '.$x.' </strong>' : '<a href="?page='.$x.'"> '.$x.' </a>';
								if($x == ($page + 4)){
									break;
									}
								Print '</div>';
							}
						}
						else{
							for($x = 1; $x <= $pages; $x++)
							{
								Print '<div class="tab-cont">';
								echo ($x == $page) ? '<strong> '.$x.' </strong>' : '<a href="?page='.$x.'"> '.$x.' </a>';
								if($x == ($page + 4)){
									break;
								}
								Print '</div>';
							}

						}
						

						if($pages >= 3)
						{
							$temp = $page + 3;
							if($temp <= $pages)
							{
								echo '<div class="tab-cont"><a href="?page='.$temp.'">Next Group</a></div>';
							}
						}

					}
					?>
				</div>
			</div>
			<div id="item-names">
				<table BORDER="2"    WIDTH="100%"   CELLPADDING="4" CELLSPACING="3">
				<TR>
					<TH>Supplier Name</TH>
					<TH>Location</TH>
					<TH>Product ID</TH>
					<TH>Department</TH>
					<TH>Product Name</TH>
					<TH>Price</TH>
					<TH>Quantity</TH>
					<TH>Unit</TH>
					<TH>Status</TH>
					<TH>Date Ordered</TH>
				</TR>

				<?php
					include 'config.php';
					$table = "$user"."_pending";
					$query = mysql_query("Select * from $table LIMIT $start, 10");
					while($row = mysql_fetch_assoc($query)){
						Print "<TR>";
						Print '<TD Align = "Center">'.$row['client_name'].'</TD>';
						Print '<TD Align = "Center">'.$row['location'].'</TD>';
							$len = strlen($row['prod_id']);
						if($len == 1){
							Print '<TD Align = "Center">PP-00'.$row['prod_id'].'</TD>';
						}
						else if($len == 2){
							Print '<TD Align = "Center">PP-0'.$row['prod_id'].'</TD>';
						}
						else{
							Print '<TD Align = "Center">PP-'.$row['prod_id'].'</TD>';
						}
							Print '<TD Align = "Center">'.$row['dept'].'</TD>';
							Print '<TD Align = "Center">'.$row['prod_name'].'</TD>';
							Print '<TD Align = "Center">'.$row['price'].'</TD>';
							Print '<TD Align = "Center">'.$row['quantity'].'</TD>';
							Print '<TD Align = "Center">'.$row['unit'].'</TD>';
							Print '<TD Align = "Center">'.$row['status'].'</TD>';
							Print '<TD Align = "Center">'.$row['date_ordered'].'</TD>';
						Print "</TR>";
					}
				?>
				</table>
			</div>
		</div>
</body>
</html>