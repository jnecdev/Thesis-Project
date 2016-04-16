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
					<form action="order_create.php" method="POST">
						<div class="tab-cont">
							<input type="text" name="search"/>
							<select name="category">
								<option>ItemName</option>
								<option>Unit</option>
								<option>Unit Price</option>
								<option>Supplier</option>
							</select>
							<input type="submit" value="Search"/>
						</div>
					</form>
					<?php

					include 'config.php';

					$query = mysql_query("Select * FROM items");
					$pages_query = mysql_num_rows($query);
					$pages = ceil($pages_query / 10);
					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					$start = ($page - 1) * 10;

					if($pages > 1)
					{

						$temp = 1;

						if($pages >= 6)
						{
							$temp = $page - 5;
									if($temp <= 0){
										$temp = 1;
									}
									if($page > 1){
										echo '<div class="tab-cont"><a href="?page='.$temp.'">Previous</a></div>';
									}
						}

						
						if($page > 5){
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
						

						if($pages >= 5)
						{
							$temp = $page + 5;
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
					<TH>ItemCode</TH>
					<TH>ItemName</TH>
					<TH>Category</TH>
					<TH>Unit</TH>
					<TH>Unit Price</TH>
					<TH>Supplier</TH>
					<TH>Order Item</TH>
				</TR>

				<?php	
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$search = mysql_real_escape_string($_POST['search']);
						$category = mysql_real_escape_string($_POST['category']);

						if($category == "ItemName"){
							$category = "itemname";
						}
						else if($category == "Unit")
						{
							$category = "unit";
						}
						else if($category == "Unit Price")
						{
							$category = "unitprice";
						}
						else
						{
							$category = "supplier";	
						}
						$query = mysql_query("Select * from `items`  WHERE $category LIKE '%$search%' LIMIT $start, 10");
					}
					else
					{
						$query = mysql_query("Select * from `items` LIMIT $start, 10");
					}
						while($row = mysql_fetch_assoc($query)){
							Print "<TR>";
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
								Print '<TD Align = "Center">'.$row['category'].'</TD>';
								Print '<TD Align = "Center">'.$row['unit'].'</TD>';
								Print '<TD Align = "Center">'.$row['unitprice'].'</TD>';
								Print '<TD Align = "Center">'.$row['supplier'].'</TD>';
								Print '<TD Align = "Center"><A href="add_order.php?token=slakdjckwkejrc43985utcm40e91u230rc2ru0x3fjr09gu4thg3ujtgjfud838wjdklvglhpy09e36wgsbxnxzvfa3143thbnguyiyhf7eg&itemname='.$row['itemname'].'&supplier='.$row['supplier'].'&id='.$row['itemcode'].'">Order</a></TD>';
							Print "</TR>";
						}
				?>
				</table>
			</div>
		</div>
</body>
</html>