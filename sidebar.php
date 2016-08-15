<link rel="stylesheet" href="css/sidebar.css">
<script src="bootstrap/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$("#topic1").click(function(){
			$(".list1").slideToggle(800);
			$(".auth").slideToggle(800);
		});
		$("#topic2").click(function(){
			$(".list2").slideToggle(800);
			$(".subj").slideToggle(800);
		});
		$("#topic3").click(function(){
			$(".list3").slideToggle(800);
			$(".docu").slideToggle(800);
		});
		$("#topic4").click(function(){
			$(".list4").slideToggle(800);
			$(".scho").slideToggle(800);
		});
		$("#topic5").click(function(){
			$(".list5").slideToggle(800);
			$(".year").slideToggle(800);
		});
		$("#topic6").click(function(){
			$(".list6").slideToggle(800);
			$(".publ").slideToggle(800);
		});
		
		
		$("input[type=checkbox]").change(function(){
			if($('input[type=checkbox]:checked').length>0){
				$("#submit").removeAttr('disabled'); 
			}
			else{
				$("#submit").attr('disabled','disabled');		
			}
		});
		
		$("#submit").mouseover(function(){
			if($('input[type=checkbox]:checked').length>0){
				$("#submit").css('background-color','#F60');
			}
		});
		$("#submit").mouseleave(function(){
			$("#submit").css('background-color','#000');
		});
		
		
	});
	
</script>
<?php
	include('includes/connection.php');
	include('includes/header.php');
?>
<?php 
	include("includes/complete_filtered_search_string.php");
?>

