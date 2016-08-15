<!-- Search Bar Dynamic -->
$(document).ready(function(){
	$("#dropdown").change(function(){
		$(".searchTerm").val('');
		$("#sugg-box").hide();
		var str=$(this).val();
		if(str=='all'){
			window.open("search.php?col=all","_self");
		}
		if(str=='title'){
			$("#submit").prop('disabled',false);	
		}
		else{
			//disable submit button
			$("#submit").prop('disabled',true);
			//dynamic search in the db
		}
	});
});
		$(document).ready(function(){
			$(".searchTerm").keyup(function(){
				//alert(str);
				if($("#dropdown").val()!='title' && $("#dropdown").val()!='all'){
					$.ajax({
					type: "POST",
					url: "includes/getdata.php",
					data:{'keyword':$(this).val(),'col':$('#dropdown').val()},
					beforeSend: function(){
						$("#search-box").css("background","#FFF");
					},
					success: function(data){
						$("#sugg-box").show();
						$("#sugg-box").html(data);
						$("#search-box").css("background","#FFF");
					}
					});
				}
			});
		});
	
	
	$(document).ready(function(){
		$('.changinggraph').hover(function(ev){
			clearInterval(timer);
		}, function(ev){
			timer = setInterval( test, 5000);
		});
	});
	
	$(document).keyup(function(e) {
    	if (e.keyCode == 27) {
        	$("#sugg-box").fadeOut(10); 
		}
	});
	
	$(document).ready(function(){
		$("#moreyr").click(function(){
			$("#sugg-box").fadeOut(10);
    		$("#topic").text("All Years");
			var url_string='includes/viewall_query.php?filter=index_year';
			$.ajax({url: url_string, success: function(result){
				$("#pop-info").html(result);
			}});
			showmodal();
		});
	});



<!-- Index Graphs -->
function click_event(idname){
		$(".everyone").css("background-color","#F60");
		$(".everyone").css("color","white");
		$(idname).css("background-color","white");
		$(idname).css("color","#606");
		$(idname).css("border","1px solid black");
		$(idname).css("border-bottom","1px solid white");
		$("#graph-info").text('');
	}
	
	$(document).ready(function(){
		$("#all").css("background-color","white");
		$("#all").css("color","#606");
		$("#all").css("border","1px solid black");
		$("#all").css("border-bottom","1px solid white");
		doc_bar();
		
		
		
		//initial animated .....
		$("#all").click(function(){
			startTimer();
			click_event("#all");
			$(".all_graph").css("display","none");
			$("#year_bar").fadeIn(1000);
			year_bar();
			$("#graph-info").text("Year Wise");
		});
		
		
		
		
		
		
		$("#yearwise").click(function(){
			stopTimer();
			click_event("#yearwise");
			$(".all_graph").css("display","none");
			$("#year_chart").fadeIn(1000);
			year_chart();
		});
		$("#schoolwise").click(function(){
			stopTimer();
			click_event("#schoolwise");
			$(".all_graph").css("display","none");
			$("#school_chart").fadeIn(2000);
			school_chart();
		});
		$("#pubwise").click(function(){
			stopTimer();
			click_event("#pubwise");
			$(".all_graph").css("display","none");
			$("#publisher_chart").fadeIn(2000);
			publisher_chart();
		});
		$("#docwise").click(function(){
			stopTimer();
			click_event("#docwise");
			$(".all_graph").css("display","none");
			$("#doc_chart").fadeIn(2000);
			doc_chart();
		});
			
	});