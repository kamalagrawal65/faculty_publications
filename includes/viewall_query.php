<style>
.list5{
	list-style-type:none;
	padding-left:5px;
	margin-left:20px;	
}
.cbox{
	float:left;	
}
#modal-submit{
	margin-bottom:0px;
	margin-top:20px;
	border-radius:5px;
	height:32px;
	background-color:#F60;
	color:#000;
	width:320px;	
}
</style>

<?php
	session_start();
	include('connection.php');
	
	
	//year from index
	if($_GET['filter']=='index_year'){
		$query="select year,count(*) from publication_table group by year order by year desc";
		$result=mysqli_query($connection,$query);
		$counter=mysqli_num_rows($result);
		echo "<center>( $counter Results Found... )</center>";
		echo "<form method='post' action='includes/posttoget.php'>";
		while($row=mysqli_fetch_row($result)){
			echo "<div class='pop-data'>
		<input type='checkbox' class='cbox year' value='".$row[0]."' name='year[]'><a href='search.php?year=".$row[0]."'><li class='list5'>".$row[0]." (".$row[1].")</li></a></input>
			</div>";
         }				
		 echo "<input type='submit' value='Search' name='submit' id='modal-submit'>";
		 echo "</form>";
	}
	
	//year
	else {
		include("complete_filtered_search_string.php");
		if($_GET['filter']=='year'){
			$query="select distinct year,count(*) from publication_table where ". $sidebar_query_string ." group by year order by year desc";
			$result=mysqli_query($connection,$query);
			$counter=mysqli_num_rows($result);
			echo "<center>( $counter Results Found... )</center>";
			echo "<form method='post' action='includes/posttoget.php'>";
			while($row=mysqli_fetch_row($result)){
				echo "<div class='pop-data'><input type='checkbox' class='year cboxleft' value='".$row[0]."' name='year[]'><a href='search.php?year=".$row[0]."'><li class='modal-data'>".$row[0]." (".$row[1].")</li></a></input></div>";	
			 }
			 echo "<input type='submit' value='Search' name='submit' id='modal-submit'>";
		 	echo "</form>";
		}
		
		//author
		else if($_GET['filter']=='author'){
			$query="select aname,count(*) as counter from author_table where ". $sidebar_query_string ." group by aname order by counter desc";
			$result=mysqli_query($connection,$query);
			$counter=mysqli_num_rows($result);
			echo "<center>( $counter Results Found... )</center>";
			echo "<form method='post' action='includes/posttoget.php'>";
			while($row=mysqli_fetch_row($result)){
				echo "<div class='pop-data'><input type='checkbox' class='auth' value='".$row[0]."' name='author[]'><a href='search.php?author=".$row[0]."'><li class='modal-data'>".$row[0]." (".$row[1].")</li></a></input></div>";	
			}
			echo "<input type='submit' value='Search' name='submit' id='modal-submit'>";
			echo "</form>";
		}
		
		//subject
		else if($_GET['filter']=='subject'){
			$query="select subid,count(*) as counter from publication_table where ". $sidebar_query_string ." group by subid order by counter desc";
			$result=mysqli_query($connection,$query);
			$counter=mysqli_num_rows($result);
			echo "<center>( $counter Results Found... )</center>";
			echo "<form method='post' action='includes/posttoget.php'>";
			while($row=mysqli_fetch_row($result)){
				$subject_query="select sub_name from subject_table where subid=".$row[0];
				$subject_result=mysqli_query($connection,$subject_query);
				$subject_row=mysqli_fetch_row($subject_result);
				echo "<div class='pop-data'><input type='checkbox' class='cboxleft' value='".$subject_row[0]."' name='subject[]'><a href='search.php?subject=".$subject_row[0]."'><li class='modal-data'>".$subject_row[0]." (".$row[1].")</li></a></input></div>";	
			}
			echo "<input type='submit' value='Search' name='submit' id='modal-submit'>";
			echo "</form>";
		}
		
		//document
		else if($_GET['filter']=='document'){
			$query="select doc_id,count(*) as counter from publication_table
							where ". $sidebar_query_string ." group by doc_id order by counter desc";
			$result=mysqli_query($connection,$query);
			$counter=mysqli_num_rows($result);
			echo "<center>( $counter Results Found... )</center>";
			echo "<form method='post' action='includes/posttoget.php'>";
			while($row=mysqli_fetch_row($result)){
				$doc_query="select doc_type from doctype_table where doc_id=".$row[0];
				$doc_result=mysqli_query($connection,$doc_query);
				$doc_row=mysqli_fetch_row($doc_result);
				echo "<div class='pop-data'><input type='checkbox' class='cboxleft' value='".$doc_row[0]."' name='document[]'><a href='search.php?document=".$doc_row[0]."'><li class='modal-data'>".$doc_row[0]." (".$row[1].")</li></a></input></div>";	
			}
			echo "<input type='submit' value='Search' name='submit' id='modal-submit'>";
			echo "</form>";
		}
		
		//school
		else if($_GET['filter']=='school'){
			$query="select sid,count(*) as counter from publication_table
							where ". $sidebar_query_string ." group by sid order by counter desc";
			$result=mysqli_query($connection,$query);
			$counter=mysqli_num_rows($result);
			echo "<center>( $counter Results Found... )</center>";
			echo "<form method='post' action='includes/posttoget.php'>";
			while($row=mysqli_fetch_row($result)){
				$school_query="select school from school_table where sid=".$row[0];
				$school_result=mysqli_query($connection,$school_query);
				$school_row=mysqli_fetch_row($school_result);
				echo "<div class='pop-data'><input type='checkbox' class='cboxleft' value='".$school_row[0]."' name='school[]'><a href='search.php?school=".$school_row[0]."'><li class='modal-data'>".$school_row[0]." (".$row[1].")</li></a></input></div>";	
			}
			echo "<input type='submit' value='Search' name='submit' id='modal-submit'>";
			echo "</form>";
		}
		
		//publisher
		else if($_GET['filter']=='publisher'){
			$query="select pub,count(*) as pub_count from publication_table
							where ". $sidebar_query_string ." group by pub order by pub_count desc";
			$result=mysqli_query($connection,$query);
			$counter=mysqli_num_rows($result);
			echo "<center>( $counter Results Found... )</center>";
			echo "<form method='post' action='includes/posttoget.php'>";
			while($row=mysqli_fetch_row($result)){
				echo "<div class='pop-data'><input type='checkbox' class='cboxleft' value='".$row[0]."' name='publisher[]'><a href='search.php?publisher=".$row[0]."'><li class='modal-data'>".$row[0]." (".$row[1].")</li></a></input></div>";	
			}
			echo "<input type='submit' value='Search' name='submit' id='modal-submit'>";
			echo "</form>";
		}
		else{
			header("location:error.php");	
		}
	}
?>