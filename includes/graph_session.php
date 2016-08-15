<?php
	session_start();
	$_SESSION['ac']=$_GET['author_checked'];
	$_SESSION['acv']=$_GET['author_checked_value'];
	echo $_SESSION['acv'];
?>