<script src="bootstrap/jquery.min.js">
</script>
<style>
	body{
		margin:0px;
		padding:0px;	
	}
	#graph-nav-bar{
		margin-top:20px;
	}
	.nav-bar{
		display:inline-block;
		text-decoration:none;
		background-color:#606;
		height:20px;
		width:100px;
		padding:10px;
		border-radius:10px 10px 0 0;
		text-align:center;
		text-outline:#039;
		color:white;
		font-size:18px;
		margin-left:-3px;
	}
</style>
<script>
	function current_header(current_val){
		$(document).ready(function(){
			$(current_val).css('background-color','white');
			$(current_val).css('border','3px solid black');
			$(current_val).css('border-bottom','1px solid white');
			$(current_val).css('color','#606');
		});
	}
</script>
<?php
	$header=$_GET['col'];
	$header="#".$header;
?>
<body onload=current_header("<?php echo $header; ?>")>
<div id='graph-nav-bar'>
	<a href="analyzer.php?col=author"><div id='author' class='nav-bar'>Author</div></a>
    <a href="analyzer.php?col=school"><div id='school' class='nav-bar'>School</div></a>
    <a href="analyzer.php?col=subject"><div id='subject' class='nav-bar'>Subject</div></a>
    <a href="analyzer.php?col=document"><div id='document' class='nav-bar'>Document</div></a>
    <a href="analyzer.php?col=year"><div id='year' class='nav-bar'>Year</div></a>
</div>
</body>