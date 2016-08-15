<?php
	include("connection.php");
	$year_query="select year,count(*) from publication_table group by year order by year desc limit 5";
	$year_result=mysqli_query($connection,$year_query);
	
	$school_query="select school,school_count from school_table";
	$school_result=mysqli_query($connection,$school_query);
	
	$publisher_query="select pub,count(*) as pub_count from publication_table group by pub order by pub_count desc limit 5";
	$publisher_result=mysqli_query($connection,$publisher_query);
	
	$year_data=NULL;
	$publisher_data=NULL;
	$school_data=NULL;
	
	$year_det=NULL;
	$year_coun=NULL;
	
	$publisher_det=NULL;
	$publisher_coun=NULL;
	
	$school_det=NULL;
	$school_coun=NULL;
	
	
	$row=mysqli_fetch_row($year_result);
	$year_det="'{$row[0]}'";
	$year_coun="$row[1]";
	$year_data=$year_data."['{$row[0]}',$row[1]]";
	while($row=mysqli_fetch_row($year_result)){
		$year_det.=", '{$row[0]}'";
		$year_coun.=", {$row[1]}";
		$year_data=$year_data.", ['{$row[0]}',$row[1]]";
	}
	
	
	$row=mysqli_fetch_row($publisher_result);
	$publisher_det="'{$row[0]}'";
	$publisher_coun="$row[1]";
	$publisher_data.="['{$row[0]}',$row[1]]";
	while($row=mysqli_fetch_row($publisher_result)){
		$publisher_det.=", '{$row[0]}'";
		$publisher_coun.=", {$row[1]}";
		$publisher_data.=", ['{$row[0]}',$row[1]]";
	}
	
	$row=mysqli_fetch_row($school_result);
	$school_det="'{$row[0]}'";
	$school_coun="$row[1]";
	$school_data.="['{$row[0]}',$row[1]]";
	while($row=mysqli_fetch_row($school_result)){
		$school_det.=", '{$row[0]}'";
		$school_coun.=", {$row[1]}";
		$school_data.=", ['{$row[0]}',$row[1]]";
	}

	//echo $publisher_data;
?>

<script type="text/javascript" src="../jquery.jqplot/jquery.jqplot.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.pieRenderer.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.pointLabels.js"></script>


<script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="../jquery.jqplot/jquery.jqplot.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.pieRenderer.js"></script>
<link rel="stylesheet" type="text/css" href="../jquery.jqplot/jquery.jqplot.css" />
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.categoryAxisRenderer.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.pointLabels.js"></script>
<link rel="stylesheet" type="text/css" href="../jquery.jqplot/jquery.jqplot.css" />

<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.highlighter.js"></script>

<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.dateAxisRenderer.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.canvasTextRenderer.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.canvasAxisTickRenderer.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.barRenderer.js"></script>

<script type="text/javascript" src="../jquery.jqplot/src/plugins/jqplot.canvasAxisLabelRenderer.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.cursor.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.highlighter.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>
<script type="text/javascript" src="../jquery.jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<link rel="stylesheet" type="text/css" href="../jquery.jqplot/jquery.jqplot/jquery.jqplot.css" />


