<head>
<title>Verified</title>
</head>
<?php
	include("includes/connection.php");
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
	
	$fid=htmlentities($_POST['fid']);

	$author=(isset($_POST['author']))?htmlentities($_POST['author']):'NA';
	$school=(isset($_POST['school']))?htmlentities($_POST['school']):'NA';
	$document=(isset($_POST['document']))?htmlentities($_POST['document']):'NA';
	
	$title='NA';
	$source='NA';
	$year=2016;
	$subject='NA';
	$publisher='NA';
	$language='English';
	$volume='NA';
	$issue='NA';
	$issn='NA';
	$isbn='NA';
	$pages=0;
	$book_editor='NA';
	$page_start='NA';
	$page_end='NA';
	$conf_name='NA';
	$conf_date='NA';
	$conf_loc='NA';
	$conf_det='NA';
	$abstract=$title;
	$keyword=$title;
	
	if($document=='Article'){
		$title=(isset($_POST['article_title']))?htmlentities($_POST['article_title']):'NA';
		$source=(isset($_POST['article_source']))?htmlentities($_POST['article_source']):'NA';
		$year=(isset($_POST['article_year']))?htmlentities($_POST['article_year']):'NA';
		$subject=(isset($_POST['article_subject']))?htmlentities($_POST['article_subject']):'NA';
		$publisher=(isset($_POST['article_publisher']))?htmlentities($_POST['article_publisher']):'NA';
		$language=(isset($_POST['article_language']))?htmlentities($_POST['article_language']):'NA';	
		$volume=(isset($_POST['article_volume']))?htmlentities($_POST['article_volume']):'NA';
		$issue=(isset($_POST['article_issue']))?htmlentities($_POST['article_issue']):'NA';
		$issn=(isset($_POST['article_issn']))?htmlentities($_POST['article_issn']):'NA';
		$page_start=(isset($_POST['article_pagestart']))?htmlentities($_POST['article_pagestart']):'NA';
		$page_end=(isset($_POST['article_pageend']))?htmlentities($_POST['article_pageend']):'NA';
	}
	else if($document=='Book'){
		$title=(isset($_POST['book_title']))?htmlentities($_POST['book_title']):'NA';
		$source=(isset($_POST['book_source']))?htmlentities($_POST['book_source']):'NA';
		$year=(isset($_POST['book_year']))?htmlentities($_POST['book_year']):'NA';
		$subject=(isset($_POST['book_subject']))?htmlentities($_POST['book_subject']):'NA';
		$publisher=(isset($_POST['book_publisher']))?htmlentities($_POST['book_publisher']):'NA';
		$language=(isset($_POST['book_language']))?htmlentities($_POST['book_language']):'NA';	
		$isbn=(isset($_POST['book_isbn']))?htmlentities($_POST['book_isbn']):'NA';
		$pages=(isset($_POST['book_pages']))?htmlentities($_POST['book_pages']):'NA';
	}
	else if($document=='book_chapter'){
		$document='Book Chapter';
		$title=(isset($_POST['book_chap_title']))?htmlentities($_POST['book_chap_title']):'NA';
		$source=(isset($_POST['book_chap_source']))?htmlentities($_POST['book_chap_source']):'NA';
		$year=(isset($_POST['book_chap_year']))?htmlentities($_POST['book_chap_year']):'NA';
		$subject=(isset($_POST['book_chap_subject']))?htmlentities($_POST['book_chap_subject']):'NA';
		$publisher=(isset($_POST['book_chap_publisher']))?htmlentities($_POST['book_chap_publisher']):'NA';
		$book_editor=(isset($_POST['book_chap_editor']))?htmlentities($_POST['book_chap_editor']):'NA';
		$language=(isset($_POST['book_chap_language']))?htmlentities($_POST['book_chap_language']):'NA';	
		$isbn=(isset($_POST['book_chap_isbn']))?htmlentities($_POST['book_chap_isbn']):'NA';
		$page_start=(isset($_POST['book_chap_start']))?htmlentities($_POST['book_chap_start']):'NA';
		$page_end=(isset($_POST['book_chap_end']))?htmlentities($_POST['book_chap_end']):'NA';
	}
	else if($document=='conference_paper'){
		$document='Conference Paper';
		$title=(isset($_POST['conf_title']))?htmlentities($_POST['conf_title']):'NA';
		$source=(isset($_POST['conf_source']))?htmlentities($_POST['conf_source']):'NA';
		$year=(isset($_POST['conf_year']))?htmlentities($_POST['conf_year']):'NA';
		$subject=(isset($_POST['conf_subject']))?htmlentities($_POST['conf_subject']):'NA';
		$language=(isset($_POST['conf_language']))?htmlentities($_POST['conf_language']):'NA';	
		$conf_name=(isset($_POST['conf_name']))?htmlentities($_POST['conf_name']):'NA';
		$conf_date=(isset($_POST['conf_date']))?htmlentities($_POST['conf_date']):'NA';
		$conf_loc=(isset($_POST['conf_loc']))?htmlentities($_POST['conf_loc']):'NA';
		$conf_det=(isset($_POST['conf_detail']))?htmlentities($_POST['conf_detail']):'NA';
	}
	else if($document=='Misc'){
		$title=(isset($_POST['misc_title']))?htmlentities($_POST['misc_title']):'NA';
		$source=(isset($_POST['misc_source']))?htmlentities($_POST['misc_source']):'NA';
		$year=(isset($_POST['misc_year']))?htmlentities($_POST['misc_year']):'NA';
		$publisher=(isset($_POST['misc_publisher']))?htmlentities($_POST['misc_publisher']):'NA';
		$language=(isset($_POST['misc_language']))?htmlentities($_POST['misc_language']):'NA';	
		$page_start=(isset($_POST['misc_start']))?htmlentities($_POST['misc_start']):'NA';
		$page_end=(isset($_POST['misc_end']))?htmlentities($_POST['misc_end']):'NA';
	}
	
	$abstract=(isset($_POST['abstract']))?htmlentities($_POST['abstract']):'NA';
	$idx_keyword=(isset($_POST['idx_keyword']))?htmlentities($_POST['idx_keyword']):'NA';
	
	$access_type=(isset($_POST['access_type']))?htmlentities($_POST['access_type']):'NA';
	$doi=(isset($_POST['doi']))?htmlentities($_POST['doi']):'NA';
	include("includes/verified_insert.php");
	
	$delete_query="delete from verification_table where fid=".mysqli_real_escape_string($connection,$fid);		
	$result=mysqli_query($connection,$delete_query);
	
	header("location:verification.php?message=Data Inserted");
?>