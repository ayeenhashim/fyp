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
$query="SELECT name FROM data WHERE id = ".$_GET['id'];


$result2 = mysqli_query($connection, $query);
$row2 = mysqli_fetch_assoc($result2)
?>
<h2><?php echo $row2['name'];?></h2>
<fieldset style="background:#82E0AA" margin="3px" width = "500px"><legend><h3>Selected Subject: </h3></legend>
<?php
	$sel_subject_query = "SELECT s.sub_name FROM subject s
						INNER JOIN stu_sub ss ON ss.id = s.id
						WHERE ss.stu_id = ".$stu_id;
	//echo $sel_subject_query;
	$sub_select_result = mysqli_query($connection, $sel_subject_query) or die ( mysql_error());
	$count_row_sub = mysqli_num_rows($sub_select_result);
	$count_row=0;
	while($row_sub = mysqli_fetch_assoc($sub_select_result)){
		echo $row_sub['sub_name'];
		$count_row++;
		if($count_row < $count_row_sub){
			echo " , ";
		}
	}


?>
</fieldset>
