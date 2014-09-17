
function calcHeight(height)
{
	if(parseInt(height) <= 300)
	{
		height = "300px";
	}
	
	var docHeight = ($(document).height() - 550);
	
	if(parseInt(docHeight) < 300) { docHeight = 300; }
	
	if(parseInt(height) > 300)
	{
		if(height > docHeight)
		{
			$('#pasteFrame').height(docHeight);
		}
		else
		{
			$('#pasteFrame').height(height);
		}
	}
	else
	{
		$('#pasteFrame').height("300px");
	}
}

var num = false;
function lineNumbers()
{
	var src = $('#pasteFrame').attr('src');
	if(num)
	{
		src = src.replace("linenum=true", "linenum=false");
	}
	else
	{
		src = src.replace("linenum=false", "linenum=true");
	}
	$('#pasteFrame').attr("src", src);
	num = !num;
	
}
	$('#wrapper *').tipsy({html: true });
});