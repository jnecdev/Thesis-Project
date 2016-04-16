<?php
include 'config.php';

session_start();


$id = $_GET['id'];
$name = $_GET['name'];
$client = $_SESSION['tempcli'];

$table = "$client"."_pending";
$query = mysql_query("Select * from $table WHERE client_name='$name'");
while($row = mysql_fetch_assoc($query)){
	$unit = $row['unit'];
	$quantity = $row['quantity'];
}

if($unit == "Box"){
	$pieces = $quantity * 25;
}

$query = mysql_query("SELECT * from items WHERE itemcode='$id'");
while($row = mysql_fetch_assoc($query)){
	$itemquantity = $row['quantity'];
	$itemunit = $row['unit'];
}

if($itemunit == "Box"){
	$pieces1 = $itemquantity * 25;
}

if(($unit == "Box") && ($itemunit == "Box"))
{
	$totalpiece = $itemquantity - $quantity;
}
else if(($unit == "Box") && !($itemunit == "Box"))
{
	$totalpiece =  $itemquantity - $pieces;
}
else if(!($unit == "Box") && ($itemunit == "Box"))
{
	$totalpiece = $pieces1 - $quantity;
	$totalpiece = $totalpiece / 25;
}
else
{
	$totalpiece = $itemquantity - $quantity;
}

$table = "$client"."_pending";
$qo = mysql_query("DELETE FROM $table WHERE prod_id='$id'");
$query = mysql_query("UPDATE items SET quantity='$totalpiece' WHERE itemcode='$id'");
if(!empty($query)){
Print '<script>alert("Record has been checked in!")</script>';
Print '<script>window.location.assign("order_history.php?token=saokjdowemiutj3c0r923u4t3qrc30rcj30rjwx3jfr3c0xfj04rfcmjr098ojgtmrk90gwj6rcfrioughwerg&id='.$client.'");</script>';
}
?>