<body>
    <div class='top-container'>
        <form action="includes/posttoget.php" method="post">
            <div class="header">
                <div class='topic' id='topic1'><center>Author</center></div>
                <ul class='dropdown'>
                    <?php
                        $query="select aname,count(*) as counter from author_table where ". $sidebar_query_string ." group by aname order by counter desc";
                        $result=mysqli_query($connection,$query);
                        $counter=mysqli_num_rows($result);
                        $i=5;
                        if($counter<$i){
                            $i=$counter;	
                        }
                        while($row=mysqli_fetch_row($result)){
                            if($i>0)
                            echo "<input type='checkbox' class='auth' value='".$row[0]."' name='author[]'><a href='search.php?author=".$row[0]."'><li class='list1'>".$row[0]." (".$row[1].")</li></a></input>";	
                            else break;
                            $i=$i-1;
                        }
                        if($counter>5){
                            echo "<div class='list1'>View All..</div>";
                        }
                    ?>
                    
                </ul>
            </div>
            
            <!-- Subject Wise -->
            
            <div class="header">
                <div class='topic' id='topic2'><center>Subject</center></div>
                <ul class='dropdown'>
                    <?php
                        $query="select subid,count(*) as counter from publication_table
						where ". $sidebar_query_string ." group by subid order by counter desc";
                        $result=mysqli_query($connection,$query);
                        $counter=mysqli_num_rows($result);
                        $i=5;
                        if($counter<$i){
                            $i=$counter;	
                        }
                        while($row=mysqli_fetch_row($result)){
                            $subject_query="select sub_name from subject_table where subid=".$row[0];
							$subject_result=mysqli_query($connection,$subject_query);
							$subject_row=mysqli_fetch_row($subject_result);
							if($i>0)
                            echo "<input type='checkbox' class='cbox subj' value='".$subject_row[0]."' name='subject[]'><a href='search.php?subject=".$subject_row[0]."'><li class='list2'>".$subject_row[0]." (".$row[1].")</li></a></input>";	
                            else break;
                            $ii=$i-1;
                        }
                        if($counter>5){
                            echo "<div class='list2'>View All..</div>";
                        }
                    ?>
                </ul>
            </div>
            
            <!-- Document -->
            
            <div class="header">
                <div class='topic' id='topic3'><center>Document</center></div>
                <ul class='dropdown'>
                    <?php
                        $query="select doc_id,count(*) as counter from publication_table
						where ". $sidebar_query_string ." group by doc_id order by counter desc";
                        $result=mysqli_query($connection,$query);
                        $counter=mysqli_num_rows($result);
                        $i=5;
                        if($counter<$i)
                            $i=$counter;
                        while($row=mysqli_fetch_row($result)){
                            $doc_query="select doc_type from doctype_table where doc_id=".$row[0];
							$doc_result=mysqli_query($connection,$doc_query);
							$doc_row=mysqli_fetch_row($doc_result);
							if($i>0)
                            echo "<input type='checkbox' class='cbox docu' value='".$doc_row[0]."' name='document[]'><a href='search.php?document=".$doc_row[0]."'><li class='list3'>".$doc_row[0]." (".$row[1].")</li></a></input>";	
                            else break;
                            $i=$i-1;
                        }
                        if($counter>5){
                            echo "<div class='list3'>View All..</div>";
                        }
                    ?>
                </ul>
            </div>
            
            <div class="header">
                <div class='topic' id='topic4'><center>School</center></div>
                <ul class='dropdown'>
                    <?php
                        $query="select sid,count(*) as counter from publication_table
						where ". $sidebar_query_string ." group by sid order by counter desc";
						
                        $result=mysqli_query($connection,$query);
                        $counter=mysqli_num_rows($result);
                        $i=5;
                        if($counter<$i)
                            $i=$counter;
                        while($row=mysqli_fetch_row($result)){
                            $school_query="select school from school_table where sid=".$row[0];
							$school_result=mysqli_query($connection,$school_query);
							$school_row=mysqli_fetch_row($school_result);
							if($i>0)
                            echo "<input type='checkbox' class='cbox scho' value='".$school_row[0]."' name='school[]'><a href='search.php?school=".$school_row[0]."'><li class='list4'>".$school_row[0]." (".$row[1].")</li></a></input>";	
                            else break;
                            $i=$i-1;
                        }
                        if($counter>5){
                            echo "<div class='list4'>View All..</div>";
                        }
                    ?>
               </ul>
            </div>
            
            
            <div class="header">
                <div class='topic' id='topic5'><center>Year</center></div>
                <ul class='dropdown'>
                    <?php
                        $query="select year,count(*) as year_count from publication_table 
						where ". $sidebar_query_string ." group by year order by year desc";
                        $result=mysqli_query($connection,$query);
                        $counter=mysqli_num_rows($result);
                        $i=5;
                        if($counter<$i)
                            $i=$counter;
                        while($row=mysqli_fetch_row($result)){
							
                            if($i>0)
                            echo "<input type='checkbox' class='cbox year' value='".$row[0]."' name='year[]'><a href='search.php?year=".$row[0]."'><li class='list5'>".$row[0]." (".$row[1].")</li></a></input>";	
                            else break;
                            $i=$i-1;
                        }
                        if($counter>5){
                            echo "<div class='list5'>View All..</div>";
                        }
                    ?>
               </ul>
            </div>
            
            
            <div class="header">
                <div class='topic' id='topic6'><center>Publisher</center></div>
                <ul class='dropdown'>
                    <?php
                        $query="select pub,count(*) as pub_count from publication_table
						where ". $sidebar_query_string ." group by pub order by pub_count desc";
                        $result=mysqli_query($connection,$query);
                        $counter=mysqli_num_rows($result);
                        $i=5;
                        if($counter<$i)
                            $i=$counter;
                        while($row=mysqli_fetch_row($result)){
                            if($i>0)
                            echo "<input type='checkbox' class='cbox publ' value='".$row[0]."' name='publisher[]'><a href='search.php?publisher=".$row[0]."'><li class='list6'>".$row[0]." (".$row[1].")</li></a></input>";	
                            else break;
                            $i=$i-1;
                        }
                        if($counter>5){
                            echo "<div class='list6'>View All..</div>";
                        }
                    ?>
               </ul>
            </div>
            
                <input type="submit" name="submit" disabled id="submit"/>
        </form>
    </div>
    	<?php include("includes/viewall_pop.php"); ?>

</body>
