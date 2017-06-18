<?php
include("auth.php");
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
<div class = "form">
<?php

/*

VIEW.PHP

Displays all data from 'subject' table

*/



// connect to the database

include('connect-db.php');



// get results from database

$sel_query="Select * from subject ORDER BY id desc;";
$result = mysqli_query($connection, $sel_query);


// display subject in table

echo "<table border='1' cellpadding='10' alligment='center'>"; 
echo "<tr > <th>Subject ID</th> <th>Subject Name</th> <th>Subject Price</th> <th></th> <th></th></tr>";

// loop through results of database query, displaying them in the table

while($row = mysqli_fetch_array( $result )) {

// echo out the contents of each row into a table

echo "<tr>";

echo '<td>' . $row['sub_id'] . '</td>';

echo '<td>' . $row['sub_name'] . '</td>';

echo '<td>' . $row['sub_price'] . '</td>';

echo '<td><a href="editsub.php?id=' . $row['id'] . '">Edit</a></td>';

echo '<td><a href="dsub.php?id=' . $row['id'] . '">Delete</a></td>';

echo "</tr>";

}



// close table>

echo "</table>";

?>

<p><a href="add subject.php">Add a new record</a></p>

<center>

</body>

</html>