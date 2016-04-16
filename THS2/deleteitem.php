<?php
session_start();
include 'config.php';

$code = $_GET['code'];
$name = $_GET['name'];

mysql_query("DELETE FROM items WHERE itemcode='$code' AND itemname='$name' ");

header("location: stockquantity.php");

?>