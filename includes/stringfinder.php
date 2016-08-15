<!-- Returns the filtered string on which search is to performed -->
<script>
/*if(window.performance){
	if(performance.navigation.type  == 1 ){
       alert('page reloaded');
   }
}*/
</script>

<?php
	$str=NULL;
	$search_path=NULL;
	
	$curr_query_string=$_SERVER['QUERY_STRING'];
	$_SESSION['prev_get']=NULL;
	$query_string=NULL;
	
	if(isset($_GET['col']) && $_GET['col']=="all"){
		$query_string=1;
	}
	else{
			//special case when title is searched
			$title=NULL;
			if(isset($_GET['title']) && $_GET['title']!=''){
				$search_path.=$_GET['title'];
				$title=$_GET['title'];	
			}
			
			$auth_array=NULL;
			if(isset($_GET['author']) && $_GET['author']!=''){
				$author=$_GET['author'];
				$auth_array=explode(',',$author);
			}
			
			$subj_array=NULL;
			if(isset($_GET['subject']) && $_GET['subject']!=''){
				$subject=$_GET['subject'];
				$subj_array=explode(',',$subject);
			}
			
			$docu_array=NULL;
			if(isset($_GET['document']) && $_GET['document']!=''){
				$document=$_GET['document'];
				$docu_array=explode(',',$document);
			}
			
			$scho_array=NULL;
			if(isset($_GET['school']) && $_GET['school']!=''){
				$school=$_GET['school'];
				$scho_array=explode(',',$school);
			}
			
			$year_array=NULL;
			if(isset($_GET['year']) && $_GET['year']!=''){
				$year=$_GET['year'];
				$year_array=explode(',',$year);
			}
			
			$publisher_array=NULL;
			if(isset($_GET['publisher']) && $_GET['publisher']!=''){
				$publisher=$_GET['publisher'];
				$publisher_array=explode(',',$publisher);
			}
			
			
			
			//joining the tables and finding out index from masters...
			
			//author
			$author_array=array();
			if(count($auth_array)>0){
				$author_query="select slno from author_table where ";
				$author_query.="aname='".$auth_array[0]."' ";
				$search_path.=" &rarr; $auth_array[0]";
				for($i=1;$i<count($auth_array);$i++){
					$search_path.=", $auth_array[$i]";
					$author_query.="OR aname='".$auth_array[$i]."' ";
				}
				
				$result=mysqli_query($connection,$author_query);
				while($row=mysqli_fetch_row($result))
					array_push($author_array,$row[0]);
			}
			//echo count($author_array);
			
			//subject
			$subject_array=array();
			if(count($subj_array)>0){
				$subject_query="select subid from subject_table where ";
				$subject_query.="sub_name='".$subj_array[0]."' ";
				$search_path.=" &rarr; $subj_array[0]";
				for($i=1;$i<count($subj_array);$i++){
					$search_path.=", $subj_array[$i]";
					$subject_query.="OR sub_name='".$subj_array[$i]."' ";
				}
				
				$result=mysqli_query($connection,$subject_query);
				while($row=mysqli_fetch_row($result))
					array_push($subject_array,$row[0]);
			}
			//echo count($subject_array);
			
			//document
			$document_array=array();
			if(count($docu_array)){
				$document_query="select doc_id from doctype_table where ";
				$document_query.="doc_type='".$docu_array[0]."' ";
				$search_path.=" &rarr; $docu_array[0]";
				for($i=1;$i<count($docu_array);$i++){
					$search_path.=", $docu_array[$i]";
					$document_query.="OR doc_type='".$docu_array[$i]."' ";
				}
				
				$result=mysqli_query($connection,$document_query);
				while($row=mysqli_fetch_row($result))
					array_push($document_array,$row[0]);
			}
			//echo count($document_array);
			
			//school
			$school_array=array();
			if(count($scho_array)){
				$school_query="select sid from school_table where ";
				$school_query.="school='".$scho_array[0]."' ";
				$search_path.=" &rarr; $scho_array[0]";
				for($i=1;$i<count($scho_array);$i++){
					$search_path.=", $scho_array[$i]";
					$school_query.="OR school='".$scho_array[$i]."' ";
				}
				
				$result=mysqli_query($connection,$school_query);
				while($row=mysqli_fetch_row($result))
					array_push($school_array,$row[0]);
			}
			//echo count($school_array);
			
				
			//year,publisher directly
			
			
			//start.............
			//writing the filterssss............
			//author
			
			if(count($author_array)>0)
				$query_string.=" (slno=".$author_array[0];
			for($i=1;$i<count($author_array);$i++){
				$query_string.=" OR slno=".$author_array[$i];
			}
			if(count($author_array)>0)
				$query_string.=")";
		
			//subject,document,school,year,publisher
			//subject
		
			
			if(count($subject_array)>0){
				if(count($query_string)>0)
					$query_string.=" AND ";
				$query_string.=" (subid=".$subject_array[0];
			}
			for($i=1;$i<count($subject_array);$i++){
				$query_string.=" OR subid=".$subject_array[$i];
			}
			if(count($subject_array)>0)
				$query_string.=")";
			
			//document
			if(count($document_array)>0){
				if(count($query_string)>0)
					$query_string.=" AND ";
				$query_string.=" (doc_id=".$document_array[0];
			}
			for($i=1;$i<count($document_array);$i++){
				$query_string.=" OR doc_id=".$document_array[$i];
			}
			if(count($document_array)>0)
				$query_string.=")";
			
			//school
			if(count($school_array)>0){
				if(count($query_string)>0)
					$query_string.=" AND ";
				$query_string.=" (sid=".$school_array[0];
			}
			for($i=1;$i<count($school_array);$i++){
				$query_string.=" OR sid=".$school_array[$i];
			}
			if(count($school_array)>0)
				$query_string.=")";
			
			//year
			if(count($year_array)>0){
				if(count($query_string)>0)
					$query_string.=" AND ";
				$query_string.=" (year= ".$year_array[0];
				$search_path.=" &rarr; $year_array[0]";;
			}
			for($i=1;$i<count($year_array);$i++){
				$search_path.=", $year_array[$i]";
				$query_string.=" OR year= ".$year_array[$i];
			}
			if(count($year_array)>0)
				$query_string.=")";
			
			//publisher
			if(count($publisher_array)>0){
				if(count($query_string)>0)
					$query_string.=" AND ";
				$search_path.=" &rarr; $publisher_array[0]";
				$query_string.=" (pub= '".$publisher_array[0]."'";
			}
			for($i=1;$i<count($publisher_array);$i++){
				$query_string.=" OR pub= '".$publisher_array[$i]."'";
				$search_path.=", $publisher_array[$i]";
			}
			if(count($publisher_array)>0)
				$query_string.=")";
			
			
			//for tiitle wise searching
			if($title!=''){
				if(count($query_string)>0)
						$query_string.=" AND ";
				$query_string.=" title like '%".$title."%'";
			}
	
	}
	
	
	
	
	
	//session_work
	
	session_start();
	if($query_string!=NULL){
		$slquery="select slno from publication_table where ".$query_string;
		$slresult=mysqli_query($connection,$slquery);
		$slarray=array();
		
		
		while($slrow=mysqli_fetch_row($slresult)){
			array_push($slarray,$slrow[0]);	
		}
		
		$intersect=array();
		if(isset($_SESSION['slarray'])){
			$intersect=array_intersect($_SESSION['slarray'],$slarray);
			$_SESSION['slarray']=$intersect;
		}
		else if($query_string!=NULL && !isset($_SESSION['slarray'])){
			$_SESSION['slarray']=$slarray;
		}
		
		//search path
		if(isset($_SESSION['search_path']) && $_SESSION['prev_get']!=$curr_query_string){
			$_SESSION['search_path']=$_SESSION['search_path'].$search_path;
		}
		else if($query_string!=NULL && !isset($_SESSION['search_path'])){
			$_SESSION['search_path']=$search_path;
		}	
	}
	$_SESSION['prev_get']=$curr_query_string;
?>