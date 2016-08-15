<head>
<title>ADD USERS</title>
</head>

<?php
	include("includes/header.php");
	include("includes/connection.php");
	session_start();
	if(!isset($_SESSION['user_type'])){
		header("location:login.php");
		exit();	
	}
	else if($_SESSION['user_type']==2){
		header("location:publication-form.php");
		exit();
	}
	else if($_SESSION['user_type']==1){
		header("location:home.php");
		exit();
	}
	else if($_SESSION['user_type']==0)
		adminnav();
		
	if(isset($_GET['remove'])){
		$email=htmlentities($_GET['email']);
		$query="delete from admin_table where email='".mysqli_real_escape_string($connection,$email)."'";
		$result=mysqli_query($connection,$query);	
		if(!$result)
			die("Error!");
	}
	
	else if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['userid']) && isset($_POST['pass'])){
		$email=htmlentities($_POST['email']);
		$name=htmlentities($_POST['name']);
		$userid=htmlentities($_POST['userid']);
		$pass=md5($_POST['pass']);
		
		$query="INSERT INTO `admin_table`(`userid`, `email`, `name`, `password`, `user_type`) values ('".mysqli_real_escape_string($connection,$userid)."','".mysqli_real_escape_string($connection,$email)."','".mysqli_real_escape_string($connection,$name)."','".mysqli_real_escape_string($connection,$pass)."',1)";
		$result=mysqli_query($connection,$query);
		if(!$result)
			die("Error!");
	}
	else if(isset($_POST['uemail']) && isset($_POST['uname']) && isset($_POST['uuserid']) && isset($_POST['upass'])){
		$email=htmlentities($_POST['uemail']);
		$name=htmlentities($_POST['uname']);
		$userid=htmlentities($_POST['uuserid']);
		$pass=md5($_POST['upass']);
		
		$query="INSERT INTO `admin_table`(`userid`, `email`, `name`, `password`, `user_type`) values ('".mysqli_real_escape_string($connection,$userid)."','".mysqli_real_escape_string($connection,$email)."','".mysqli_real_escape_string($connection,$name)."','".mysqli_real_escape_string($connection,$pass)."',2)";
		$result=mysqli_query($connection,$query);
		if(!$result)
			die("Error!");
	}
	include("includes/admin_table.php");
	include("includes/admin_modal.php");
?>