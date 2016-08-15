	$(document).ready(function(){
$('#navBar li').hover(function(){
	$(this).find('.dropDown ').stop(true,true).css({'height':'32px'}).hide();
	
	$(this).find('.dropDown ').animate(
	    {'height':'show'},{ duration:'fast', easing : 'linear' , queue : 'false' });
	},function(){
	$(this).find('.dropDown ').stop('true').animate(
	    {'height':'hide'},{ duration:'fast', easing : 'easeOutCirc' , queue : 'false' });
	});
$('#books').hover(function(){
	var option={direction:'left'};
	$('#submenu ').slideDown();
	},function()
	{
		$('#submenu ').hide();
	});
$('#serv').hover(function()
	{
	$('#subser ').slideDown();
	},function()
	{
		$('#subser ').hide();
	});
$('#uses').hover(function()
	{
	$('#sub ').slideDown();
	},function()
	{
		$('#sub ').hide();
	});
	

$("#select").change(function()
	{
		var a=$("#select").val();
		if(a=="Current Year")
		{
			$('#subject').hide();
			$('#radio1').hide();
			$('input[type=submit]').hide();
			$.get("search.php",{"subject":"year"},function(data)
			{
				if(data==0)
				{
					alert("No such journal");
				}
				else
				{
					$("table").html(data);
				}
			});
			$('input[type=submit]').hide();
		}
		else if(a=="Status")
		{
			$('#subject').hide();
			$('#radio2').hide();
			$('input[type=submit]').show();
			$('#radio1').css(
			{
				"display":"inline",
				
			});
		}
		else if(a=="RecommendedBySchool")
		{
			$('#subject').hide();
			$('#radio1').hide();
			$('#radio2').show();
			$('input[type=submit]').show();
			
		}
		else
		{
			$('#subject').show();
			$('input[type=submit]').show();
			$('#radio1').hide();
			$('#radio2').hide();
		}
		
		$("#subject").attr("placeholder",a);
	});
	
	
	
	$("#searchItem").click(function()
	{
		var a=$("#select").val();
		
		if(a=="Status")
		{
			var subject=$('#radio1').val();
		}
		else if(a=="RecommendedBySchool")
			var subject=document.getElementById("radio2").value;
		else
			var subject=document.getElementById('subject').value;

		var topic=$("#select").val();
		$.get("search.php",{"subject":subject,"topic":topic},function(data)
		{
			if(data==0)
			{
				alert("No such journal");
			}
			else
			{
				$("table").html(data);
			}
		});
	});

	
	$('#accordion').accordion(
		{
			collapsible: true,
			active:false,
			heightStyle:"content"
		});
	$('#print').click(function()
	{
		alert("hjnej");
	});
	
	
	
});
	
