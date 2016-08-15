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
	
	$row=mysqli_fetch_row($doc_result);
	$doc_det="'{$row[0]}'";
	$doc_coun="$row[1]";
	$doc_data.="['{$row[0]}',$row[1]]";
	while($row=mysqli_fetch_row($doc_result)){
		$doc_det.=", '{$row[0]}'";
		$doc_coun.=", {$row[1]}";
		$doc_data.=", ['{$row[0]}',$row[1]]";
	}

	//echo $publisher_data;
?>


<script src="bootstrap/jquery.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>

<script type="text/javascript" src="jquery.jqplot/jquery.jqplot.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.pieRenderer.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.pointLabels.js"></script>


<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="jquery.jqplot/jquery.jqplot.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.pieRenderer.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.jqplot/jquery.jqplot.css" />
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.categoryAxisRenderer.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.pointLabels.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.jqplot/jquery.jqplot.css" />

<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.highlighter.js"></script>

<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.dateAxisRenderer.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.canvasTextRenderer.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.canvasAxisTickRenderer.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.barRenderer.js"></script>

<script type="text/javascript" src="jquery.jqplot/src/plugins/jqplot.canvasAxisLabelRenderer.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.cursor.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.highlighter.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>
<script type="text/javascript" src="jquery.jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.jqplot/jquery.jqplot/jquery.jqplot.css" />



<!-- Year wise pie chart  -->
<script>
$(document).ready(function(){
 
    data1 = [[<?php echo $year_data; ?>]];
    toolTip1 = ['Red Delicious Apples', 'Parson Brown Oranges', 'Cavendish Bananas', 'Albaranzeuli Nero Grapes', 'Green Anjou Pears'];
 
    var plot1 = jQuery.jqplot('year_chart', 
        data1,
        {
            title: '',
			seriesColors:['#FFFF66','#9999FF','#FF6666','#66FFCC','#33CC33','#EDED00','#50C41A','#05c1ff','#FC0CE8','#00BC9C','#D5CF20','#fd746c','#76b852','#CCCCB2','#12CCBA','#ee9ca7', '#6a3093','#C02425','#64b3f4', '#73C774', '#C7754C', '#17BDB8','#fd746c','#76b852','#CCCCB2','#12CCBA','#ee9ca7', '#6a3093','#C02425','#64b3f4', '#73C774', '#C7754C', '#17BDB8'], 
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
                location: 'w',
				marginLeft: '50px',
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
	
	$('#year_chart').bind('jqplotDataClick',
    function (ev, seriesIndex, pointIndex, data) {
      		//alert("data = " + data[0]);
			window.open("search.php?year="+data[0],"_self");
		});
	});
	
	
</script>



<!-- Document wise pie chart  -->
<script>
$(document).ready(function(){
 
    data1 = [[<?php echo $doc_data; ?>]];
    toolTip1 = ['Red Delicious Apples', 'Parson Brown Oranges', 'Cavendish Bananas', 'Albaranzeuli Nero Grapes', 'Green Anjou Pears'];
 
    var plot1 = jQuery.jqplot('doc_chart', 
        data1,
        {
            title: '',
			seriesColors:['#FFFF66','#9999FF','#FF6666','#66FFCC','#33CC33','#EDED00','#50C41A','#05c1ff','#FC0CE8','#00BC9C','#D5CF20','#fd746c','#76b852','#CCCCB2','#12CCBA','#ee9ca7', '#6a3093','#C02425','#64b3f4', '#73C774', '#C7754C', '#17BDB8','#fd746c','#76b852','#CCCCB2','#12CCBA','#ee9ca7', '#6a3093','#C02425','#64b3f4', '#73C774', '#C7754C', '#17BDB8'], 
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
                location: 'w',
				marginLeft: '100px',
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
	
	$('#doc_chart').bind('jqplotDataClick',
    function (ev, seriesIndex, pointIndex, data) {
      		//alert("data = " + data[0]);
			window.open("search.php?document="+data[0],"_self");
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
			seriesColors:['#fd746c','#76b852','#C31D56','#211DC3','#D5CF20','#CCCCB2','#12CCBA','#ee9ca7', '#6a3093','#C02425','#64b3f4', '#73C774', '#C7754C', '#17BDB8'],
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
        sizeAdjust: 15
      	},
		cursor: {
         show: false
     },
         legend: {
                show: true,
                location: 'w',
				marginLeft: '100px',
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
	
	$('#publisher_chart').bind('jqplotDataClick',
    function (ev, seriesIndex, pointIndex, data) {
      		//alert("data = " + data[0]);
			window.open("search.php?publisher="+data[0],"_self");
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
			seriesColors:['#107555','#B12595','#30E8C2','#fd746c','#76b852','#C31D56','#211DC3','#D5CF20','#CCCCB2','#12CCBA','#ee9ca7', '#6a3093','#C02425','#64b3f4', '#73C774', '#C7754C', '#17BDB8'],
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
                location: 'w',
				marginLeft: '100px',
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
			window.open("search.php?school="+data[0],"_self");
		});
	});
	
	
</script>

<!-- Bar graph for year -->
<?php
echo "<script>
	$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
        var s1 = [".$year_coun."?>];
        var ticks = [".$year_det."];
         
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
     
       /* $('#year_bar').bind('jqplotDataClick',
    	function (ev, seriesIndex, pointIndex, data) {
      		//alert('data = ' + data[0]);
				window.open('search.php?year='+data[0],'_self');
			});
		});*/
		$('#year_bar').bind('jqplotDataClick', function (ev, seriesIndex, pointIndex, data) {
    		//window.open('search.php?year='+data[0],'_self');
			alert(data);
		});
		
		
    });
</script>";

?>


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
                rendererOptions: {
						barWidth:50
     					 varyBarColor:true
   				},
				pointLabels: { show: true }
            },
			axesDefaults: {
				tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
				tickOptions: {
				  angle: -30,
				  fontSize: '10pt'
				}
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
     
        $('#publisher_bar').bind('jqplotDataClick',
    	function (ev, seriesIndex, pointIndex, data) {
      		//alert("data = " + data[0]);
				window.open("search.php?publisher="+data[0],"_self");
			});
		});
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
			seriesColors:['#FC0CE8','#00BC9C','#D5CF20','#fd746c','#76b852','#CCCCB2','#12CCBA','#ee9ca7', '#6a3093','#C02425','#64b3f4', '#73C774', '#C7754C', '#17BDB8','#fd746c','#76b852','#CCCCB2','#12CCBA','#ee9ca7', '#6a3093','#C02425','#64b3f4', '#73C774', '#C7754C', '#17BDB8'],
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                rendererOptions: {
						barWidth:50
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
     
    /*    $('#school_bar').bind('jqplotDataClick',
    function (ev, seriesIndex, pointIndex, data) {
      		//alert("data = " + data[0]);
			window.open("search.php?school="+data[0],"_self");
		});
	});*/
	
    });
</script>

