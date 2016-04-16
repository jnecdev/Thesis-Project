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
				<div class="tab2"><a href="supplier.php">Supplier</a></div>
				<div class="tab2"><a href="logout.php">Logout</a></div>
			</div>
		</div>

		<div id="container">
			<div id="upper-tab">
				<div id="crud-item">
					<div class="tab-cont"><a href="stockquantity.php">Stock Quantity</a></div>
					<div class="tab-cont"><a href="criticallevel.php">View Critical Level</a></div>
					<?php
						include 'config.php';
					?>
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
					<TH>Edit Item</TH>
				</TR>

				<?php
					$crit_arr = array(true,true);
					$crit_ctr = 0;
					$query = mysql_query("Select * from `items` ");
					while($row = mysql_fetch_assoc($query)){
						$temp = $row['numberofdamaged'];
						$temp2 = $row['quantity'];
						$crit = $temp2 * .20;
						$ans = $temp2 - $temp;
						if($ans <= $crit){
							$crit_arr[$crit_ctr] = true;
							/*$len = strlen($row['itemcode']);
							Print "<TR>";
							if($len == 1){
								Print '<TD Align = "Center" class="critical">PP-00'.$row['itemcode'].'</TD>';
							}
							else if($len == 2){
								Print '<TD Align = "Center" class="critical">PP-0'.$row['itemcode'].'</TD>';
							}
							else{
								Print '<TD Align = "Center" class="critical">PP-'.$row['itemcode'].'</TD>';
							}
								
								Print '<TD Align = "Center" class="critical">'.$row['itemname'].'</TD>';
								Print '<TD Align = "Center" class="critical">'.$row['unit'].'</TD>';
								Print '<TD Align = "Center" class="critical">'.$ans.'</TD>';
								Print '<TD Align = "Center" class="critical">'.$row['supplier'].'</TD>';
								Print '<TD Align = "Center" class="critical">'.$row['damaged'].'</TD>';
								Print '<TD Align = "Center" class="critical">'.$row['numberofdamaged'].'</TD>';
								Print '<TD Align = "Center" class="critical">'.$row['quantity'].'</TD>';
								Print '<TD Align = "Center" class="critical"><a href="edititem.php?token=342xdk23a44hd4wrwq04923df32xc94crm0pucr3pmux8r903wu8r4085t740r327y0874r0103mrc08fjw28rcmh0rh0284hr0w3ju4x02j8r023chrm08f238rchmr08f&code='.$row['itemcode'].'&name='.$row['itemname'].'">Edit Item</a></TD>';

							Print "</TR>";*/
							$crit_ctr++;
						}
						else{
							$crit_arr[$crit_ctr] = false;
							/*$len = strlen($row['itemcode']);
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
								Print '<TD Align = "Center"><a href="edititem.php?token=342xdk23a44hd4wrwq04923df32xc94crm0pucr3pmux8r903wu8r4085t740r327y0874r0103mrc08fjw28rcmh0rh0284hr0w3ju4x02j8r023chrm08f238rchmr08f&code='.$row['itemcode'].'&name='.$row['itemname'].'">Edit Item</a></TD>';

							Print "</TR>";*/
							$crit_ctr++;
						}
					}
					$query = mysql_query("Select * from `items` ");
					$crit_ctr = 0;
					while($row = mysql_fetch_assoc($query)){
						$temp = $row['numberofdamaged'];
						$temp2 = $row['quantity'];
						$crit = $temp2 * .20;
						$ans = $temp2 - $temp;
						if($crit_arr[$crit_ctr]){
							$len = strlen($row['itemcode']);
							Print "<TR>";
							if($len == 1){
								Print '<TD Align = "Center" class="critical">PP-00'.$row['itemcode'].'</TD>';
							}
							else if($len == 2){
								Print '<TD Align = "Center" class="critical">PP-0'.$row['itemcode'].'</TD>';
							}
							else{
								Print '<TD Align = "Center" class="critical">PP-'.$row['itemcode'].'</TD>';
							}
								
								Print '<TD Align = "Center" class="critical">'.$row['itemname'].'</TD>';
								Print '<TD Align = "Center" class="critical">'.$row['unit'].'</TD>';
								Print '<TD Align = "Center" class="critical">'.$ans.'</TD>';
								Print '<TD Align = "Center" class="critical">'.$row['supplier'].'</TD>';
								Print '<TD Align = "Center" class="critical">'.$row['damaged'].'</TD>';
								Print '<TD Align = "Center" class="critical">'.$row['numberofdamaged'].'</TD>';
								Print '<TD Align = "Center" class="critical">'.$row['quantity'].'</TD>';
								Print '<TD Align = "Center" class="critical"><a href="edititem.php?token=342xdk23a44hd4wrwq04923df32xc94crm0pucr3pmux8r903wu8r4085t740r327y0874r0103mrc08fjw28rcmh0rh0284hr0w3ju4x02j8r023chrm08f238rchmr08f&code='.$row['itemcode'].'&name='.$row['itemname'].'">Edit Item</a></TD>';

							Print "</TR>";
							$crit_ctr++;
						}
						else{
							$crit_ctr++;
						}
					}
				?>
				</table>
			</div>
		</div>
</body>
</html>