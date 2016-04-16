<?php
	include 'config.php';
	session_start();
	$unit = mysql_real_escape_string($_POST['unit']);
	$quantity = mysql_real_escape_string($_POST['quantity']);
	$user = $_SESSION['client'];
	$id = $_SESSION['idctr'];

	$query = mysql_query("Select * from items WHERE itemcode='$id'");
	while($row = mysql_fetch_assoc($query))
	{
		$itemcode =  $row['itemcode'];
		$itemname =  $row['itemname'];
		$category =  $row['category'];
		$unit =  $row['unit'];
		$unitprice =  $row['unitprice'];
		$supplier =  $row['supplier'];

	}

	$query = mysql_query("SELECT * from supplier WHERE name='$supplier'");
	while($row = mysql_fetch_assoc($query)){
		$address = $row['address'];
	}

	if($unit = "Box"){
		$total = $quantity * 25;
		$price = $total * $unitprice;
	}
	else{
		$total = $quantity * 1;
		$price = $total * $unitprice;
	}
	$table = "$user"."_history";
	$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
	$today2 = date("Y/m/d", $today);
	$q = mysql_query("INSERT INTO $table (client_name, location, prod_id, dept, prod_name, price, unit, quantity, lead_time, terms, date_ordered) VALUES('$supplier','$address','$itemcode','$category','$itemname','$price','$unit','$total','30','60','$today2')");
	$table = "$user"."_pending";
	mysql_query("INSERT INTO $table (client_name, location, prod_id, dept, prod_name, price, unit, quantity, status, date_ordered) VALUES('$supplier','$address','$itemcode','$category','$itemname','$price','$unit','$total','undelivered','$today2')");
	if(!empty($q))
	{
		Print '<script>alert("Order Successfully Added!")</script>';
		Print '<script>window.location.assign("order_summary.php");</script>';
	}
?>