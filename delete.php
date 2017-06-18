
<?php 
require('db.php');
$stu_id=$_GET['id'];
$query = "DELETE FROM stu_sub WHERE stu_id = ".$stu_id; 
$result = mysqli_query($connection, $query) or die ( mysql_error());
if($result){
	$query2 = "DELETE FROM student WHERE stu_id = ".$stu_id;
	$result2 = mysqli_query($connection, $query2) or die ( mysql_error());
}else{
	mysqli_rollback($connection);
}
header("Location: view.php"); 
 ?>