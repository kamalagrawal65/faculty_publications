<!-- Returns the filtered string on which search is to performed -->

<?php
	$search_str=NULL;
	
	//special case when title is searched
	$search_title=NULL;
	if(isset($_GET['title']) && $_GET['title']!=''){
		$search_str.="title= '".$_GET['title']."'";	
	}
	
	$search_auth_array=NULL;
	if(isset($_GET['author']) && $_GET['author']!=''){
		$search_author=$_GET['author'];
		$search_auth_array=explode(',',$search_author);
		if(count($search_str)>0)
			$search_str.=" and ";
		$search_str.="author=$search_auth_array[0]";
		for($i=1;$i<count($search_auth_array);$i++){
			$search_str.=", ".$search_auth_array[$i];
		}
	}
	
	$search_subj_array=NULL;
	if(isset($_GET['subject']) && $_GET['subject']!=''){
		$search_subject=$_GET['subject'];
		$search_subj_array=explode(',',$search_subject);
		if(count($search_str)>0)
			$search_str.=" and ";
		$search_str.="subject=$search_subj_array[0]";
		for($i=1;$i<count($search_subj_array);$i++){
			$search_str.=", ".$search_subj_array[$i];
		}
	}
	
	$search_docu_array=NULL;
	if(isset($_GET['document']) && $_GET['document']!=''){
		$search_document=$_GET['document'];
		$search_docu_array=explode(',',$search_document);
		if(count($search_str)>0)
			$search_str.=" and ";
		$search_str.="document=$search_docu_array[0]";
		for($i=1;$i<count($search_docu_array);$i++){
			$search_str.=", ".$search_docu_array[$i];
		}
	}
	
	$search_scho_array=NULL;
	if(isset($_GET['school']) && $_GET['school']!=''){
		$search_school=$_GET['school'];
		$search_scho_array=explode(',',$search_school);
		if(count($search_str)>0)
			$search_str.=" and ";
		$search_str.="school=$search_scho_array[0]";
		for($i=1;$i<count($search_scho_array);$i++){
			$search_str.=", ".$search_scho_array[$i];
		}
	}
	
	$search_year_array=NULL;
	if(isset($_GET['year']) && $_GET['year']!=''){
		$search_year=$_GET['year'];
		$search_year_array=explode(',',$search_year);
		if(count($search_str)>0)
			$search_str.=" and ";
		$search_str.="year=$search_year_array[0]";
		for($i=1;$i<count($search_year_array);$i++){
			$search_str.=", ".$search_year_array[$i];
		}
	}
	
	$search_publisher_array=NULL;
	if(isset($_GET['publisher']) && $_GET['publisher']!=''){
		$search_publisher=$_GET['publisher'];
		$search_publisher_array=explode(',',$search_publisher);
		if(count($search_str)>0)
			$search_str.=" and ";
		$search_str.="publisher=$search_publisher_array[0]";
		for($i=1;$i<count($search_publisher_array);$i++){
			$search_str.=", ".$search_publisher_array[$i];
		}
	}
?>