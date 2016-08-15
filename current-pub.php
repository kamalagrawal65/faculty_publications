<title>Recent Publications </title>
<?php
include("includes/header.php");
?>
<style>
	.news-mar{
		width:1000px;
		height:400px;
		border:5px solid #F60;	
		
		padding:0px 20px 0px 20px;
	}
	#info-mar{
		text-align:left;
		font-size:22px;	
	}
	hr{
		border:2px solid #603;	
	}
	#top-header{
		margin-bottom:20px;
	}
</style>
<?php
	include("includes/connection.php");
	include("publicNavBar.php");
	$query="select counter from marquee";
	$result=mysqli_query($connection,$query);
	$row=mysqli_fetch_row($result);
	$counter=$row[0];
	
	$news_query="select pri_author,sec_author,title,stitle,pub,year,abs_id,slno,school from publication_table p,school_table s where p.sid=s.sid order by slno desc limit ".$counter;
	$news_result=mysqli_query($connection,$news_query);
	
?>
<center>
	<h1 id='top-header'>Recent Publications</h1>
	<div class='news-mar'>
    	<marquee direction="up" width="1000px" height="370px" onmouseover="this.stop();" onmouseout="this.start();" id='info-mar'>
        	<?php
				while($news_row=mysqli_fetch_row($news_result)){
					echo "<a href='abstract.php?aid=".$news_row[6]."'>$news_row[2]</a><br/>";
					echo "<b>By:</b> $news_row[0]";
					if($news_row[1]!='' && $news_row[1]!='Unknown' && $news_row[1]!='No-One')
					echo ",$news_row[1]";
					echo "<br/>$news_row[3]<br/>$news_row[4] (<b>$news_row[5]</b>)";
					echo "<br/><b>School:</b>$news_row[8]<hr/>";
				}
			?>
        </marquee>
   	</div>
</center>