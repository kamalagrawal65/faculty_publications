<head>
<title>Change Password</title>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
</head>
<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("location:login.php");
		exit();	
	}
	else if($_SESSION['user_type']==2){
		header("location:publication-form.php");
		exit();	
	}
	
	include("includes/header.php");
	include("includes/connection.php");
	
	
	if($_SESSION['user_type']==0)
		adminnav();
	else if($_SESSION['user_type']==1)
		usernav();
		
	
	
	$oldpass="";
	$newpass="";
	$newpassr="";
	
	if(isset($_POST['oldpass']) && ($_POST['newpass']) && ($_POST['newpassr'])){
		$oldpass=md5($_POST['oldpass']);
		$newpass=md5($_POST['newpass']);
		$newpassr=md5($_POST['newpassr']);
		if($newpass!=$newpassr){
			header("location:changepass.php?error=Passwords do not match");	
		}
		else{
			$query="select user_type from admin_table where email='".$_SESSION['email']."' AND password='".$oldpass."'";
			//echo $query;
			$result=mysqli_query($connection,$query);
			if(!$result)
				die("Error!");
			$count=mysqli_num_rows($result);
			if($count>0)
				echo "<center><h3>PASSWORD UPDATED</h3></center>";
			else
				echo "<center><h3>Old password is INCORRECT</h3></center>";	
			
			$query="update admin_table set password='".$newpass."' where email='".$_SESSION['email']."' AND password='".$oldpass."'";	
			$result=mysqli_query($connection,$query); 
			if(!$result)
				die("Error!");
		}
	}
?>
<style>
.input{
	border-radius:5px;
	height:50px;
	width:500px;
	margin-top:2%;
	padding:2%;
	font-size:20px;
}
#emaili{
	margin-top:16%;	
}
#submit{
	margin-top:4%;
	height:40px;
	width:500px;	
}
#login{
	align:center;
	background-color:#CCC;
	height:400px;
	width:600px;
	margin-top:3%;
	padding-top:1.4%;
}
#wpass{
	font-size:25px;	
	text-align:center;
}
</style>

<div id="wpass">

<?php 
if(isset($_GET['error'])){
	if($_GET['error']=="Passwords do not match")
		echo $_GET['error'];
	else header("location:error.php");
}
?>

</div>

<body>
<center>
<div id="login">
<h2>Change Password</h2>
<form action="changepass.php" method="post">
	<input type="password" class="input" name="oldpass" placeholder="OLD PASSWORD"/><br/>
    <input type="password" class="input" name="newpass" placeholder="NEW PASSWORD"/><br/>
    <input type="password" class="input" name="newpassr" placeholder="REPEAT PASSWORD"/><br/>
	<input type="submit" id="submit"/>
</form>

</div>
</center>

</body>
