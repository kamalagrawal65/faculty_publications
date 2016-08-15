<title>Search</title>
<?php
	include('includes/connection.php');
	include('includes/stringfinder.php');
	include('sidebar.php');
	//include('includes/showresdet.php');
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>



<style>
.big{
	margin-left:240px;
	width:1100px;
	padding-top:3px;
	height:35px;
	color:black;
	padding-left:3px;
	padding-top:5px;
	background-color:#CCC;
	text-align:left;
	margin-bottom:5px;
	border-top:1px solid green;
}
</style>

<center>
	<?php 
	if(isset($_GET['author']) || isset($_GET['subject']) || isset($_GET['document']) ||
	 	isset($_GET['school']) || isset($_GET['year']) || isset($_GET['publisher'])
		 || isset($_GET['title']) || isset($_SESSION['slarray'])){
			echo "<body onload=loadDoc()>";	
		 }
	else
		echo "<body>";		
		echo "<div class='big'><u><b> Search Path:</b></u>";
    
	
	//all downloads-again
	$all_query="select count(*) from publication_table where (".$sidebar_query_string.") and doc_id in (select doc_id from doctype_table)";
	$all_result=mysqli_query($connection,$all_query);
	$all_row=mysqli_fetch_row($all_result);
	$all_count=$all_row[0];
	
	
	if(isset($_SESSION['search_path']))
	 	echo "<b><i>".$_SESSION['search_path']."  </i><span style='float:right'> Total Results ($all_count)</span></b></code></div>";
	else if(isset($_SESSION['slarray'])==1)
		echo "<b><i>"."Showing All Results  </i> <span style='float:right;'> Total Results ($all_count)</span></b></code></div>";
	else
		echo "Showing Results for Nothing  </code></div>";
		echo "</div>";
	
	?>
</center>
<?php include("includes/horizontalnavbar.php"); ?>
<div id='results'></div>

</div>

</body>

<script src="js/search.js"></script>
