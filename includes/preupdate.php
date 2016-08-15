<?php
	//remove from abstract table
	if($abstract!='NA' && $abstract!='Unknown' || $abstract!=''){
		$query="delete from abstract_table where abs=$abstract";
		$run=mysqli_query($connection,$query);	
	}
	
	
	//remove from author_table
	$query="delete from author_table where slno=$slno";
	$run=mysqli_query($connection,$query);	
	
	//remove from conference table
	$query="delete from conference_table where slno=$slno";
	$run=mysqli_query($connection,$query);
		
	//remove from key table
	$query="delete from key_table where slno=$slno";
	$run=mysqli_query($connection,$query);
	
	
	//doctype,school,subject-- decrease count publication
	$query="update doctype_table set doc_count=doc_count-1 where doc_type=$document";
	$run=mysqli_query($connection,$query);
	
	//school 
	$query="update school_table set school_count=school_count-1 where school=$school";
	$run=mysqli_query($connection,$query);
	
	//subject
	$query="update subject_table set sub_count=sub_count-1 where sub_name=$subject";
	$run=mysqli_query($connection,$query);
	
	//delete from publication table
	$query="delete from publication_table where slno=$slno";
	$run=mysqli_query($connection,$query);
?>