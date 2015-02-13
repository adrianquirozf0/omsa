<?php 

$conn = mysql_connect("localhost", "omsa", "omsa") or die(mysql_error());
echo "Connected\n";
$db = mysql_select_db("omsa", $conn) or die(mysql_error());
echo "Database opened\n";