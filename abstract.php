<head>
<title>Abstract</title>
</head>
<style>
	a{
		text-decoration:none;	
	}
</style>
<?php
	include('includes/header.php');
	include('includes/connection.php');
	if(!isset($_GET['aid']))
		header("location:index.php");
	
	
	$aid=htmlentities($_GET['aid']);
	$doc_query="select doc_type from doctype_table where doc_id in (select doc_id from 
	publication_table where abs_id=$aid)";
	$result=mysqli_query($connection,$doc_query);
	if(!$result)
		die("No Results Found");
	
	
	
	$row=mysqli_fetch_row($result);
	
	$doc_type=$row[0];
	
	if($doc_type=='Article' || $doc_type=='Article Paper')
		include("includes/abstract_article.php");
	else if($doc_type=='Conference Paper')
		include("includes/abstract_conference.php");
	else if($doc_type=='Book')
		include("includes/abstract_book.php");
	else if($doc_type=='Book Chapter')
		include("includes/abstract_bookc.php");
	else
		include("includes/abstract_misc.php");
?>