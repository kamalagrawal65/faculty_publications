<title>Home</title>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="css/index.css">
<?php
	session_start();
	if(isset($_SESSION['slarray']))
		unset($_SESSION['slarray']);
	if(isset($_SESSION['search_path']))
		unset($_SESSION['search_path']);
	if(isset($_SESSION['prev_get']))
		unset($_SESSION['prev_get']);
?>
<?php 
	include("includes/graph_data.php"); 
	include("includes/viewall_pop.php");	  
?>


<script src="js/index.js"></script>

<script>

var timer=setInterval(function(){ graph_animation() }, 4000);
var myVar=1;

function startTimer(){
	timer=setInterval(function(){ graph_animation() }, 4000);
	myVar=1;
}
function stopTimer(){
	clearInterval(timer);
	myVar=100;	
}
function hiding(){
	$(".all_graph").css("display","none");
}
function graph_animation(){
	hiding();
	//setTimeout(test,10);
	if(myVar==1){
		$("#graph-info").text("Year Wise Results");
		$("#year_bar").fadeIn(1000);
		year_bar();
		myVar=2;
		
	}
	else if(myVar==2){
		$("#graph-info").text("Publisher Wise Results");
		$("#publisher_chart").fadeIn(3000);
		publisher_chart();
		myVar=3;
	}
	else if(myVar==3){
		$("#graph-info").text("School Wise Results");
		$("#school_chart").fadeIn(3000);
		school_chart();
		myVar=4;
	}
	else if(myVar==4){
		$("#graph-info").text("School Wise Results");
		$("#school_bar").fadeIn(3000);
		school_bar();
		myVar=5;
	}
	else if(myVar==5){
		$("#graph-info").text("Year Wise Results");
		$("#year_chart").fadeIn(3000);
		year_chart();
		myVar=6;
	}
	else if(myVar==6){
		$("#graph-info").text("Document Wise Results");
		$("#doc_chart").fadeIn(3000);
		doc_chart();
		myVar=7;
	}
	else if(myVar==7){
		$("#graph-info").text("Document Wise Results");
		$("#doc_bar").fadeIn(3000);
		doc_bar();
		myVar=1;
	}
}


$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("searchTerm")) $(".suggestionBox").hide();
});

</script>
<style>
#graph-info{
	text-align:center;
	font-weight:bold;
	font-size:20px;	
	text-decoration:underline;
}
</style>

<body>

<div class="fluid-container">
	<?php include("includes/header.php"); 
		  include("includes/connection.php"); 
	?>   
    <center><h3><u> Faculty Publications </u></h3></center>
    	<form method="get" action="search.php" id='form1'>
        <div class='row' id='form-outline'>
        		<div class="col-md-1"></div>
                <div class="col-md-2">
                        <select id='dropdown'>
                            <option value='title'>Title</option>
                            <option value='author'>Author</option>
                            <option value='publisher'>Publisher</option>
                            <option value='school'>School</option>
                            <option value='subject'>Subject</option>
                            <option value='year'>Year</option>
                        	<option value='all'>All Results</option>
                        </select>
                 </div>
                 <div class="col-md-6">
                    <input class="searchTerm" name='title'  placeholder="Search…" autocomplete="off"/>
                    <div class="suggestionBox" id="sugg-box"></div>
                   
                 </div>   
                 <div class="col-md-2">
                        <input type="submit" id="submit" name='submit' value="SEARCH"/>
                 </div>
                 <div class="col-md-1"></div>
             
       </div>
	</form>
    
   
<?php include("includes/graph_data.php"); ?>
<div id='graph-box'>
	<div id='nav-bar-graph'>
    	<div class="hiding everyone" id='all'>All Graphs</div>
        <div class="hiding everyone" id='yearwise'>Year Wise</div>
        <div class="hiding everyone" id='schoolwise'>School Wise</div>
        <div class="hiding everyone" id='pubwise'>Publisher Wise</div>
        <div class="hiding everyone" id='docwise'>Document Wise</div>
    </div>
    <div id="graph-info"><center><b><u>Document Wise Results</u></b></center></div>
    <div id='graphs'>
    	<div class='all_graph one_group' id='year_bar'></div>
        <div class='all_graph one_group' id='school_bar'></div>
        <div class='all_graph one_group' id='doc_bar'></div>
        
        <div class='all_graph' id='year_chart'></div>
        <div class='all_graph' id='school_chart'></div>
        <div class='all_graph' id='publisher_chart'></div>
        <div class='all_graph' id='doc_chart'></div>
        
    </div>

</div>


</div>
