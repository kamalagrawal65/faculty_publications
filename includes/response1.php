<style>
.main-result-box{
	height:auto;
	width:1100px;
	margin-top:10px;
	margin-left:245px;	
}
.detail{
	max-height:200px;
	overflow:auto;
	font-size:20px;
	padding:10px;
	padding-top:6px;
	max-width:1000px;
	text-align: justify;
    border-radius:20px;
}
.detail:hover{
	background-color:#c4c5eb;	
}.detcopy{
	max-height:200px;
	overflow:auto;
	font-size:20px;
	width:1040px;
}
.index_no{
	float:left;
	display:inline-block;
	margin-left:10px;
	padding-top:10px;
}
</style>

<div class="main-result-box">
<?php
	//unset($_GET['col']);
	//echo $_SERVER['QUERY_STRING'];
	session_start();
	include("connection.php");
	include("complete_filtered_search_string.php");
	$col='';
	if(isset($_GET['col']))
		$col=$_GET['col'];
	
	if($col=='journal'){
		$query="select pri_author,sec_author,year,title,abs_id,stitle,pub,vol,issue,page_start,page_end from publication_table where (".$sidebar_query_string.") and (doc_id in (select doc_id from doctype_table where doc_type='Article'))";
		//echo $query;
		$index=1;
		$result=mysqli_query($connection,$query);
		if(!$result || mysqli_num_rows($result)==0){
			echo "<center class='center'>No Results Found.</center>";	
		}
		else{
			while($row=mysqli_fetch_row($result)){
				echo "<div class='index_no'>$index.</div>";
				echo "<div class='detail'>";
				echo "<a href='abstract.php?aid=".$row[4]."'> $row[3] </a>"." <br/>
				By: $row[0]";
				if($row[1]!='' && $row[1]!='NA') echo ",$row[1]";
				echo "<br/><b><i>$row[5] ($row[6]) </i></b> &nbsp;  Volume:$row[7] ";
				if($row[8]!='Unknown' && $row[8]!='NA' && $row[8]!='')
				echo "  &nbsp; Issue:$row[8] &nbsp;Published:$row[2]";
				if($row[9]!=0 && $row[10]!=0)
					echo" &nbsp; Pages:$row[9]-$row[10]";
				
				echo "</div>";
				echo "<div class='detcopy'>";
				echo "<hr/> </div>";
				$index++;	
			}
			
		}
	}
	else if($col=='book'){
		$query="select pri_author,sec_author,year,title,abs_id,isbn,pub from publication_table where (".$sidebar_query_string.") and (doc_id in (select doc_id from doctype_table where doc_type='Book'))";
		//echo $query;
		$index=1;
		$result=mysqli_query($connection,$query);
		if(!$result || mysqli_num_rows($result)==0){
			echo "<center class='center'>No Results Found.</center>";	
		}
		else{
			while($row=mysqli_fetch_row($result)){
				echo "<div class='index_no'>$index.</div>";
				echo "<div class='detail'>";
				echo "<a href='abstract.php?aid=".$row[4]."'> $row[3] </a>"." <br/>
				By: $row[0]";
				if($row[1]!='' && $row[1]!='NA') echo ",$row[1]";
				echo "<br/>ISBN: <b><i>$row[5] &nbsp; Publisher: $row[6] </i></b> ";
				echo " &nbsp;Published:$row[2]";
				/*if($row[9]!=0 && $row[10]!=0)
					echo "  &nbsp;Published On:$row[2] &nbsp; Pages:$row[9]-$row[10]";
				*/
				echo "</div>";
				echo "<div class='detcopy'>";
				echo "<hr/> </div>";
				$index++;	
			}
			
		}
	}
	else if($col=='bookc'){
		$query="select pri_author,sec_author,year,title,abs_id,isbn,stitle,page_start,page_end,pub from publication_table where (".$sidebar_query_string.") and (doc_id in (select doc_id from doctype_table where doc_type='Book Chapter'))";
		//echo $query;
		$index=1;
		$result=mysqli_query($connection,$query);
		if(!$result || mysqli_num_rows($result)==0){
			echo "<center class='center'>No Results Found.</center>";	
		}
		else{
			while($row=mysqli_fetch_row($result)){
				echo "<div class='index_no'>$index.</div>";
				echo "<div class='detail'>";
				echo "<a href='abstract.php?aid=".$row[4]."'> $row[3] </a>"." <br/>
				By: $row[0]";
				if($row[1]!='' && $row[1]!='NA' && $row[1]!='No-One') 
					echo ",$row[1]";
				
				echo "<br/><b><i>$row[6] ($row[9]) </i></b>";
				
				echo "&nbsp; ISBN:$row[5] &nbsp;Published:$row[2]";
				
				if($row[9]!=0 && $row[10]!=0)
					echo" &nbsp; Pages:$row[9]-$row[10]";
				
				echo "</div>";
				echo "<div class='detcopy'>";
				echo "<hr/> </div>";
				$index++;	
			}
			
		}
	}
	else if($col=='conference'){
		$query="select pri_author,sec_author,year,title,abs_id,stitle from publication_table where (".$sidebar_query_string.") and (doc_id in (select doc_id from doctype_table where doc_type='Conference Paper'))";
		//echo $query;
		$index=1;
		$result=mysqli_query($connection,$query);
		if(!$result || mysqli_num_rows($result)==0){
			echo "<center class='center'>No Results Found.</center>";	
		}
		else{
			while($row=mysqli_fetch_row($result)){
				echo "<div class='index_no'>$index.</div>";
				echo "<div class='detail'>";
				echo "<a href='abstract.php?aid=".$row[4]."'> $row[3] </a>"." <br/>
				By: $row[0]";
				if($row[1]!='' && $row[1]!='NA' && $row[1]!='No-One') 
					echo ",$row[1]";
				
				echo "<br/><b><i>$row[5]</i></b>";
				
				echo "&nbsp;Published:$row[2]";
				
				echo "</div>";
				echo "<div class='detcopy'>";
				echo "<hr/> </div>";
				$index++;	
			}
			
		}
	}
	
	
	else if($col=='misc'){
		$query="select pri_author,sec_author,year,title,abs_id,stitle,pub,page_start,page_end from publication_table where (".$sidebar_query_string.") and doc_id not in (select doc_id from doctype_table where doc_type='Conference Paper' or doc_type='Book Chapter' or doc_type='Book' or doc_type='Article')";
		//echo $query;
		$index=1;
		$result=mysqli_query($connection,$query);
		if(!$result || mysqli_num_rows($result)==0){
			echo "<center class='center'>No Results Found.</center>";	
		}
		else{
			while($row=mysqli_fetch_row($result)){
				echo "<div class='index_no'>$index.</div>";
				echo "<div class='detail'>";
				echo "<a href='abstract.php?aid=".$row[4]."'> $row[3] </a>"." <br/>
				By: $row[0]";
				if($row[1]!='' && $row[1]!='NA' && $row[1]!='No-One') 
					echo ",$row[1]";
				
				echo "<br/><b><i>$row[5] ($row[6]) </i></b>";
				
				echo "&nbsp;Published:$row[2]";
				
				if($row[7]!=0 && $row[8]!=0)
					echo" &nbsp; Pages:$row[7]-$row[8]";
				
				echo "</div>";
				echo "<div class='detcopy'>";
				echo "<hr/> </div>";
				$index++;	
			}
			
		}
	}	
?>
</div>