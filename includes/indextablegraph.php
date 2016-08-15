<div id='yearwisepubdet'>
	
    <table class='table table-bordered table-stripped'>
    	<?php
			$school_query="select school,sid from school_table";
			$school_result=mysqli_query($connection,$school_query);
		?>
        
        <tr><th>Year</th>
        <th>Research Output</th>
        <?php
			while($row=mysqli_fetch_row($school_result)){
				echo "<th>$row[0]</th>";	
			}
		?>
        </tr>
        <tbody>
        <?php
			$year_query="select year,count(*) from publication_table group by year order by year desc";
			$year_result=mysqli_query($connection,$year_query);
			$counter=mysqli_num_rows($year_result);
			
			$i=6;
			if($counter<$i){
				$i=$counter;	
			}
			while($year_row=mysqli_fetch_row($year_result)){
				if($i>0){ 
					echo "<tr><td>".$year_row[0]."</td><td><center>".$year_row[1]."</center></td>";
					$school_query="select school,sid from school_table";
					$school_result=mysqli_query($connection,$school_query);
					while($school_row=mysqli_fetch_row($school_result)){
						$query="select count(*) from publication_table where year=".$year_row[0]." and sid=".$school_row[1];
						$filter_result=mysqli_query($connection,$query);
						$row=mysqli_fetch_row($filter_result);
						echo "<td><center>".$row[0]."</center></td>";	
					}
					$query="select count(*) from author_table where ";
					echo "<tr/>";
				}
				$i=$i-1;
			}
			echo "
        		</tbody></table>";
			if($counter>6){
				echo "<div id='moreyr'>View All Years..</div>";	
			}
//		include("piechartgraph.php");
		?>	
</div>