<!-- Year wise pie chart  -->
<script>
$(document).ready(function(){
 
    data1 = [[<?php echo $year_data; ?>]];
    toolTip1 = ['Red Delicious Apples', 'Parson Brown Oranges', 'Cavendish Bananas', 'Albaranzeuli Nero Grapes', 'Green Anjou Pears'];
 
    var plot1 = jQuery.jqplot('year_chart', 
        data1,
        {
            title: '', 
            seriesDefaults: {
                shadow: false, 
                renderer: jQuery.jqplot.PieRenderer, 
                rendererOptions: { padding: 0, sliceMargin: 2,startAngle: -90, showDataLabels: true }
            },
		grid: {
            drawBorder: false, 
            drawGridlines: false,
            background: '#ffffff',
            shadow:false
        },
		highlighter: {
        show: true,
		tooltipFade:true,
        useAxesFormatters: false,
        tooltipFormatString: '%s',
        sizeAdjust: 7.5
      	},
		cursor: {
         show: false
     },
         legend: {
                show: true,
                location: 'e',
				fontSize: '20px',
				textColor: 'orange',
                renderer: $.jqplot.EnhancedPieLegendRenderer,
                rendererOptions: {
                    numberColumns: 1,
                    toolTips: toolTip1
                }
            },
			rendererOptions: {
				// speed up the animation a little bit.
				// This is a number of milliseconds.
				// Default for a line series is 2500.
				animation: {
					speed: 2000
				}
			}
       
        }
    );
	
	$('#chart1').bind('jqplotDataClick',
    function (ev, seriesIndex, pointIndex, data) {
      //alert("data = " + data[0]);
		});
	});
	
	
</script>


<!-- publisher wise chart -->
<script>
$(document).ready(function(){
 
    data1 = [[<?php echo $publisher_data; ?>]];
    toolTip1 = ['Red Delicious Apples', 'Parson Brown Oranges', 'Cavendish Bananas', 'Albaranzeuli Nero Grapes', 'Green Anjou Pears'];
 
    var plot1 = jQuery.jqplot('publisher_chart', 
        data1,
        {
            title: '', 
            seriesDefaults: {
                shadow: false, 
                renderer: jQuery.jqplot.PieRenderer, 
                rendererOptions: { padding: 0, sliceMargin: 2,startAngle: -90, showDataLabels: true }
            },
		grid: {
            drawBorder: false, 
            drawGridlines: false,
            background: '#ffffff',
            shadow:false
        },
		highlighter: {
        show: true,
		tooltipFade:true,
        useAxesFormatters: false,
        tooltipFormatString: '%s',
        sizeAdjust: 7.5
      	},
		cursor: {
         show: false
     },
         legend: {
                show: true,
                location: 'e',
				fontSize: '8px',
				textColor: 'orange',
                renderer: $.jqplot.EnhancedPieLegendRenderer,
                rendererOptions: {
                    numberColumns: 1,
                    toolTips: toolTip1
                }
            },
			rendererOptions: {
				// speed up the animation a little bit.
				// This is a number of milliseconds.
				// Default for a line series is 2500.
				animation: {
					speed: 2000
				}
			}
       
        }
    );
	
	$('#chart1').bind('jqplotDataClick',
    function (ev, seriesIndex, pointIndex, data) {
      //alert("data = " + data[0]);
		});
	});
	
	
</script>



<!-- school wise chart -->
<script>
$(document).ready(function(){
 
    data1 = [[<?php echo $school_data; ?>]];
    toolTip1 = ['Red Delicious Apples', 'Parson Brown Oranges', 'Cavendish Bananas', 'Albaranzeuli Nero Grapes', 'Green Anjou Pears'];
 
    var plot1 = jQuery.jqplot('school_chart', 
        data1,
        {
            title: '', 
            seriesDefaults: {
                shadow: false, 
                renderer: jQuery.jqplot.PieRenderer, 
                rendererOptions: { padding: 0, sliceMargin: 2,startAngle: -90, showDataLabels: true }
            },
		grid: {
            drawBorder: false, 
            drawGridlines: false,
            background: '#ffffff',
            shadow:false
        },
		highlighter: {
        show: true,
		tooltipFade:true,
        useAxesFormatters: false,
        tooltipFormatString: '%s',
        sizeAdjust: 7.5
      	},
		cursor: {
         show: false
     },
         legend: {
                show: true,
                location: 'e',
				fontSize: '20px',
				textColor: 'orange',
                renderer: $.jqplot.EnhancedPieLegendRenderer,
                rendererOptions: {
                    numberColumns: 1,
                    toolTips: toolTip1
                }
            },
			rendererOptions: {
				// speed up the animation a little bit.
				// This is a number of milliseconds.
				// Default for a line series is 2500.
				animation: {
					speed: 2000
				}
			}
       
        }
    );
	
	$('#school_chart').bind('jqplotDataClick',
    function (ev, seriesIndex, pointIndex, data) {
      //alert("data = " + data[0]);
		});
	});
	
	
