<?php
	include("includes/header.php");
	if((!isset($_FILES['xsl'])) || $_FILES['xsl']=='')
		header("location:upload.php?error=Please fill all the details");


	session_start();
	if(!isset($_SESSION['user_type'])){
		header("location:login.php");	
	}
	else if($_SESSION['user_type']==2){
		header("location:publication-form.php");	
	}
	
	$file_name = $_FILES['xsl']['name'];
	$file_size =$_FILES['xsl']['size'];
	$file_tmp =$_FILES['xsl']['tmp_name'];

	move_uploaded_file($file_tmp,"excel/".$file_name);
	
	
	include 'excel_reader/excel_reader.php';     // include the class
	$excel = new PhpExcelReader;
	$excel->read('excel/'.$file_name);
	
	
	
	function sheetData($sheet) {
	  $author=1;
	  $title=2;
	  $year=3;
	  $stitle=4;
	  $volume=5;
	  $issue=6;
	  $doi=7;
	  $school=8;
	  $abstract=9;
	  $index_key=10;
	  $publisher=11;
	  $cname=12;
	  $cdate=13;
	  $cloc=14;
	  $cdet=15;
	  $issn=16;
	  $isbn=17;
	  $lang=18;
	  $doc=19;
	  $sub=20;
	  $acctype=21;
	  $page_start=22;
	  $page_end=23;
	  $be=24;
	  
	  include("includes/connection.php");
	  
	  $x = 2;
	  
	  // d stands for data
	  while($x <= $sheet['numRows']) {
		//all details
		$dauthor=isset($sheet['cells'][$x][$author]) ? $sheet['cells'][$x][$author]:'NA';
		str_replace("'"," ",$dauthor);
		$dtitle=isset($sheet['cells'][$x][$title]) ? $sheet['cells'][$x][$title]:'NA';
		str_replace("'"," ",$dtitle);
		$dyear=isset($sheet['cells'][$x][$year]) ? $sheet['cells'][$x][$year]:0;
		$dstitle=isset($sheet['cells'][$x][$stitle]) ? $sheet['cells'][$x][$stitle]:'NA';
		str_replace("'"," ",$dstitle);
		$dvolume=isset($sheet['cells'][$x][$volume]) ? $sheet['cells'][$x][$volume]:'NA';
		$dissue=isset($sheet['cells'][$x][$issue]) ? $sheet['cells'][$x][$issue]:'NA';
		$ddoi=isset($sheet['cells'][$x][$doi]) ? $sheet['cells'][$x][$doi]:'NA';
		$dschool=isset($sheet['cells'][$x][$school]) ? $sheet['cells'][$x][$school]:0;
		$dabstract=isset($sheet['cells'][$x][$abstract]) ? $sheet['cells'][$x][$abstract]:'NA';
		str_replace("'"," ",$dabstract);
		$dindex_key=isset($sheet['cells'][$x][$index_key]) ? $sheet['cells'][$x][$index_key]:'NA';
		str_replace("'"," ",$dindex_key);
		$dpublisher=isset($sheet['cells'][$x][$publisher]) ? $sheet['cells'][$x][$publisher]:'NA';
		$dcname=isset($sheet['cells'][$x][$cname]) ? $sheet['cells'][$x][$cname]:'NA';
		$dcdate=isset($sheet['cells'][$x][$cdate]) ? $sheet['cells'][$x][$cdate]:'NA';
		$dcloc=isset($sheet['cells'][$x][$cloc]) ? $sheet['cells'][$x][$cloc]:'NA';
		$dcdet=isset($sheet['cells'][$x][$cdet]) ? $sheet['cells'][$x][$cdet]:'NA';
		$dissn=isset($sheet['cells'][$x][$issn]) ? $sheet['cells'][$x][$issn]:'NA';
		$disbn=isset($sheet['cells'][$x][$isbn]) ? $sheet['cells'][$x][$isbn]:'NA';
		$dlang=isset($sheet['cells'][$x][$lang]) ? $sheet['cells'][$x][$lang]:'NA';
		$ddoc=isset($sheet['cells'][$x][$doc]) ? $sheet['cells'][$x][$doc]:'NA';
		$dsub=isset($sheet['cells'][$x][$sub]) ? $sheet['cells'][$x][$sub]:'NA';
		$dacctype=isset($sheet['cells'][$x][$acctype]) ? $sheet['cells'][$x][$acctype]:'NA';
		$page_start=isset($sheet['cells'][$x][$page_start]) ? $sheet['cells'][$x][$page_start]:0;
		$page_end=isset($sheet['cells'][$x][$page_end]) ? $sheet['cells'][$x][$page_end]:0;
		$book_editor=isset($sheet['cells'][$x][$be]) ? $sheet['cells'][$x][$be]:'NA';
		
		if($ddoc!='Article' && $ddoc!='Book' && $ddoc!='Book Chapter' && $ddoc!='Conference Paper'){
			$ddoc="Misc";	
		}
		
		
		//dauthor, dindexkey are array of items.
		$author_arr=explode(',',$dauthor);
		$keyword_arr=explode(';',$dindex_key);
		$author_count=count($author_arr);
		$keyword_count=count($keyword_arr);
		
		$primary=$author_arr[0];
		$secondary="No-One";
		if($author_count>1)
			$secondary=$author_arr[1];
		
		//school table insertion
		$query1="insert into school_table (`school`) values ('".$dschool."');";
		$result=mysqli_query($connection,$query1);
		$query2="update school_table set school_count=school_count+1 where school='".$dschool."';";
		$result=mysqli_query($connection,$query2);
		$query3="select sid from school_table where school='".$dschool."'";
		$result=mysqli_query($connection,$query3);
		$dsid=-1;
		if($result){
			$row=mysqli_fetch_row($result);
			$dsid=$row[0];
		}
		
		//subject table insertion
		$query1="insert into subject_table (`sub_name`) values ('".$dsub."');";
		$result=mysqli_query($connection,$query1);
		$query2="update subject_table set sub_count=sub_count+1 where sub_name='".$dsub."';";
		$result=mysqli_query($connection,$query2);
		$query3="select subid from subject_table where sub_name='".$dsub."'";
		$result=mysqli_query($connection,$query3);
		$dsub_id=-1;
		if($result){
			$row=mysqli_fetch_row($result);
			$dsub_id=$row[0];
		}
		
		
		//abstract table insertion
		$query1="insert into abstract_table (`abs`) values ('".$dabstract."');";
		$result=mysqli_query($connection,$query1);
		$query3="select abs_id from abstract_table where abs='".$dabstract."'";
		$result=mysqli_query($connection,$query3);
		$dabs_id=0;
		if($result){
			$row=mysqli_fetch_row($result);
			$dabs_id=$row[0];
		}
		
		
		//document table insertion
		$query1="insert into doctype_table (`doc_type`) values ('".$ddoc."');";
		$result=mysqli_query($connection,$query1);
		$query2="update doctype_table set doc_count=doc_count+1 where doc_type='".$ddoc."';";
		$result=mysqli_query($connection,$query2);
		$query3="select doc_id from doctype_table where doc_type='".$ddoc."'";
		$result=mysqli_query($connection,$query3);
		$ddoc_id=0;
		if($result){
			$row=mysqli_fetch_row($result);
			$ddoc_id=$row[0];
		}
		
		
		//publication table insertion
		$query="insert into publication_table (`pri_author`, `sec_author`, `doi`, `title`, `year`, `stitle`, `vol`, `issue`, `sid`, `subid`, `abs_id`, `pub`, `issn`, `isbn`, `doc_id`, `access_type`, `language`,`page_start`, `page_end`) values('".$primary."','".$secondary."','".$ddoi."','".$dtitle."',".$dyear.",'".$dstitle."','".$dvolume."','".$dissue."',".$dsid.",".$dsub_id.",".$dabs_id.",'".$dpublisher."','".$dissn."','".$disbn."',".$ddoc_id.",'".$dacctype."','".$dlang."',".$page_start.","
		.$page_end.");";
		$result=mysqli_query($connection,$query);
			  
		$query1="select slno from publication_table where abs_id=".$dabs_id;
		$result=mysqli_query($connection,$query1);
		$row=mysqli_fetch_row($result);
		$slno=$row[0];
		
		
		//book table insertion
		if($ddoc=='Book' || $ddoc=='Book Chapter'){
			$diff_pages=$page_end-$page_start;	
			$book_query="INSERT INTO `book_table`(`slno`, `doc_name`, `title`, `source`, `editor`, `pages`, `file_name`) VALUES ('{$slno}','{$ddoc}','{$dtitle}','{$dstitle}','{$book_editor}',$diff_pages,'No')";
			echo $book_query;
			$book_result=mysqli_query($connection,$book_query);
		}
		
		
		//author table insertion
		
		$auth="INSERT INTO `author_table`(`slno`, `aname`) VALUES ($slno,'".$author_arr[0]."')";
		$i=1;
		while($i<$author_count){
			$auth.=",($slno,'".$author_arr[$i]."')";
			$i++;
		}
		$result=mysqli_query($connection,$auth);
		
		//keyword table insertion
		$keyss="INSERT INTO `key_table`(`slno`, `keyword`) VALUES ($slno,'".$keyword_arr[0]."')";
		$i=1;
		while($i<$keyword_count){
			$keyss.=",($slno,'".$keyword_arr[$i]."')";
			$i++;
		}
		$result=mysqli_query($connection,$keyss);
		
		
		//conference table insertion
		$conf_query="INSERT INTO `conference_table`(`slno`, `conf_name`, `conf_date`, `conf_loc`, `con_detail`) VALUES ($slno,'".$dcname."','".$dcdate."','".$dcloc."','".$cdet."')";
		$result=mysqli_query($connection,$conf_query);
		
		$x++;
	  }
	}
	
	$excel_data = sheetData($excel->sheets[0]);  
	header("location:upload.php?message=Data Inserted");
?>    
