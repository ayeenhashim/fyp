
<?php 
require('db.php');
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" type = "text/css" href = "css/cssmenu.css">
<meta charset="utf-8">
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
<title>View Record</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/table.css" />
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
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<!-- <th><strong>No</strong></th> -->
<th><strong>ID</strong></th>
<th><strong>Name</strong></th>
<th><strong>Student IC</strong></th>
<th><strong>Address</strong></th>
<th><strong>Contact</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from student ORDER BY name";

$result = mysqli_query($connection, $sel_query);
while($row = mysqli_fetch_assoc($result)) {
$sel_name = "SELECT * FROM `users` WHERE id='".$row['ref_id']."' ";
// "insert into student(name,stu_ic,address,contact,ref_id) values ('$name','$stu_ic','$address','$contact','$ref')"
$res = mysqli_query($connection, $sel_name);
$res = mysqli_fetch_assoc($res); 
// echo($res["username"]);exit();
?>
<tr>
<!-- <td align="center"><?php echo $count; ?></td> -->
<td align="center"><a href="referrer.php?id=<?php echo str_pad($row["stu_id"], 4, "0", STR_PAD_LEFT); ?>"/><?php echo str_pad($row["stu_id"], 4, "0", STR_PAD_LEFT); ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["stu_ic"]; ?></td>
<td align="center"><?php echo $row["address"]; ?></td>
<td align="center"><?php echo $row["contact"]; ?></td>
<td align="center"><a href="edit.php?id=<?php echo $row["stu_id"]; ?>">Edit</a></td>
<td align="center"><a href="delete.php?id=<?php echo $row["stu_id"]; ?>">Delete</a></td></tr>
<?php $count++; } ?>
</tbody>
</table>
</div>

</div>
<br>
<br>
</body>
</html>
