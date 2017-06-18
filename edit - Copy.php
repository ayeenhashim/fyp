<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<?php 
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from student where id='".$id."'"; 
$result = mysqli_query($connection, $query) or die ( mysql_error());
$row = mysqli_fetch_assoc($result);
?>
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
<title>Edit</title>
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
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$host="localhost";//host name  
$username="root"; //database username  
$word="";//database word  
$db_name="nik";//database name  
$tbl_name="student"; //table name  
$con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");//connection string 
$id=$_REQUEST['id'];
$name =$_REQUEST['name'];
$stu_ic = $_REQUEST['stu_ic'];
$address = $_REQUEST['address'];
$contact = $_REQUEST['contact'];
//$checkbox1=$_REQUEST['subject'];
$subjects = implode(', ', $_REQUEST['subject']);
//$subjects = json_encode($_POST['subject']);
//$subjects = explode(',', $subjects);
$chk=""; 

$update="update student set name='".$name."', stu_ic='".$stu_ic."', address='".$address."', contact='".$contact."', sub='".$subjects."' where id='".$id."'";
mysqli_query($connection, $update) or die(mysql_error());
$status = "Record Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['name'];?>" /><input type="text" name="stu_ic" placeholder="Enter Student IC" required value="<?php echo $row['stu_ic'];?>" /></p>
<p><input type="text" name="address" placeholder="Enter Address" required value="<?php echo $row['address'];?>" /><input type="text" name="contact" placeholder="Enter Contact" required value="<?php echo $row['contact'];?>" /></p>
<fieldset style="background:#82E0AA" margin="3px" width = "500px"><legend><h3>Selected Subject: </h3></legend>
<?php echo $row['sub'];?>
</fieldset>
<br><br>
<div style="text-align:center">
   <div style="width:400px;border-radius:6px;margin:0px auto">  
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr style="background:#82E0AA">
<th><strong>No</strong></th>
<th><strong>Subject ID</strong></th>
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
<td align="center"><?php echo $row["sub_id"]; ?></td>
<td align="center"><?php echo $row["sub_name"]; ?></td>
<td align="center"><?php echo $row["sub_price"]; ?></td>
<td align="center"><input type="checkbox" name="subject[]" value="<?php echo $row["sub_name"]; ?>"></td>
<?php $count++; } ?>
</tbody>
</table>
</div>  
</form>  
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</div>
</body>
</html>
