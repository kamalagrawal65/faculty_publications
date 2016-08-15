var timerid = 0;
var images = new Array(	"pics/image1.jpg",
	      		"pics/image2.jpg",
 			"pics/image3.jpg",
      			"pics/image4.jpg",
			"pics/image5.jpg",
				"pics/image6.jpg" );               
 
var countimages = 0;
function startTime()
{
	if(timerid)
	{
		timerid = 0;
	}
	var tDate = new Date();
 
	if(countimages == images.length)
	{
		countimages = 0;
	}
	$('#img1').hide(1500);
	timerid = setTimeout("show()", 1000);
}

function show()
{
	document.getElementById("img1").src = images[countimages];
	$('#img1').show(1000,"linear");
	countimages++;
	timerid = setTimeout("startTime()", 3000);
	
}

var bvr = (document.all) ? true : false;

function hideID(bvr){
var element = (bvr) ? document.all(bvr) : document.getElementById(bvr);
element.style.display="none"
}

function showID(bvr){
var element = (bvr) ? document.all(bvr) : document.getElementById(bvr);
element.style.display="block"
}
