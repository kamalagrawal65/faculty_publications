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