
<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages
$status = "";
var_dump($_SESSION)
?>  
<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<link rel = "stylesheet" type = "text/css" href = "css/cssmenu.css">
<meta charset="utf-8">
<title>Insert New Record</title>
<script type="text/javascript" src="../js/jquery.min.js"/></script>
<style type="text/css">
		#body {
		background-image:url(img/background1.jpg);
		background-attachment:fixed;
		background-repeat:repeat;}
		
		#body_wrapper{
			
			background-color: white;
			width: 1200px;
			margin: 50px;
			border:1px solid #8b9dc3
			
		}
		#header{
			
			background-image: url("img/header.jpg");
			width:1200px;
			height:150px;
			
		}
		#top_menu{
			
			background-color:lightblue;
			background-image: url("img/background.jpg");
			width:auto;
			height:25px;
			padding:5px;
			
		}
		#footer{
			
			background-color:#8b9dc3;
			width:1200px;
			height:20px;
			
		}
		
		p {
		font-size: 15px;
		}

		p.serif {
		font-family: "Footlight MT light", Times,
		serif;
		}

		p.double {
			border-style: double;
		}
</style>

<link rel="stylesheet" href="css/style.css" />
</head>
<body>
			<div id='body_wrapper'>
		
			<div id='header'></div>
			<div id='cssmenu'>
<ul>
   <li><a href='index.php'><span>Home</span></a></li>
   <?php
   if($_SESSION['username']==='admin1'){
   	echo "<li class='has-sub'><a href='#'><span>Management </span></a>
      <ul>
         <li><a href='insert.php'><span>Register</span></a></li>
         <li class='last'><a href='view.php'><span>Record List</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Subject</span></a>
	<ul>
		<li><a href='add subject.php'><span>Register New Subject</span></a></li>
		<li class='last'><a href='subject.php'><span>Subject List</span></a></li>
	</ul>
	</li>
   ";
   }
   else{
   	echo "<li><a href='edit.php?id=".$_SESSION['id']."'><span>Subject </span></a></li>
   <li><a href='referrer.php?id=".$_SESSION['id']."'><span>Record</span></a></li>
   ";
   }

   ?>
   <li><a href='contact.php'><span>Contact</span></a></li>
   <li></li>
   <li></span></li>
</ul></div>
<div class="form">
<p>HYE <?php echo $_SESSION['username']; ?>!</p>
<a href="logout.php">Logout</a>
<center>
<br>
<br>
<div class="form">
<body>

<script type="text/javascript">
$(document).ready(function () {
    $('#submit').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one subject.");
        return false;
      }

    });
});

</script>
<div>
<h1>Add Subject</h1>
<form action="" method="post" enctype="multipart/form-data">  

<div class="cbgr">
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr style="background:#82E0AA">
<th><strong>No</strong></th>
<th><strong>Subject Name</strong></th>
<th><strong>Price</strong></th>
<th><strong>Add</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from subject ;";
$result = mysqli_query($connection, $sel_query)
or die("Error: ".mysqli_error($connection));
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["sub_name"]; ?></td>
<td align="center"><?php echo $row["sub_price"]; ?></td>
<td align="center"><input type="checkbox" class="group-required" name="subject[]" value="<?php echo $row["id"]; ?>" ></td>
<?php $count++; } ?>
</tbody>
</table></div>

<input type="submit" value="Submit" name="sub" id="submit">    
</form>  
<?php  
if(isset($_POST['new']))  
{ 
$host="localhost";//host name  
$username="root"; //database username  
$word="";//database word  
$db_name="nik";//database name  
$tbl_name="student"; //table name  
$con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");//connection string 
$name =$_REQUEST['name'];
$stu_ic = $_SESSION['username'];
$pass = md5($_REQUEST['pass']);
$address = $_REQUEST['address'];
$contact = $_REQUEST['contact']; 
$ref = $_REQUEST['ref'];
$checkbox1 = $_POST['subject'];
$chk=""; 
/*
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.", ";  
   } 
*/


	$select_query = "SELECT stu_id FROM student WHERE stu_ic = ".$stu_ic;
	$select_student_id = mysqli_query($con,$select_query);
	$row2 = mysqli_fetch_assoc($select_student_id);
	$count_row = mysqli_num_rows($select_student_id);
	if($count_row>0){
		for($i = 0; $i<sizeof($checkbox1); $i++){
			$in_ch=mysqli_query($con,"insert into stu_sub(stu_id,id) values ('".$row2['stu_id']."','".$checkbox1[$i]."')");
			if(!$in_ch){
				$in_ch=mysqli_query($con,"DELETE FROM stu_sub WHERE stu_id = ".$row2['stu_id']);
				echo'<script>alert("Failed To Insert")</script>';
				break;
			}
		}
		if($in_ch){
			echo'<script>alert("Inserted Successfully")</script>';
		}
	}

}  
?> 

<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</div>

</div>
</body>
</html>
