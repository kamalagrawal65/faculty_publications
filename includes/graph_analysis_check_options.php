<?php
		$query=NULL;
		if($col=='author'){
			$query="select aname,count(*) as counter from author_table where ". $sidebar_query_string." group by aname order by counter desc";
		}
		else if($col=='subject'){
			$query="select sub_name,count(*) as counter from publication_table p,subject_table s
								where (". $sidebar_query_string .") and (p.subid=s.subid) group by p.subid order by counter desc";	
		}
		else if($col=='document'){
			$query="select doc_type,count(*) as counter from publication_table p,doctype_table d
								where (". $sidebar_query_string .") and (p.doc_id=d.doc_id) group by p.doc_id order by counter desc";	
		}
		else if($col=='school'){
			$query="select school,count(*) as counter from publication_table p,school_table s
								where (". $sidebar_query_string .") and (p.sid=s.sid) group by p.sid order by counter desc";	
		}
		else if($col=='year'){
			$query="select year,count(*) as year_count from publication_table 
								where ". $sidebar_query_string ." group by year order by year desc";	
		}
		$result=mysqli_query($connection,$query);
		$counter=mysqli_num_rows($result);
		$i=0;
		
		while($row=mysqli_fetch_row($result)){
			if($i>9){		
				echo "<div class='left-box'>
					<input type='checkbox' class='auth' data-reso='{$row[1]}' value='".$row[0]."' name='author[]'></input>
					<li class='list1'>".$row[0]." (".$row[1].")</li>
				</div>";	
			}
			else{
				echo "<div class='left-box'><input type='checkbox' checked class='auth' data-reso='{$row[1]}' value='".$row[0]."' name='author[]'></input><li class='list1'>".$row[0]." (".$row[1].")</li></div>";
			}
			$i++;
		}

?>