</script>

<!-- Bar graph for year -->
<script>
	$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
        var s1 = [<?php echo $year_coun; ?>];
        var ticks = [<?php echo $year_det; ?>];
         
        plot1 = $.jqplot('year_bar', [s1], {
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
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
     
        $('#chart1').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
              //  $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });
</script>


<!-- Bar graph for publisher -->
<script>
	$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
        var s1 = [<?php echo $publisher_coun; ?>];
        var ticks = [<?php echo $publisher_det; ?>];
         
        plot1 = $.jqplot('publisher_bar', [s1], {
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                 xaxis: {
					  renderer: $.jqplot.CategoryAxisRenderer,
					  label: 'Warranty Concern',
					  labelRenderer: $.jqplot.CanvasAxisLabelRenderer,
					  tickRenderer: $.jqplot.CanvasAxisTickRenderer,
					  /*tickOptions: {
						  angle: -30,
						  fontFamily: 'Courier New',
						  fontSize: '9pt'
					  }*/
					   
					},
					yaxis: {
					  label: 'Occurance',
					  labelRenderer: $.jqplot.CanvasAxisLabelRenderer
					}
    		    }
            },
            highlighter: { show: true }
        });
     
        $('#chart1').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
              //  $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });
</script>

<!-- Bar graph for school -->
<script>
	$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
        var s1 = [<?php echo $school_coun; ?>];
        var ticks = [<?php echo $school_det; ?>];
         
        plot1 = $.jqplot('school_bar', [s1], {
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
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
     
        $('#chart1').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
              //  $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });
</script>


<link rel="stylesheet" type="text/css" href="../jquery.jqplot//jquery.jqplot.css" />
<style>
.changinggraph{
	margin-top:200px;
	margin-left:400px;
	height:600px;
	width:600px;
	padding:50px;
	border:1px solid black;
	border-radius:20px;
}
.info{
	font-size:28px;	
	margin-top:20px;
	text-align:center;
}
</style>
<script>

var myVar=1;
$(document).ready(function(){
	$("#publisher_chart").css("display","none");
	$("#school_chart").css("display","none");
	$("#year_bar").css("display","none");
	$("#school_bar").css("display","none");
});

setInterval(alertFunc, 7000);

function hiding(){
	$(".hide").fadeOut(1000);
	$(".info").text("");
}
function test(){
	if(myVar==1){
	  	$("#year_bar").fadeIn(3000);
		$(".info").text("Year Wise Details");
		myVar=3;
	}
	/*else if(myVar==2){
		$("#publisher_chart").fadeIn(3000);
		$(".info").text("Publisher Wise Details");
		myVar=3;
	}*/
	else if(myVar==3){
		$("#school_chart").fadeIn(3000);
		$(".info").text("School Wise Details");
		myVar=4;
	}
	else if(myVar==4){
		$("#school_bar").fadeIn(3000);
		$(".info").text("School Wise Details");
		myVar=5;
	}
	else if(myVar==5){
		$("#year_chart").fadeIn(3000);
		$(".info").text("Year Wise Details");
		myVar=1;
	}
}

function alertFunc() {
	hiding();
	setTimeout(test,1200);
}

</script>



<body>

<div class='changinggraph'>

<div class="hide" id='year_chart'></div>
<div class="hide" id='publisher_chart'></div>
<div class="hide" id='school_chart'></div>
<div class="hide" id='year_bar'></div>
<div class="hide" id='school_bar'></div>
<div class="info" > Year Wise Details </center></div>


</div>
</body>