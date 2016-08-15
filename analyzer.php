<head>
<title>Analyzer</title>
</head>
<?php
	$col=htmlentities($_GET['col']);
	if($col!='author' && $col!='school' && $col!='subject' && $col!='document' && $col!='year'){
		header("location:index.php");
	}
	
	
	session_start();
	include("includes/header.php");
?>
<style>
#search_info{
	margin-top:10px;
	background-color:#FFC;
	width:1320px;
	text-align:left;
	max-height:50px;
	overflow:auto;
	height:30px;
	margin-left:10px;
	padding-left:5px;
	border-radius:4px;
	padding-top:5px;	
}
#prev-page{
	height:20px;
	width:95px;
	border-radius:5px;
	background-color:#06F;
	color:white;
	margin-left:15px;
	padding:12px;	
	margin-top:10px;
}
</style>

<a href="search.php"><div id='prev-page'>Previous Page</div>
</a>
<center>

<div id='search_info'>
	<b>Search Path:</b>  &nbsp;<?php if(isset($_SESSION['search_path'])) echo $_SESSION['search_path']; ?>
</div>
</center>

<?php
	include("includes/graph_nav_bar.php");
	include("includes/graph_scripts.php");
	include("includes/complete_filtered_search_string.php");
	include("includes/connection.php");
	if(!isset($_SESSION['slarray'])){
		header("location:index.php");	
	}
	
?>
<script>
	$(document).ready(function(){
		$('#publisher_bar').on('jqplotDataHighlight', function () {
			$('.jqplot-event-canvas').css( 'cursor', 'pointer' );
		});
	});
	function graph_draw(variables_checked_value,variables_checked){
			$("#publisher_bar").html("");
			$.jqplot.config.enablePlugins = true;
			var s1 = variables_checked_value;
			var ticks = variables_checked;
			
			plot1 = $.jqplot('publisher_bar', [s1], {
				// Only animate if we're not using excanvas (not in IE 7 or IE 8)..
				animate: !$.jqplot.use_excanvas,
				seriesDefaults:{
					renderer:$.jqplot.BarRenderer,
   					rendererOptions: {
     					 barWidth: 70,
						 varyBarColor:true
   					},
					pointLabels: { show: true }
				},
				axes: {
					xaxis: {
						renderer: $.jqplot.CategoryAxisRenderer,
						ticks: ticks
					}
				},
				highlighter: { show: false }
			});
		 
			$('#publisher_bar').bind('jqplotDataClick', 
				function (ev, seriesIndex, pointIndex, data) {
					$('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
				}
			);	
	}

	//on load show graph
	function author_onload(classvar){
		var variables_checked=[];
		var variables_checked_value=[];
		if(classvar=='auth'){
			$("input[class=auth]:checked").each(function () {
				variables_checked.push($(this).val()); 
			});
			$('input[class=auth]:checked').each(function () {
				variables_checked_value.push($(this).data('reso'));
			});
		}
		graph_draw(variables_checked_value,variables_checked);
	}
	

	$(document).ready(function(){
		$("input[class=auth]").click(function(){
			var author_check=[];
			var author_reso_check=[];
			$("input[class=auth]:checked").each(function () {
				author_check.push($(this).val()); 
			});
			$('input[class=auth]:checked').each(function () {
				author_reso_check.push($(this).data('reso'));
			});
		
			graph_draw(author_reso_check,author_check);
		});
	});
	
	$(document).ready(function(){
		author_onload("auth");
	});

</script>
<style>
#check_options{
	max-height:200px;
	overflow:auto;	
	margin-top:40px;
	padding-left:60px;
}
.list1{
	list-style-type:none;
	text-decoration:none;	
}
.left-box{
	float: left;
    width: 250px;
    max-height: 30px;
	overflow:auto;
    margin-top: 15px;
}
.auth{
	float:left;	
}
</style>
<body>
<center><h2><u> Results <?php echo ucfirst($col); ?> Wise </u></h2></center>
<div id="publisher_bar"></div>
<?php
	echo "<div id='check_options'>";
			include("includes/graph_analysis_check_options.php");
	echo "</div>";	
?>
</body>