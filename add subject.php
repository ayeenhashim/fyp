<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages
$status = "";

?>  
<!DOCTYPE html>
<html>
<head>
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
<div>
<h1>Insert New Subject</h1>
   <form action="" method="post" enctype="multipart/form-data">  
   <input type="hidden" name="new" value="1" />

Subject Name: <input type="text" name="sub_name" placeholder="Enter Subject Name" required /><br>
Subject Price: <input type="text" name="sub_price" placeholder="RM" value="RM" required />
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
</thead>
</table>
<input type="submit" value="Submit" name="sub">    
</form>  
<?php  
if(isset($_POST['new']))  
{  
$host="localhost";//host name  
$username="root"; //database username  
$word="";//database word  
$db_name="nik";//database name  
$tbl_name="subject"; //table name  
$con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");//connection string 
$sub_name =$_REQUEST['sub_name'];
$sub_price = $_REQUEST['sub_price'];  
 
$in_ch=mysqli_query($con,"insert into subject(`sub_name`,`sub_price`) values ('$sub_name','$sub_price')");  
if($in_ch==1)  
   {  
      echo'<script>alert("Inserted Successfully")</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert. Might be subject already registred")</script>';  
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
