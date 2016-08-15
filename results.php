<head>
<title>All Results</title>
</head>
<script>
	function showall(){
		$("#myModal").modal();
	}
</script>
<style>
	body{
		padding:0px;
		margin:0px;	
	}
	
		/* unvisited link */
	a:link {
		color: blue;
	}
	
	/* visited link */
	a:visited {
		color: blue;
	}
	
	/* mouse over link */
	a:hover {
		color: blue;
	}
	
	/* selected link */
	a:active {
		color: blue;
	}
	
	a{
		text-decoration:none;	
	}
	
	#more_res{
		border-left:3px solid #F60;
		border-right:3px solid #F60;
		//border:3px solid #F60;
		width:800px;
		height:450px;
		overflow:auto;
		text-align:left;
		//padding:20px;
		line-height:20px;
	}
	#info_about_search{
		font-size:20px;
		padding:30px;
		border-left:3px solid #F60;
		border-right:3px solid #F60;
		height:auto;
		width:740px;	
	}
</style>
<?php
	include("includes/header.php");
	include('includes/connection.php');
	if(!isset($_GET['col']) || !isset($_GET['key'])){
		header("location:index.php");
	}
	$column=htmlentities($_GET['col']);
	$key=htmlentities($_GET['key']);
	
	
	if(htmlentities($_GET['col'])=='author'){
		$query="select distinct aname from author_table where aname like ('%{$key}%')";
	}
	else if(htmlentities($_GET['col'])=='school'){
		$query="select school from school_table where school like ('%{$key}%')";
	}
	else if(htmlentities($_GET['col'])=='subject'){
		$query="select sub_name from subject_table where sub_name like ('%{$key}%')";
	}
	else if(htmlentities($_GET['col'])=='title'){
		$query="select title from publication_table where title like ('%{$key}%')";
	}
	else if(htmlentities($_GET['col'])=='publisher'){
		$query="select distinct pub from publication_table where pub like ('%{$key}%')";	
	}
	else if(htmlentities($_GET['col'])=='year'){
		$query="select distinct year from publication_table where year like ('%{$key}%')";	
	}
	
	session_start();
	unset($_SESSION['slarray']);
	
	$i=1;
	$result=mysqli_query($connection,$query);
	$counter=mysqli_num_rows($result);	
?>



<center>
<div id='info_about_search'>
	<code>
    	<u>Showing Results for <mark><?php echo "'$column'" ?></mark> And Keyword 
        <mark><?php echo "'$key'"?></mark> <br/></u>( <?php echo $counter; ?> Results Found ) 
   	</code>
</div>
<div id='more_res'>
	<?php
		echo "<ul>";
		while($row=mysqli_fetch_row($result)){
			echo "<div class='searchbar_res'> $i. &nbsp; &nbsp;<a id='sch' href='search.php?{$_GET['col']}={$row[0]}'>$row[0]</a></div>";
			$i++;
		}
		echo "</ul>";
		
	?>

</div>
</center>