<?php
	if(!isset($_POST['submit'])){
		header("location:download.php");
		exit();	
	}
	
	session_start();
	if(!isset($_SESSION['user_type'])){
		header("location:login.php");
		exit();
	}
	
	else if(isset($_SESSION['user_type']) && $_SESSION['user_type']==2){
		header("location:publication-form.php");
		exit();
	}
	
	include("includes/connection.php");
	$author=isset($_POST['author']) && $_POST['author']!='' ?htmlentities($_POST['author']):"NA";
	$document=isset($_POST['document']) && $_POST['document']!='' ?htmlentities($_POST['document']):"NA";
	$publisher=isset($_POST['publisher']) && $_POST['publisher']!='' ?htmlentities($_POST['publisher']):"NA";
	$year=isset($_POST['year']) && $_POST['year']!='' ?htmlentities($_POST['year']):"NA";
	$school=isset($_POST['school']) && $_POST['school']!='' ?htmlentities($_POST['school']):"NA";
	$subject=isset($_POST['subject']) && $_POST['subject']!='' ?htmlentities($_POST['subject']):"NA";
	$limit=isset($_POST['limit']) && $_POST['limit']!='' ?htmlentities($_POST['limit']):"NA";

	//echo "$author<br/>$document<br/>$publisher<br/>$year<br/>$school<br/>$subject<br/>$limit<br/>";;

	$query_string=NULL;
	if($author=="NA" && $document=="NA" && $publisher=="NA" && $year=="NA" && $school=="NA" && $subject=="NA"){
		$query_string=1;
	}
	
	else{
		//author query
		if($author!="NA"){
			$query_string=' (slno=';
			$query="select distinct slno from author_table where aname='".$author."'";
			$result=mysqli_query($connection,$query);
			$row=mysqli_fetch_row($result);
			$query_string=$query_string.$row[0];
			while($row=mysqli_fetch_row($result)){
				$query_string=$query_string." or slno=".$row[0];	
			}
			$query_string.=")";
		}	
		
		//document query
		if($document!="NA"){
			if(count($query_string)>0)
				$query_string.=' and p.doc_id=';
			else
				$query_string.=' p.doc_id=';
				
			$query="select doc_id from doctype_table where doc_type='".$document."'";
			$result=mysqli_query($connection,$query);
			$row=mysqli_fetch_row($result);
			$query_string.=$row[0];
			
		}
		
		//publisher{
		if($publisher!="NA"){
			if(count($query_string)>0)
				$query_string.=" and pub='".$publisher."'";
			else
				$query_string.=" pub='".$publisher."'";			
		}
		
		//year
		if($year!="NA"){
			if(count($query_string)>0)
				$query_string.=" and year='".$year."'";	
			else
				$query_string.=" year='".$year."'";
		}
		
		//school
		if($school!="NA"){
			if(count($query_string)>0)
				$query_string.=' and p.sid=';
			else
				$query_string.=' p.sid=';
				
			$query="select sid from school_table where school='".$school."'";
			$result=mysqli_query($connection,$query);
			$row=mysqli_fetch_row($result);
			$query_string.=$row[0];
			
		}
		
		//subject
		if($subject!="NA"){
			if(count($query_string)>0)
				$query_string.=' and p.subid=';
			else
				$query_string.=' p.subid=';
				
			$query="select subid from subject_table where sub_name='".$subject."'";
			$result=mysqli_query($connection,$query);
			$row=mysqli_fetch_row($result);
			$query_string.=$row[0];
			
		}
		
	}
	
	$query="SELECT `doi`, `title`, `year`, `stitle`, `vol`, `issue`, `school`, `sub_name`, `abs`, `pub`, `issn`, `isbn`, `doc_type`, `access_type`, `language`, `slno`, `page_start`, `page_end` FROM `publication_table` p,`school_table` sc,subject_table sub,doctype_table d,abstract_table ab where d.doc_id=p.doc_id and p.sid=sc.sid and p.subid=sub.subid and ab.abs_id=p.abs_id and $query_string order by slno desc";
	
	if($limit!='NA')
		$query=$query." limit ".$limit;	
	
	
	$result=mysqli_query($connection,$query);	
	
	
	$head = array(array("Authors","Keywords","DOI","Title","Year","Source Title","Volume","Issue","School","Subject",
	"Abstract","Publisher","ISSN","ISBN","Document Type","Access Type","Language","Page Start","Page End","Conference Name","Conference Date","Conference Location","Conference Detail"));
	
	//echo $query;
	include("excel-format.php");	

?>