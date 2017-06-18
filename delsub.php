<?php
$sub_id =$_REQUEST['sub_id'];

$con = mysql_connect("localhost","root","");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}

mysql_select_db("database", $con);

// sending query
mysql_query("DELETE FROM subject WHERE sub_id = '$sub_id'")
or die(mysql_error());      

?>