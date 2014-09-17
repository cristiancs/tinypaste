
$(document).ready(calcHeight);
var timesCalled = 0;
var isInIFrame = (window.location != window.parent.location) ? true : false;
function calcHeight()
{
	parent.calcHeight($('body').height());
	if(timesCalled < 4)
	{
		timesCalled++;
		setTimeout(calcHeight, 1000);
	}
}


function toggleLineNum()
{
	if($('#line-numbers').css("list-style-type") != 'none')
	{
		$('#line-numbers').css("list-style-type", "none");
		$('#line-numbers').css("padding", "0");
	}
	else
	{
		$('#line-numbers').css("list-style-type", "decimal");
		$('#line-numbers').css("padding-left", "25px");
	}
}