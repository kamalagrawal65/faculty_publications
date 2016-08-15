<head>
<title>Login</title>
</head>
<?php
include("includes/header.php");
session_start();
if(isset($_SESSION['user_type'])){
	if($_SESSION['user_type']==2){
		header("location:publication-form.php");	
		exit();
	}
	else if(($_SESSION['user_type']==0 || $_SESSION['user_type']==1)){
		header("location:home.php");
		exit();
	}
}
?>

<style>
.input{
	height:40px;
	width:350px;
	margin-top:20px;
	padding:5px 20px 5px 10px;
	border-radius:5px;	
	outline:none;
	font-size:18px;
}
.form{
	background-color:#FFF;
	height:220px;
	position:absolute;
	top:210px;
	left:450px;
	width:400px;
	padding:30px;
	background-color:#CCC;
	box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
#submit{
	margin-top:20px;
	height:40px;
	width:350px;	
	font-size:24px;
	background-color:#000;
	color:white;
}

</style>

<center>
<div class="form">
<form action="home.php" method="post"> 
	<input type="text" name="username" placeholder="Email" class="input"/><br/>
    <input type="password" name="password" class="input" placeholder="Password"/><br/>
    <input type="submit" name='login' id='submit' value="Login"/>
</form>
</div>

</center>