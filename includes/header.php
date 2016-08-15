<?php function customError($errno, $errstr) {
  		//echo "<b>Error:</b> [$errno] $errstr<br>";
  		echo "Sorry! Something Went Wrong.";
  		die();
	}
	set_error_handler("customError");
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="icon" 
      type="image/jpg" 
      href="images/favicon.jpg">
</head>

<style>
a{
	text-decoration:none;	
}
body{
	padding:0px;
	margin:0px;	
}
#img2{
	height:100px;
	width:1345px;
}

/* Navigation Bar*/
#main-nav-bar{
	width:1350px;
	height:50px;
	background-color:#222222;
	color:grey;	
	border-radius:5px;
}
.main-nav-bar-heading{
	padding:10px 15px 10px 15px;
	display:inline-block;
	font-size:20px;
	text-align:center;
}
a.nav-link:link {
    color: grey;
}

/* visited link */
a.nav-link:visited {
    color: grey;
}

/* mouse over link */
a.nav-link:hover {
    color: white;
}

/* selected link */
a.nav-link:active {
    color: grey;
}
#logout-button{
	float:right;	
}
</style>

<body>
	<img src="images/header.jpg" id="img2"/>

	
<?php
	function adminnav()
	{
		echo "
		<div id='main-nav-bar'>
	<a class='nav-link' href='home.php'><div class='main-nav-bar-heading'>Home</div></a>
    <a class='nav-link' href='verification.php'><div class='main-nav-bar-heading'>Verification</div></a>
    <a class='nav-link' href='newadmin.php'><div class='main-nav-bar-heading'>Super User</div></a>
    <a class='nav-link' href='upload.php'><div class='main-nav-bar-heading'>Upload</div></a>
	<a class='nav-link' href='book-portal.php'><div class='main-nav-bar-heading'>Book Portal</div></a>
	<a class='nav-link' href='download.php'><div class='main-nav-bar-heading'>Download</div></a>
    <a class='nav-link' href='changepass.php'><div class='main-nav-bar-heading'>Change Password</div></a>
	<a class='nav-link' href='logout.php'><div id='logout-button' class='main-nav-bar-heading'>Logout</div></a>
</div>";
	}
	function usernav()
	{
		echo "
		<div id='main-nav-bar'>
		<a class='nav-link' href='home.php'><div class='main-nav-bar-heading'>Home</div></a>
    	<a class='nav-link' href='verification.php'><div class='main-nav-bar-heading'>Verification</div></a>
    	<a class='nav-link' href='upload.php'><div class='main-nav-bar-heading'>Upload</div></a>
		<a class='nav-link' href='book-portal.php'><div class='main-nav-bar-heading'>Book Portal</div></a>
		<a class='nav-link' href='download.php'><div class='main-nav-bar-heading'>Download</div></a>
    	<a class='nav-link' href='changepass.php'><div class='main-nav-bar-heading'>Change Password</div></a>
		<a class='nav-link' href='logout.php'><div id='logout-button' class='main-nav-bar-heading'>Logout</div></a>
</div>";
	}
	
	
?>








</body>
</html>