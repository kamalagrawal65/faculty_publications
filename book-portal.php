<head>
<title>Book Image Upload</title>
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
#table1{
	margin-top:20px;	
}
#table2{
	margin-top:3px;	
}
</style>

<?php
	include("includes/header.php");
	include("includes/connection.php");
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
	
	include("includes/book-nav.php");
	
	
	
	
	
	if(isset($_POST['submit']) && (isset($_FILES['file'])) && $_FILES['file']!=''){
		$slno=$_POST['record'];
		$file_name = $_FILES['file']['name'];
		$file_size =$_FILES['file']['size'];
		$file_tmp =$_FILES['file']['tmp_name'];
		$file_name=$slno.".png";
		
		move_uploaded_file($file_tmp,"images/books/".$file_name);
		$query="update book_table set file_name='".$file_name."' where slno=$slno";
	//	echo $query;
		$result=mysqli_query($connection,$query);
		if(!$result){
			die("No Book Found");	
		}
		echo "<center><b>File Uploaded</b></center>";
	}
	
	
		
	$book_query="SELECT b.slno, `doc_name`, b.title, `source`,`pri_author`, `file_name` FROM `book_table` b,publication_table p WHERE p.slno=b.slno and `file_name`='No'";
	//echo $book_query;
	$book_result=mysqli_query($connection,$book_query);

?>
<center>
<div class="container">
  <div class="table-responsive">
  <h3><u>Books Without Image</u></h3>
<table id='table1' class="table table-bordered">
	<th>#</th>
    <th>Document Type</th>
    <th>Title</th>
    <th>Source</th>
    <th>Author</th>
	<th>Upload File</th>
    <th>Submit</th>
  <?php
  	if(!$book_result)
		echo "No Results Found"; 
  	else{
		$i=1;
  		while($row=mysqli_fetch_row($book_result)){
			echo "<tr><td>$i</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>
			<td>
				<form action='book-portal.php' method='post' enctype='multipart/form-data' id='img-upload-form'>
				<input style='padding-left:30px;' type='file' name='file' id='file'></input>
				<input type='hidden' value='{$row[0]}' name='record'/>
			</td>
			<td>
				<input type='submit' value='Upload' id='submit' name='update-submit'></input>
				</form>
			</td>
			</tr>";
			$i++;
		}
  }
  ?>
</table>
</div>
</div>
</center>