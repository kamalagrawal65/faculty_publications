<?php
	include("includes/connection.php");
	$year_query="select year,count(*) from publication_table group by year order by year desc limit 5";
	$year_result=mysqli_query($connection,$year_query);
	
	$school_query="select school,school_count from school_table";
	$school_result=mysqli_query($connection,$school_query);
	
	$doc_query="select doc_type,doc_count from doctype_table";
	$doc_result=mysqli_query($connection,$doc_query);
	
	$publisher_query="select pub,count(*) as pub_count from publication_table group by pub order by pub_count desc limit 5";
	$publisher_result=mysqli_query($connection,$publisher_query);
	
	$year_data=NULL;
	$publisher_data=NULL;
	$school_data=NULL;
	$doc_data=NULL;
	
	$year_det=NULL;
	$year_coun=NULL;
	
	$publisher_det=NULL;
	$publisher_coun=NULL;
	
	$school_det=NULL;
	$school_coun=NULL;
	
	$doc_det=NULL;
	$doc_coun=NULL;
	
	//year
	$row=mysqli_fetch_row($year_result);
	$year_det="['{$row[0]}'";
	$year_coun="$row[1]";
	$year_data=$year_data."[{  y: ".$row[1].", indexLabel: '".$row[0]."',cursor: 'pointer' }";
	while($row=mysqli_fetch_row($year_result)){
		$year_det.=", '{$row[0]}'";
		$year_coun.=", {$row[1]}";
		$year_data=$year_data.", {  y: ".$row[1].", indexLabel: '".$row[0]."',cursor: 'pointer' }";
	}
	$year_data.="]";
	$year_det.="]";
	
	
	//publisher
	$row=mysqli_fetch_row($publisher_result);
	$publisher_det="['{$row[0]}'";
	$publisher_coun="$row[1]";
	$publisher_data.="[{  y: ".$row[1].", indexLabel: '".$row[0]."',cursor: 'pointer' }";
	while($row=mysqli_fetch_row($publisher_result)){
		$publisher_det.=", '{$row[0]}'";
		$publisher_coun.=", {$row[1]}";
		$publisher_data.=", {  y: ".$row[1].", indexLabel: '".$row[0]."',cursor: 'pointer' }";
	}
	$publisher_data.="]";
	$publisher_det.="]";
	
	//school
	$row=mysqli_fetch_row($school_result);
	$school_det="['{$row[0]}'";
	$school_coun="$row[1]";
	$school_data.="[{  y: ".$row[1].", indexLabel: '".$row[0]."',cursor: 'pointer' }";
	while($row=mysqli_fetch_row($school_result)){
		$school_det.=", '{$row[0]}'";
		$school_coun.=", {$row[1]}";
		$school_data.=", {  y: ".$row[1].", indexLabel: '".$row[0]."',cursor: 'pointer' }";
	}
	$school_data.="]";
	$school_det.="]";
	
	//doc
	$row=mysqli_fetch_row($doc_result);
	$doc_det="['{$row[0]}'";
	$doc_coun="$row[1]";
	$doc_data.="[{  y: ".$row[1].", indexLabel: '".$row[0]."',cursor: 'pointer' }";
	while($row=mysqli_fetch_row($doc_result)){
		$doc_det.=", '{$row[0]}'";
		$doc_coun.=", {$row[1]}";
		$doc_data.=", {  y: ".$row[1].", indexLabel: '".$row[0]."' ,cursor: 'pointer'}";
	}
	$doc_data.="]";
	$doc_det.="]";
	
	//echo $year_det;
?>


<script src="bootstrap/jquery.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="piechart/canvasjs.min.js"></script>

<!-- Year wise pie chart  -->
<script>
function onClick_year(e) {
	window.open('search.php?year='+e.dataPoint.indexLabel,'_self');
}
function onClick_publisher(e) {
	window.open('search.php?publisher='+e.dataPoint.indexLabel,'_self');
}
function onClick_school(e) {
	window.open('search.php?school='+e.dataPoint.indexLabel,'_self');
}
function onClick_doc(e) {
	window.open('search.php?document='+e.dataPoint.indexLabel,'_self');
}

$(document).ready(function(){
	$('#year_bar').on('jqplotDataHighlight', function () {
		$('.jqplot-event-canvas').css( 'cursor', 'pointer' );
	});
	$('#doc_bar').on('jqplotDataHighlight', function () {
		$('.jqplot-event-canvas').css( 'cursor', 'pointer' );
	});
	$('#school_bar').on('jqplotDataHighlight', function () {
		$('.jqplot-event-canvas').css( 'cursor', 'pointer' );
	});
});


function year_chart() {
	var chart = new CanvasJS.Chart("year_chart",
	{
		theme: "theme2",
		title:{
			text: ""
		},
		animationEnabled: true,
        colorSet: "greenShades",
		legend:{
			verticalAlign: "center",
			horizontalAlign: "right",
			fontSize: 20,
			cursor: "pointer" ,
			itemclick:onClick_year,
			fontFamily: "Helvetica"        
		},

		data: [
		{
			click: function(e){ 
  	 			window.open("search.php?year="+e.dataPoint.indexLabel,'_self');
  			},
			
			
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} - #percent %",
			legendText: "{indexLabel}",
			dataPoints: <?php echo $year_data; ?>
		}
		]
	});
	chart.render();
}
</script>

