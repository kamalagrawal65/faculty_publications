<?php
	//inseert into database

	//dauthor, dindexkey are array of items.
		$author_arr=explode(',',$author);
		$keyword_arr=explode(';',$keyword);
		$author_count=count($author_arr);
		$keyword_count=count($keyword_arr);
		
		$primary=$author_arr[0];
		$secondary="No-One";
		if($author_count>1)
			$secondary=$author_arr[1];
		
		//school table insertion
		$query2="update school_table set school_count=school_count+1 where school='".$school."';";
		$result=mysqli_query($connection,$query2);
		$query3="select sid from school_table where school='".$school."'";
		$result=mysqli_query($connection,$query3);
		$dsid=-1;
		if($result){
			$row=mysqli_fetch_row($result);
			$dsid=$row[0];
		}
		
		//subject table insertion
		$query1="insert into subject_table (`sub_name`) values ('".$subject."');";
		$result=mysqli_query($connection,$query1);
		$query2="update subject_table set sub_count=sub_count+1 where sub_name='".$subject."';";
		$result=mysqli_query($connection,$query2);
		$query3="select subid from subject_table where sub_name='".$subject."'";
		$result=mysqli_query($connection,$query3);
		$dsub_id=-1;
		if($result){
			$row=mysqli_fetch_row($result);
			$dsub_id=$row[0];
		}
		
		
		//abstract table insertion
		$query1="insert into abstract_table (`abs`) values ('".$abstract."');";
		$result=mysqli_query($connection,$query1);
		$query3="select abs_id from abstract_table where abs='".$abstract."'";
		$result=mysqli_query($connection,$query3);
		$dabs_id=0;
		if($result){
			$row=mysqli_fetch_row($result);
			$dabs_id=$row[0];
		}
		
		
		//document table insertion
		$query2="update doctype_table set doc_count=doc_count+1 where doc_type='".$document."';";
		$result=mysqli_query($connection,$query2);
		$query3="select doc_id from doctype_table where doc_type='".$document."'";
		$result=mysqli_query($connection,$query3);
		$ddoc_id=0;
		if($result){
			$row=mysqli_fetch_row($result);
			$ddoc_id=$row[0];
		}
		
		
		//publication table insertion
		$query="insert into publication_table (`pri_author`, `sec_author`, `doi`, `title`, `year`, `stitle`, `vol`, `issue`, `sid`, `subid`, `abs_id`, `pub`, `issn`, `isbn`, `doc_id`, `access_type`, `language`) values('".$primary."','".$secondary."','".$doi."','".$title."',".$year.",'".$source."','".$volume."','".$issue."',".$dsid.",".$dsub_id.",".$dabs_id.",'".$publisher."','".$issn."','".$isbn."',".$ddoc_id.",'".$access_type."','".$language."');";
		$result=mysqli_query($connection,$query);
			  
		
		$query1="select slno from publication_table where abs_id=".$dabs_id." and doi='".$doi."'";
		$result=mysqli_query($connection,$query1);
		echo $query1;
		$row=mysqli_fetch_row($result);
		$slno=$row[0];
		
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
		$conf_query="INSERT INTO `conference_table`(`slno`, `conf_name`, `conf_date`, `conf_loc`, `con_detail`) VALUES ($slno,'".$conf_name."','".$conf_date."','".$conf_loc."','".$conf_det."')";
		$result=mysqli_query($connection,$conf_query);
		
		
?>