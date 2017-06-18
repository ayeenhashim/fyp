
<!DOCTYPE html>
<html>
<head>
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
		</style>
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
		$username = stripslashes($username);
		$username = mysqli_real_escape_string($connection, $username);
		$password = stripslashes($password);
		$password = mysqli_real_escape_string($connection, $password);
		//Checking is user existing in the database or not
		if($username==='admin1')
        	$query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
        else
        	$query = "SELECT * FROM `student` WHERE stu_ic='$username' and password='".md5($password)."'";
		$result = mysqli_query($connection, $query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = mysqli_fetch_assoc($result)['stu_id'];
				header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>


		
			<div id='body_wrapper'>
		
			<div id='header'></div>
<div class="form">
<h2>Admin Log In</h2>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<br>
<br>
</div>
<?php } ?>
</body>
</html>
