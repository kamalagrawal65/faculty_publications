<style>
.searchbar_res{
	height:100%;
	padding:3px;
	margin-top:6px;
	width:90%;
	border-radius:5px;	
	border-bottom:1px dashed black;
}
.searchbar_res:hover{
	background-color:#99C;	
}
a#sch{
	font-size:20px;	
}
a#sch:visited{
	color:black;	
}
a#sch:hover{
	color:black;	
}
a#sch:active{
	color:black;	
}
a#sch:link{
	color:black;	
}
a#sch{
	text-decoration:none;	
}
</style>
<?php
	include('connection.php');
	if($_POST['keyword']==''){
			
	}
	else{
		if($_POST['col']=='author'){
			$query="select distinct aname from author_table where aname like ('%{$_POST['keyword']}%')";
		}
		else if($_POST['col']=='school'){
			$query="select school from school_table where school like ('%{$_POST['keyword']}%')";
		}
		else if($_POST['col']=='subject'){
			$query="select sub_name from subject_table where sub_name like ('%{$_POST['keyword']}%')";
		}
		else if($_POST['col']=='title'){
			$query="select title from publication_table where title like ('%{$_POST['keyword']}%')";
		}
		else if($_POST['col']=='publisher'){
			$query="select distinct pub from publication_table where pub like ('%{$_POST['keyword']}%')";	
		}
		else if($_POST['col']=='year'){
			$query="select distinct year from publication_table where year like ('%{$_POST['keyword']}%')";	
		}
		$result=mysqli_query($connection,$query);
		$counter=mysqli_num_rows($result);
		if($counter>0){
			echo "<ul>";
			$i=5;
			while($row=mysqli_fetch_row($result)){
				if($i>0)
					echo "<div class='searchbar_res'><a id='sch' href='search.php?{$_POST['col']}={$row[0]}'>$row[0]</a></div>";
				else 
					break;
				$i=$i-1;
			}
			echo "</ul>";
			if($counter>5){
				echo "<center><div searchbar_res><a id='sch' href='results.php?col={$_POST['col']}&key={$_POST['keyword']}'>See All Results</a></div></center>";	
			}
		}
	}
?>