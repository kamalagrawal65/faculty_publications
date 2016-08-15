<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload File</title>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

</head>
<style>
#form_upload{
	align:center;
	background-color:#CCC;
	height:400px;
	width:400px;
	margin-top:3%;	
}
.input{
	margin-top:2%;
	height:40px;
	width:200px;
}
#year{
	margin-top:10%;
	height:50px;
	width:220px;
	padding:2%;	
	font-size:25px;
	border-radius:5px;
}
#xsl{
	height:30px;
	width:600px;
	margin-left:30%;
	padding:2%;	
	font-size:20px;
}
#submit{
	margin-top:3%;
	height:40px;
	width:160px;
	margin-left:-20px;	
	font-size:25px;
}
</style>

<?php
	include("includes/header.php");
	session_start();
	if(!isset($_SESSION['user_type'])){
		header("location:login.php");
		exit();
	}
	
	else if(isset($_SESSION['user_type']) && $_SESSION['user_type']==2){
		header("location:publication-form.php");
		exit();
	}
	if($_SESSION['user_type']==0)
		adminnav();
	else if($_SESSION['user_type']==1)
		usernav();
		
	if(isset($_GET['error']) && $_GET['error']=="Please fill all the details")
		echo "<center><b>{$_GET['error']}</b></center>";
	if(isset($_GET['message']) && $_GET['message']=="Data Inserted")
		echo "<center><b>{$_GET['message']}</b></center>";
?>



<body>
    
    <center>
	<form action="insert.php" method="post" enctype="multipart/form-data" id="form_upload">
        <div id='year'><b><u>Upload XSL file:</u></b></div><br/>
    	<input class="input" type="file" name="xsl" id="xsl"/>
        <br/><br/><input type="submit" id="submit"/>
    </form>
    </center>
    
</body>
</html>