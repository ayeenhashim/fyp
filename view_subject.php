<?php
include("auth.php");
require('db.php');
?>
<html>
<head>
<title>View Subject</title>
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
<center><br><br><center>
<?php
$query="SELECT sub_name FROM subject WHERE id = ".$_GET['id'];
$result2 = mysqli_query($connection, $query);
$row2 = mysqli_fetch_assoc($result2)
?>
<h2><?php echo $row2['sub_name'];?></h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>No</strong></th>
<th><strong>Name</strong></th>
<th><strong>Student IC</strong></th>
<th><strong>Address</strong></th>
<th><strong>Contact</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$count_row = 0;
$sel_query="SELECT DISTINCT d.stu_id,d.name,d.stu_ic,d.address,d.contact,s.sub_name
			FROM stu_sub ss
			INNER JOIN subject s ON ss.id = s.id
			INNER JOIN student d ON ss.stu_id = d.stu_id
			WHERE s.id = ".$_GET['id'];
$result = mysqli_query($connection, $sel_query);
$count_row = mysqli_num_rows($result);
if($count_row>0){
	while($row = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td align="center"><?php echo $count; ?></td>
			<td align="center"><?php echo $row["name"]; ?></td>
			<td align="center"><?php echo $row["stu_ic"]; ?></td>
			<td align="center"><?php echo $row["address"]; ?></td>
			<td align="center"><?php echo $row["contact"]; ?></td>
			<td align="center"><a href="delete.php?id=<?php echo $_GET["id"]; ?>&stu_id=<?php echo $row["stu_id"]; ?>">Delete</a></td></tr>

<?php $count++; }
}else{
	echo '<tr><td align="center" colspan="6">NO RECORD</td></tr>';
}
?>
</tbody>
</table>
