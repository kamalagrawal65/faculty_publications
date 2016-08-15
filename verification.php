<head>
<title>Verification</title>
</head>
<script src="bootstrap/jquery.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
<style>
th{
	text-align:center;
	background-color:#F90;
	COLOR:WHITE;	
}
td{
	text-align:center;
}
table{
	margin-top:40px;	
}
</style>
<?php
	include("includes/connection.php");
	include("includes/header.php");
	
	session_start();
	if(!isset($_SESSION['user_type'])){
		header("location:login.php");
		exit();
	}
	
	else if(isset($_SESSION['user_type']) && $_SESSION['user_type']==2){
		header("location:publication-form.php");
		exit();
	}
	
	if(isset($_SESSION['user_type']) && $_SESSION['user_type']==0)
		adminnav();
	else if(isset($_SESSION['user_type']) && $_SESSION['user_type']==1)
		usernav();
		
	if(isset($_GET['message']) && $_GET['message']=='Data Inserted')
		echo "<center>Data Inserted</center>";
	if(isset($_GET['message']) && $_GET['message']=='Data Updated')
		echo "<center>Data Updated</center>";
		
	if(isset($_GET['action']) && $_GET['action']=='delete' && $_GET['fid']){
		$delete_query="delete from verification_table where fid=".$_GET['fid'];
		$delete_result=mysqli_query($connection,$delete_query);	
	}
	
?>
<center>
<div class="container">
  <div class="table-responsive"> 
<table class="table table-bordered">
	<th>Form ID</th>
    <th>UserName</th>
    <th>Title</th>
    <th>Document</th>
    <th>Publisher</th>
    <th>School</th>
    <th>Year</th>
    <th>Edit</th>
	<th>Delete</th>
    
  <?php
  	$query="SELECT `fid`, `author`, `title`, `stitle`, `year`, `school`, `subject`, `publisher`, `language`, `document`, `volume`, `issue`, `issn`, `isbn`, `pages`, `book_editor`, `page_start`, `page_end`, `conf_name`, `conf_date`, `conf_loc`, `conf_detail`, `abstract`, `keyword`,`username` FROM `verification_table`";
	$result=mysqli_query($connection,$query);
	if(!$result)
		echo "No Results Found"; 
  	else{
  		while($row=mysqli_fetch_row($result)){
			echo "<tr><td>$row[0]</td><td>$row[24]</td><td>$row[2]</td><td>$row[9]</td><td>$row[7]</td>
			<td>$row[5]</td><td>$row[4]</td><td><a href='edit.php?fid=".$row[0]."'>Edit</a></td>
			<td><a href='verification.php?action=delete&fid=".$row[0]."'>Delete</a></td></tr>";
		}
  }
  ?>
</table>
</div>
</div>
</center>