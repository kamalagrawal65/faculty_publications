<style>
#book-form{
	margin-top:20px;
}
#book-box{
	width:300px;
	height:30px;
	padding:10px;
}
#classified{
	width:150px;
	height:30px;	
}
#sbook-btn{
	height:30px;
	background-color:#603;
	color:white;
	width:100px;
	border-radius:5px;	
}
</style>
<center>
<form id='book-form' action="book-portal.php" method="post">
<select name='book-classified' id='classified'>
	<option value="title">Title</option>
    <option value="author">Author</option>
</select>

<input type="text" name='book-box' id='book-box'/>
<input type="submit" value="Search" name='book-search' id='sbook-btn'/>
</form>
<center>



<?php

	if(isset($_POST['book-search'])){
		$col=htmlentities($_POST['book-classified']);
		$search_str=htmlentities($_POST['book-box']);
		$search_query=NULL;
		if($col=='author'){
			$search_query="SELECT b.slno, `doc_name`, b.title, `source`,`pri_author`, `file_name` FROM `book_table` b,publication_table p WHERE p.slno=b.slno and pri_author like ('%".$search_str."%')";
		}
		else if($col=='title'){
			$search_query="SELECT b.slno, `doc_name`, b.title, `source`,`pri_author`, `file_name` FROM `book_table` b,publication_table p WHERE p.slno=b.slno and b.title like ('%".$search_str."%')";
		}
		//echo $search_query;
		$search_result=mysqli_query($connection,$search_query);
?>

<center>
<hr/>
<div class="container">
  <div class="table-responsive">
  <h3><u>Search Result</u></h3>
<table id='table2' class="table table-bordered">
	<th>#</th>
    <th>Document Type</th>
    <th>Title</th>
    <th>Source</th>
    <th>Author</th>
	<th>Upload File</th>
    <th>Submit</th>
  <?php
  	if(!$search_result)
		echo "No Results Found"; 
  	else{
		$i=1;
  		while($row=mysqli_fetch_row($search_result)){
			echo "<tr><td>$i</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>
			<td>
				<form action='book-portal.php' method='post' enctype='multipart/form-data' id='img-upload-form'>
				<input style='padding-left:30px;' type='file' name='file' id='file'></input>
				<input type='hidden' value='{$row[0]}' name='record'/>
			</td>
			<td>
				<input type='submit' value='Upload' id='submit' name='submit'></input>
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



<?php
	}
?>
