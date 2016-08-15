<?php
	$query_string=NULL;
	if(isset($_POST['submit'])){	
		if(!empty($_POST['author'])){
			$query_string.='author=';
			$i=0;
			foreach($_POST['author'] as $selected){
				if($i!=0)
					$query_string.=',';
				$query_string.=htmlentities($selected);
				$i=1;
			}
		}
		
		if(!empty($_POST['subject'])){
			if(count($query_string)>0)
				$query_string.='&';
			$query_string.='subject=';
			$i=0;
			foreach($_POST['subject'] as $selected){
				if($i!=0)
					$query_string.=',';
				$query_string.=htmlentities($selected);
				$i=1;
			}
		}
		
		if(!empty($_POST['document'])){
			if(count($query_string)>0)
				$query_string.='&';
			$query_string.='document=';
			$i=0;
			foreach($_POST['document'] as $selected){
				if($i!=0)
					$query_string.=',';
				$query_string.=htmlentities($selected);
				$i=1;
			}
		}
		
		if(!empty($_POST['school'])){
			if(count($query_string)>0)
				$query_string.='&';
			$query_string.='school=';
			$i=0;
			foreach($_POST['school'] as $selected){
				if($i!=0)
					$query_string.=',';
				$query_string.=htmlentities($selected);
				$i=1;
			}
		}
		
		if(!empty($_POST['year'])){
			if(count($query_string)>0)
				$query_string.='&';
			$query_string.='year=';
			$i=0;
			foreach($_POST['year'] as $selected){
				if($i!=0)
					$query_string.=',';
				$query_string.=htmlentities($selected);
				$i=1;
			}
		}
		
		if(!empty($_POST['publisher'])){
			if(count($query_string)>0)
				$query_string.='&';
			$query_string.='publisher=';
			$i=0;
			foreach($_POST['publisher'] as $selected){
				if($i!=0)
					$query_string.=',';
				$query_string.=htmlentities($selected);
				$i=1;
			}
		}
		if(count($query_string)>0)
			$query_string.="&col=journal";
	}
	header("location:../search.php?".$query_string);
?>