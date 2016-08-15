<?php 
	if(!isset($_SESSION['slarray']))
		header("location:index.php");
	$sidebar_query_string=NULL;
	$i=0;
	foreach($_SESSION['slarray'] as $serialno){
		if($i==0)
			$sidebar_query_string.="slno=".$serialno;
		else
			$sidebar_query_string.=" OR slno=".$serialno;
		$i=1;
	}
	
?>