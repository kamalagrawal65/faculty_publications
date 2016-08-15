<?php
	include("includes/header.php");
	include("includes/connection.php");
	$record=1;
	
	session_start();
	if(!isset($_SESSION['user_type'])){
		header("location:index.php");
		exit();
	}
	
	else if(isset($_SESSION['user_type']) && $_SESSION['user_type']==2){
		header("location:publication-form.php");
		exit();
	}
		
	if(isset($_SESSION['user_type']) && $_SESSION['user_type']==0)
		adminnav();
	else if(isset($_SESSION['user_type']) && $_SESSION['user_type']==1)
		usernav();
	
	
	if(isset($_GET['record']))
		$record=$_GET['record'];
	else
		header("location:home.php");
	
	
	
	$auth_query="select aname from author_table where slno=$record";
	$auth_result=mysqli_query($connection,$auth_query);
	if(!$auth_result)
		die("No authors Found");
	$row=mysqli_fetch_row($auth_result);
	$author=$row[0];
	while($row=mysqli_fetch_row($auth_result)){
		$author=$author.", $row[0]";
	}
	
	$edit_query="SELECT `pri_author`, `sec_author`, `doi`, `title`, `year`, `stitle`, `vol`, `issue`, `school`, `sub_name`, `abs`, `pub`, `issn`, `isbn`, `doc_type`, `access_type`, `language`, `slno`, `page_start`, `page_end` FROM `publication_table` p,`school_table` sc,subject_table sub,doctype_table d,abstract_table a where d.doc_id=p.doc_id and p.sid=sc.sid and p.subid=sub.subid and p.abs_id=a.abs_id and p.slno=$record";
	$result=mysqli_query($connection,$edit_query);
	$row=mysqli_fetch_row($result);
	
	$doi=$row[2];
	$title=$row[3];
	$year=$row[4];
	$source=$row[5];
	$volume=$row[6];
	$issue=$row[7];
	$school=$row[8];
	$subject=$row[9];
	$abstract=$row[10];
	$publisher=$row[11];
	$issn=$row[12];
	$isbn=$row[13];
	$document=$row[14];
	$access_type=$row[15];
	$language=$row[16];
	
	
	$page_start=$row[18];
	$page_end=$row[19];
	$con_query="SELECT `conf_name`, `conf_date`, `conf_loc`, `con_detail` FROM `conference_table` WHERE slno=$record";
	$result=mysqli_query($connection,$con_query);	
	$row=mysqli_fetch_row($result);
	
	
	$conf_name=$row[0];
	$conf_date=$row[1];
	$conf_loc=$row[2];
	$conf_det=$row[3];
	
	$key=NULL;
	$key_query="select keyword from key_table where slno=$record";
	$key_result=mysqli_query($connection,$key_query);
	if(!$key_result)
		die("No authors Found");
	$row=mysqli_fetch_row($key_result);
	$key=$row[0];
	while($row=mysqli_fetch_row($key_result)){
		$key=$key.", $row[0]";
	}
	
	$keyword=$key;
	
	include("includes/oldediting.php");
?>