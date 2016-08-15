<head>
<title>Download</title>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
</head>


<?php
	include("includes/connection.php");
	include("includes/header.php");
	
	
	session_start();
	if(!isset($_SESSION['username'])){
		header("location:login.php");	
	}
	else if($_SESSION['user_type']==2)
		header("location:publication-form.php");
	
	if($_SESSION['user_type']==0)
		adminnav();
	else if($_SESSION['user_type']==1)
		usernav();
	
	function author_dropdown(){
		$connection=$GLOBALS['connection'];
		$query="select distinct aname from author_table";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22' placeholder='All' list='author' name='author'><datalist id='author' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
	function publisher_dropdown(){
		$connection=$GLOBALS['connection'];
		$query="select distinct pub from publication_table";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22' placeholder='All' list='publisher' name='publisher'><datalist id='publisher' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
	function year_dropdown(){
		$connection=$GLOBALS['connection'];
		$query="select distinct year from publication_table";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22' placeholder='All' list='year' name='year'><datalist id='year' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
	function school_dropdown(){
		$connection=$GLOBALS['connection'];
		$query="select school from school_table";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22' placeholder='All' list='school' name='school'><datalist id='school' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
	function subject_dropdown(){
		$connection=$GLOBALS['connection'];
		$query="select sub_name from subject_table";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22' placeholder='All' list='subject' name='subject'><datalist id='subject' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
	function document_dropdown(){
		$connection=$GLOBALS['connection'];
		$query="select doc_type from doctype_table";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22' placeholder='All' list='document' name='document'><datalist id='document' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
?>


<style>
form{
	margin-top:40px;
	background-color:#F93;
	line-height:40px;
	width:400px;
	padding:20px;
}
.col22{
	height:30px;
	width:200px;	
}
#submit{
	margin-top:20px;
	width:200px;	
	height:40px;
}
</style>

<center>
<form action="download-data.php" method="post">
	<table>
    	<tr>
        	<td class='col1'>Limit to</td>
        	<td class='col2'><input type="text" placeholder="Eg. 100" name="limit" class="col22"></td>
        </tr>
    	<tr>
        	<td class='col1'>Author</td>
        	<td class='col2'><?php author_dropdown(); ?></td>
        </tr>
        <tr>
        	<td class='col1'>Publisher</td>
        	<td class='col2'><?php publisher_dropdown(); ?></td>
        </tr>
        <tr>
        	<td class='col1'>Year</td>
        	<td class='col2'><?php year_dropdown(); ?></td>
        </tr>
        <tr>
        	<td class='col1'>School</td>
        	<td class='col2'><?php school_dropdown(); ?></td>
        </tr>
        <tr>
        	<td class='col1'>Subject</td>
        	<td class='col2'><?php subject_dropdown(); ?></td>
        </tr>
        <tr>
        	<td class='col1'>Document</td>
        	<td class='col2'><?php document_dropdown(); ?></td>
        </tr>
        <tr>
        	<td class='col1'></td>
        	<td class='col2'> <input name='submit' type="submit" value="Download" id='submit'/></td>
        </tr>
        
    </table>
    
</form>
</center>