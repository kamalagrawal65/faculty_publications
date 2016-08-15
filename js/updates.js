$(document).ready(function(){
var mar = document.getElementById("marquee");
var ht = mar.innerHTML;
$('marquee').remove();
upd= document.getElementById("updates");
var updht = upd.innerHTML;
ht = ht + updht;
upd.innerHTML = ht;
$('#updates div').hide();
$('#all_upd').show();
$('#updates div').css({	'position' : 'absolute','left' : '5px'});
var noOfDivs= $('#updates div').length;	
$('#updates :first').addClass('current');	
for(var j = 1; j <= noOfDivs; j++){
	var ht = $('#updates .current').height();
	var top;		
        if((ht%2) == 1)
			top = (155-ht)/2;
	else top = (156-ht)/2;		
        var s = top + 'px';
	$('#updates .current').css({'top' : s});
	var curr = $('#updates .current');
	curr.next().addClass('current');
	curr.removeClass('current');	
}
$('#all_upd').css({'display':'block','position' : 'absolute','left':'4px','top' : '175px'});
$('#updates :first').addClass('showing').show();	
var stop = false;	
$('#updates').hover(function(){stop = true;},function(){stop = false;});
setInterval(slide,4000);

function slide(){
     if(stop == true)		
         return;	
var current = $('#updates .showing');	
var next = current.next().length ? current.next() : $('#updates :first');
if(!(next.next().length))
	next = $('#updates :first');
current.fadeOut(1000);
next.fadeIn(1000);
next.addClass('showing');
current.removeClass('showing');}	
});
