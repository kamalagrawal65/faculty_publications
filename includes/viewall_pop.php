<!-- Set topic with clicked info and pop-data with ajax result -->

<?php include('connection.php');?>
<html>
<head>
    <script src="../bootstrap/jquery.min.js"></script>
    <style type="text/css">
	.pop-data{
		padding-left:20px;
		padding-top: 10px;
	}
	
	li.yearpop{
		list-style-type:none;
		font-size:20px;	
	}
	#pop-info{
		max-height:450px;
		overflow-y:scroll;
		overflow-x:hidden;
		margin-top:40px;	
		margin-left:20px;
	}
	a.yearpop:link {
		color: black;
	}
	
	/* visited link */
	a.yearpop:visited {
		color: black;
	}
	
	/* mouse over link */
	a.yearpop:hover {
		color: blue;
	}
	
	/* selected link */
	a.yearpop:active {
		color: black;
	}
	

    #enclosePopUp {
        width: 100%;
        height: 100%;
		position:absolute;
		top:calc(50% - 650px/2);
		left:calc(50% - 400px/2); 
        position: fixed;
        opacity: 1;
        filter: alpha(opacity = 50);
        display: none;
		z-index:1000;	
    }

    #popup {
        position: absolute;
        _position: absolute; /*kamal*/
        width: 380px;
		padding-bottom:2px;
		margin-top:50px;
        background:#FFC;
        border: 3px solid #F60;
        font-size: 15px;
   	    box-shadow: 0 0 40px #D8D8D8;
    	border-radius:20px;
	}
	a{
		text-decoration:none;	
	}
	
	#header{
		text-align:center;
		font-size:20px;
		background-color:#F60;	
		margin-top:0px;
		color:#000;
		width:380px;
		position:fixed;
		padding-top:7px;
		text-align:center;
		border-radius:8px;
	}
	
	#footer{
		font-size:20px;
		height:40px;
		margin-top:10px;
		background-color:#000;
		color:#FFF;
		padding:10px;
		text-align:center;
	}
	
	#closing{  
		float:right;
		height:30px; 
		width:8%; 
		cursor:pointer;
	}
	
	#close-sign{
		border-radius:50%;
		padding-top:0px;
		margin-right:6px;
		background-color:#FFF;
	}
</style>
<script type="text/javascript">
    function showmodal() {
        $('#enclosePopUp').fadeIn("slow", function() {
            $("body").css({
                "opacity" : "0.85",
                "z-index" : "1"
            });
        });
    }
    function hidemodal() {
        $('#enclosePopUp').fadeOut("slow", function() {
            $("body").css({
                "opacity" : "1"
            });
        });
    }
</script>
</head>
<body>
    <div id='enclosePopUp'>
        <div id="popup">
        
        	<div id='header'>
            		<span id='topic'></span>
                    <div id='closing' onClick="hidemodal()"><div id='close-sign'>x</div></div>
            </div>
            	
           
		  <div id='pop-info'>
         	
          </div>
         	<!--   <div id='footer'>
                <div onClick="hidemodal()">
                    <center>
                        <span style="cursor:pointer;">Close</span>
                    </center>
                </div>
            </div>
         -->             
        </div>
    </div>

</body>
</html>