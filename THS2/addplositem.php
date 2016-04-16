<?php
	session_start();
	include 'config.php';

	$ses = $_SESSION['supplier'];
	$sel = $_SESSION['plositem'];
	$item = mysql_real_escape_string($_POST['item']);

	$query = mysql_query("Select * from supplier WHERE name='$ses'");

	while($row = mysql_fetch_assoc($query)){
		$un_id = $row['supplier_id'];
	}

	$usertable = "$un_id"."_"."category";
	$query = mysql_query("Select * from $usertable where category='$sel'");
	while($row = mysql_fetch_assoc($query))
	{
		$code = $row['code'];
	}

	$usertable = "$un_id"."_"."$code";

	$que = mysql_query("INSERT INTO $usertable (category) VALUES('$item')");

	iF(!empty($que))
	{
		header("location: plos.php?token=sdcfw0sd98f7sd098f7crs09d8f70d9g8v7f98j7bgh987b0gh98k7n0gh987f0d986wq976349320ksytsdcfw0sd98f7sd098f7crs09d8f70d9g8v7f98j7bgh987b0gh98k7n0gh987f0d986wq976349320ksyt");
	}
	else{
		Print "Did not insert";
	}

?>