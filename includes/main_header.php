<style>
#main-nav-bar{
	width:1365px;
	height:50px;
	background-color:#222222;
	color:grey;	
	border-radius:5px;
}
.main-nav-bar-heading{
	padding:10px 30px 10px 30px;
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
<div id='main-nav-bar'>
	<a class='nav-link' href="home.php"><div class='main-nav-bar-heading'>Home</div></a>
    <a class='nav-link' href="verification.php"><div class='main-nav-bar-heading'>Verification</div></a>
    <a class='nav-link' href="newadmin.php"><div class='main-nav-bar-heading'>Super User</div></a>
    <a class='nav-link' href="download.php"><div class='main-nav-bar-heading'>Download</div></a>
    <a class='nav-link' href="changepass.php"><div class='main-nav-bar-heading'>Change Password</div></a>
	<a class="nav-link" href="logout.php"><div id='logout-button' class='main-nav-bar-heading'>Logout</div></a>
</div>