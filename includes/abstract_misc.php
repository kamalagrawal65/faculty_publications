<style>
#top-article{
	background-color:#FFD;
	text-align:left;
	padding:10px;
	padding-left:30px;	
	border:4px solid #F60;
	border-bottom:4px solid white;
	border-radius:20px 20px 0px 0px;
}
hr{
	border:1px solid #f60;	
}
#article_container{
	width:1000px;
	text-align:left;
	overflow:auto;
	margin-left:2%;			
	margin-top:4%;
	font-size:22px;
	line-height:40px;
	text-align: justify;
    text-justify: inter-word;
	padding:20px;
	
}
.det{	
	border-left:5px solid #F60;
	border-right:5px solid #F60;
	padding:30px;
	background-color:#FFD;
}
#abs_title{
	font-size:20px;
	vertical-align:top;
	margin-top:0px;
	padding-top:0px;
}
.detail{
	font-size:20px;
	vertical-align:top;
	text-align: justify;
    text-justify: inter-word;
}
.headers{
	font-size:20px;
	padding-top:0px;
	vertical-align:top;	
}
.answer{
	font-size:20px;	
	vertical-align:top;
	text-align: justify;
    text-justify: inter-word;
}
.col3{
	vertical-align:middle;
	font-weight:bold;
	margin-right:20px;	
}
#col3{
	vertical-align:top;	
}
.col5{
	vertical-align:bottom;
}
</style>

<?php
	echo "<center>";
	$query="select slno,title,pri_author,sec_author,stitle,vol,issue,abs,doi,pub,page_start,page_end from publication_table p,abstract_table a where p.abs_id=$aid and p.abs_id=a.abs_id";
	$result=mysqli_query($connection,$query);
	if(mysqli_num_rows($result)==0)
		echo "No Results Found";
	else{
		$row=mysqli_fetch_row($result);
		$slno=$row[0];
		$title=$row[1];
		$pri_author=$row[2];
		$sec_author=$row[3];
		$stitle=$row[4];
		$vol=$row[5];
		$issue=$row[6];
		$abs=$row[7];
		$doi="http://dx.doi.org/".$row[8];
		$pub=$row[9];
	
		$query="select keyword from key_table where slno=$slno";
		$result=mysqli_query($connection,$query);
	
	
		$author_query="select aname from author_table where slno in (select slno from publication_table where abs_id=$aid)";
		$author_result=mysqli_query($connection,$author_query);
		$counter=mysqli_num_rows($author_result);
	?>
	<div id='article_container'>
    	<div id='top-article'>
            <table>
            <tr><td class='headers'><b>Title </b></td><td class="col3" id='col3'>:</td>
                <td class='answer'><a href=<?php echo $doi; ?> target='_blank'> <?php echo $title; ?> </a> </td>
            </tr>
            
            <tr><td class='headers'>
                <b>Authors </b></td><td class="col3">:</td>
                <td class='answer'><?php
						$row=mysqli_fetch_row($author_result);
						echo $row[0]; 
						while($row=mysqli_fetch_row($author_result)){
							echo ", ".$row[0];	
						}		
                    ?>
                </td>
            </tr>
            
            <tr><td class='headers'>
                <b>Source </b></td><td class="col3">:</td>
                <td>
                <span class='answer'><?php echo $stitle; ?> </span>
                <span class='col2 col5'>.  Vol-  <?php echo $vol; ?>
                </span>
                <span class='col3 col5'><?php echo "( ".$issue." )"; ?>
                </span>
                </td>
            </tr>
            <tr><td class='headers'>
                <b>Publisher </b></td><td class="col3">:</td>
                <td class='answer'><?php echo $pub; ?> 
                </td>
            </tr>
           </table>
       </div>
       <!-- <hr/> -->
       
       <div class='det'>
        <div class='abs'>
            <table>
            <tr><td id='abs_title'><b><u>Abstract</u>:</b></td>
            <td class='detail'><?php echo $abs; ?> 
            </td>
            </tr>
            </table>
        </div>
        <hr/>
        <div class='abs'>
           <table><tr> <td id='abs_title'><b><u>Keywords</u>: </b></td>
            <td class='detail'><?php
				$i=0; 
				while($row=mysqli_fetch_row($result)){
					if($i!=0)
						echo ", ";
					echo $row[0];	
					$i=1;
				}
			?> 
            </td>
            </tr>
            </table>
        </div>
        </div>
    </div>

<?php
	echo "</center>";
   } 

?>