<script>
function publisher_chart() {
	var chart = new CanvasJS.Chart("publisher_chart",
	{
		theme: "theme2",
		title:{
			text: ""
		},
		animationEnabled: true,
        colorSet: "greenShades",
		legend:{
			verticalAlign: "center",
			horizontalAlign: "right",
			fontSize: 20,
			cursor: "pointer" ,
			itemclick:onClick_publisher,
			fontFamily: "Helvetica"        
		},

		data: [
		{
			click: function(e){ 
  	 			window.open("search.php?publisher="+e.dataPoint.indexLabel,'_self');
  			},
			
			
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} - #percent %",
			legendText: "{indexLabel}",
			dataPoints: <?php echo $publisher_data; ?>
		}
		]
	});
	chart.render();
}
</script>

<script>
function school_chart() {
	var chart = new CanvasJS.Chart("school_chart",
	{
		theme: "theme2",
		title:{
			text: ""
		},
		animationEnabled: true,
        colorSet: "greenShades",
		legend:{
			verticalAlign: "center",
			horizontalAlign: "right",
			fontSize: 20,
			cursor: "pointer" ,
			itemclick:onClick_school,
			fontFamily: "Helvetica"        
		},

		data: [
		{
			click: function(e){ 
  	 			window.open("search.php?school="+e.dataPoint.indexLabel,'_self');
  			},
			
			
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} - #percent %",
			legendText: "{indexLabel}",
			dataPoints: <?php echo $school_data; ?>
		}
		]
	});
	chart.render();
}
</script>

<script>
function doc_chart() {
	var chart = new CanvasJS.Chart("doc_chart",
	{
		theme: "theme2",
		title:{
			text: ""
		},
		animationEnabled: true,
        colorSet: "greenShades",
		legend:{
			verticalAlign: "center",
			horizontalAlign: "right",
			fontSize: 20,
			cursor: "pointer" ,
			itemclick:onClick_doc,
			fontFamily: "Helvetica"        
		},

		data: [
		{
			click: function(e){ 
  	 			window.open("search.php?document="+e.dataPoint.indexLabel,'_self');
  			},
			
			
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} - #percent %",
			legendText: "{indexLabel}",
			dataPoints: <?php echo $doc_data; ?>
		}
		]
	});
	chart.render();
}
</script>
<?php
	include("includes/graph_scripts.php");
?>

<!-- Bar graph for year -->
<script>
	function year_bar(){
        $.jqplot.config.enablePlugins = true;
        var s1 = [ <?php echo $year_coun ?> ];
        var ticks =<?php echo $year_det ?>;
         
        plot1 = $.jqplot('year_bar', [s1], {
			animate: !$.jqplot.use_excanvas,
			seriesColors:['#107555','#B12595','#30E8C2','#fd746c','#76b852','#C31D56','#211DC3','#D5CF20','#CCCCB2','#12CCBA','#ee9ca7', '#6a3093','#C02425','#64b3f4', '#73C774', '#C7754C', '#17BDB8'],
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
				rendererOptions: {
     				 barWidth: 50,
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
            highlighter: { show: true }
        });
     
		$('#year_bar').bind('jqplotDataClick', function (ev, seriesIndex, pointIndex, data) {
    		window.open('search.php?year='+ticks[data[0]-1],'_self');
			//alert(ticks[data[0]-1]);
		});
	}
</script>



<script>
	function school_bar(){
        $.jqplot.config.enablePlugins = true;
        var s1 = [ <?php echo $school_coun ?> ];
        var ticks =<?php echo $school_det ?>;
         
        plot1 = $.jqplot('school_bar', [s1], {
			animate: !$.jqplot.use_excanvas,
			seriesColors:['#107555','#B12595','#30E8C2','#fd746c','#76b852','#C31D56','#211DC3','#D5CF20','#CCCCB2','#12CCBA','#ee9ca7', '#6a3093','#C02425','#64b3f4', '#73C774', '#C7754C', '#17BDB8'],
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
				rendererOptions: {
     				 barWidth: 50,
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
            highlighter: { show: true }
        });
     
		$('#school_bar').bind('jqplotDataClick', function (ev, seriesIndex, pointIndex, data) {
    		window.open('search.php?school='+ticks[data[0]-1],'_self');
			//alert(ticks[data[0]-1]);
		});
	}
</script>


<script>
	function doc_bar(){
        $.jqplot.config.enablePlugins = true;
        var s1 = [ <?php echo $doc_coun ?> ];
        var ticks =<?php echo $doc_det ?>;
         
        plot1 = $.jqplot('doc_bar', [s1], {
			animate: !$.jqplot.use_excanvas,
			seriesColors:['#107555','#B12595','#30E8C2','#fd746c','#76b852','#C31D56','#211DC3','#D5CF20','#CCCCB2','#12CCBA','#ee9ca7', '#6a3093','#C02425','#64b3f4', '#73C774', '#C7754C', '#17BDB8'],
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
				rendererOptions: {
     				 barWidth: 50,
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
            highlighter: { show: true }
        });
     
		$('#doc_bar').bind('jqplotDataClick', function (ev, seriesIndex, pointIndex, data) {
    		window.open('search.php?document='+ticks[data[0]-1],'_self');
			//alert(ticks[data[0]-1]);
		});
	}
</script>