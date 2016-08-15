<head>
<title>Home</title>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
</head>
<?php
	session_start();
	
	header('Cache-Control: no cache');
	
	include("includes/connection.php");
	if(isset($_POST['login'])){
		$user=htmlentities($_POST['username']);
		$pass=md5($_POST['password']);
		$login_query="select name,password,user_type,email from admin_table where email='".mysqli_real_escape_string($connection,$user)."'";
		$login_result=mysqli_query($connection,$login_query);
		$login_row=mysqli_fetch_row($login_result);
		if($pass!=$login_row[1]){
			header("location:login.php?error=Invalid Password Or Email do not Exist");
			exit();
		}
		else{
			$_SESSION['username']=$login_row[0];
			$_SESSION['user_type']=$login_row[2];
			$_SESSION['email']=$login_row[3];
			
			if($_SESSION['user_type']==2){
				//echo "Hello";
				header("location:publication-form.php");
			}
		}
	}
	else if(!isset($_SESSION['username'])){
		header("location:index.php");	
	}
	else if($_SESSION['user_type']==2)
		header("location:publication-form.php");
		
	include("includes/header.php");
	if(isset($_SESSION['user_type']) && $_SESSION['user_type']==0)
		adminnav();
	else if(isset($_SESSION['user_type']) && $_SESSION['user_type']==1)
		usernav();
		
	if(isset($_GET['message']) && $_GET['message']=='Data Updated')
		echo "<center>Data Updated</center>";
?>
<style>
#home_limit_text{
	width:100px;
}
td{
	max-width:200px;
	max-height:10px;
	overflow:auto;	
}
#limit{
	margin-right:100px;
	float:right;	
}
th{
	text-align:center;
	background-color:#F93;	
}
.table-div{
	max-height:400px;
	max-width:1200px;
	overflow:auto;
	margin-top:50px;	
}
</style>
<div>
<center><h2><u>Recent Records</u></h2></center>
<form action='home.php' method="post" id='limit'>
	<input type='number' size=20 id='home_limit_text' name='num' placeholder="Eg. 50"></input>
    <input type='submit' value='Go' id='limit_submit' name='submit'/>
</form>
</div>
<?php

	$limit=10;
	if(isset($_POST['submit']) && isset($_POST['num']))
		$limit=htmlentities($_POST['num']);
	
	$recent_query="SELECT `pri_author`, `sec_author`, `doi`, `title`, `year`, `stitle`, `vol`, `issue`, `school`, `sub_name`, `abs_id`, `pub`, `issn`, `isbn`, `doc_type`, `access_type`, `language`, `slno`, `page_start`, `page_end` FROM `publication_table` p,`school_table` sc,subject_table sub,doctype_table d where d.doc_id=p.doc_id and p.sid=sc.sid and p.subid=sub.subid order by slno desc limit ".mysqli_real_escape_string($connection,$limit);
	$result=mysqli_query($connection,$recent_query);
	//echo $recent_query;
?>


<center>
<div class="table-div">
<table class="table table-bordered">
    <thead>
      <tr>
      	<th>#</th>
        <th>Edit</th>
        <th>Primary Author</th>
        <th>Secondary Author</th>
        <th>DOI</th>
        <th>Title</th>
        <th>Year</th>
        <th>Source Title</th>
        <th>Volume</th>
        <th>Issue</th>
        <th>School</th>
        <th>Subject</th>
        <th>Publisher</th>
        <th>ISSN</th>
        <th>ISBN</th>
        <th>Document Type</th>
        <th>Access Type</th>
        <th>Language</th>
        <th>Page Start</th>
        <th>Page End</th>
        
      </tr>
    </thead>
    <tbody>
      <?php 
	  	if(!$result)
			die("Error!");
		$i=1;
		while($row=mysqli_fetch_row($result)){
			echo "<td>$i</td><td><a href='record-edit.php?record={$row[17]}'>Edit</a></td><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]
			."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]
			."</td><td>".$row[11]."</td><td>".$row[12]."</td><td>".$row[13]."</td><td>".$row[14]."</td><td>".$row[15]."</td><td>".$row[16]."</td><td>".$row[18]."</td><td>".$row[19]."</td>";
			echo "</tr>";
			$i++;
		}
	  ?>
    </tbody>
  </table>
  </div>
</center>