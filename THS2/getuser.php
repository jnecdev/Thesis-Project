<?php
$q = $_GET['q'];

include 'config.php';
session_start();

$result = mysql_query("SELECT * FROM supplier WHERE name='$q'");
$count = mysql_num_rows($result);
while($row = mysql_fetch_assoc($result))
{
  $sup = $row['supplier_id'];
}

$table = "$sup"."_category";

$query = mysql_query("SELECT * FROM $table");

Print "Select Category: <br/>";

if(!($query <= 0)){
    echo '<select name="category">';

    while($row = mysql_fetch_assoc($query))
      {
      echo "<option>".$row['category']."</option>";
      }
    echo "</select>";
}
else{
    Print "<p>No categories from this supplier</p>";
}
?>