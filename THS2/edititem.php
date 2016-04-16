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
					<div class="tab-cont">Edit Item</div>
					<div class="tab-cont"><a href="stockquantity.php">Back to Stock Quantity</a></div>
				</div>
			</div>
			<div id="item-names">
				<form action="edititem.php" METHOD="POST">
					<div id="form-supplier">


						<p>Item Code: <br/>
						<?php
							include 'config.php';
							if(!empty($_GET['code']) && !empty($_GET['name'])){
								$code = $_GET['code'];
								$name = $_GET['name'];

								Print "<p>$code - $name</p>";
								Print "<p>Item Review:</p><br/>";
								$query = mysql_query("select * from items WHERE itemcode='$code' AND itemname='$name'");
								Print '<table BORDER="2"    WIDTH="90%"   CELLPADDING="4" CELLSPACING="3">
										<TR>
											<TH>ItemCode</TH>
											<TH>ItemName</TH>
											<TH>Unit</TH>
											<TH>Current Quantity</TH>
											<TH>Supplier</TH>
											<TH>Damaged</TH>
											<TH>Number of Damaged</TH>
											<TH>Total Quantity</TH>
										</TR>';
								while($row = mysql_fetch_assoc($query)){
									Print "<TR>";
									$temp = $row['numberofdamaged'];
									$temp2 = $row['quantity'];
									$ans = $temp2 - $temp;
										Print '<TD Align = "Center">'.$row['itemcode'].'</TD>';
										Print '<TD Align = "Center">'.$row['itemname'].'</TD>';
										Print '<TD Align = "Center">'.$row['unit'].'</TD>';
										Print '<TD Align = "Center">'.$ans.'</TD>';
										Print '<TD Align = "Center">'.$row['supplier'].'</TD>';
										Print '<TD Align = "Center">'.$row['damaged'].'</TD>';
										Print '<TD Align = "Center">'.$row['numberofdamaged'].'</TD>';
										Print '<TD Align = "Center">'.$row['quantity'].'</TD>';
									Print "</TR>";
									$lol1 = $row['itemcode'];
									$lol2 = $row['itemname'];
									$_SESSION['code'] = "$lol1"." - "."$lol2";
									$_SESSION['code1'] = $lol1;
									$_SESSION['code2'] = $lol2;

								}

								Print "</table>";
							}
							else{
								Print '<select name="itemcode">';
								$query = mysql_query("select * from items");
								while($row = mysql_fetch_assoc($query)){
									$temp = $row['itemcode'];
									Print '<option>'.$temp.' - ' .$row['itemname'].'</option>';
								}
								Print"</select>";
							}



						?>			
						<p>New Current Quanity: (This will add the existing)<br/> <input type="text" name="newqu"/>
						<p>Number of items damaged: (This will add the existing)<br/><input type="text" name="numdam"/>
						<p>Parts Damaged: (Indicate all parts damaged on the items damaged)<br/> <input type="text" name="part_damaged"/>
						<p>Remarks: (Comments regarding the items damaged)<br/><input type="text" name="remarks"/>
						<br/><br/><input type="submit" value="Submit"/>
					</div>
				</form>
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						include 'config.php';
						if(!empty($_POST['itemcode'])){
							$itemcode = mysql_real_escape_string($_POST['itemcode']);
						}
						else{
							$itemcode = $_SESSION['code'];
						}
						(int)$unit = mysql_real_escape_string($_POST['newqu']);
						(int)$numdam = mysql_real_escape_string($_POST['numdam']);
						$part_damaged = mysql_real_escape_string($_POST['part_damaged']);
						$remarks = mysql_real_escape_string($_POST['remarks']);
						$query = mysql_query("Select * from items WHERE itemcode='$itemcode'");
						while($row = mysql_fetch_assoc($query)){
							$temp = $row['quantity'];
							$temp2 = $row['numberofdamaged'];
							$itemname = $row['itemname'];
						}

						$lol1 = $temp + $unit;
						$lol2 = $temp2 + $numdam;

						$ans = $lol1 + $lol2;
						mysql_query("INSERT INTO  damaged_items (`itemcode` ,`itemname` ,`quantity` ,`numberofdamaged`, `part_damaged`, `remarks`) VALUES('$itemcode','$itemname','$lol1','$lol2','$part_damaged', '$remarks')");
						mysql_query("INSERT INTO  items_history (`itemcode` ,`itemname` ,`quantity` ,`numberofdamaged`) VALUES('$itemcode','$itemname','$lol1','$lol2')");
						$lo = mysql_query("UPDATE items SET quantity='$lol1' WHERE itemcode='$itemcode'");
						mysql_query("UPDATE items SET numberofdamaged='$lol2' WHERE itemcode='$itemcode'");
						if(!empty($lo)){
							Print '<script>var r=confirm("Record Successfully Added! Click OK to return to stock quantity list or Cancel to View Damaged List");
								if (r==true)
  								{
									window.location.assign("stockquantity.php");
								}
								else
								{
									window.location.assign("damaged_items.php");
								}
								</script>';
							//header("location: edititem.php?token=342xdk23a44hd4wrwq04923df32xc94crm0pucr3pmux8r903wu8r4085t740r327y0874r0103mrc08fjw28rcmh0rh0284hr0w3ju4x02j8r023chrm08f238rchmr08f&code=".$_SESSION['code1'].'&name='.$_SESSION['code2']);
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