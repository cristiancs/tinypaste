window.onbeforeunload = function(){
	syncBoxes();
	
	var currentText = $('#input_text').val();
	
	if(currentText != '' && !allowLeave)
	{
		return "By leaving the page, you MAY lose your current paste.";
	}
}

var allowLeave = false;


function homeInit()
{
	$('#pasteOptionsToggler').click(pasteOptions);
	
	$('#plainTxtTog').click(function() { chooseEditor('plain'); });
	$('#richTxtTog').click(function() { chooseEditor('rich'); });
	$('#codeTxtTog').click(function() { chooseEditor('code'); });
	$('#passwordOpt').tinytip("Protege tu Paste con un Password para fisgones.", "rightMiddle", "leftMiddle");
	$('#pasteTitle').tinytip("Escribe una descripcion de tu Paste", "rightMiddle", "leftMiddle");
	
	
}

var pasteOptionsOpen = false;
function pasteOptions()
{
	if(!pasteOptionsOpen)
	{
		$('#pasteOptions').slideDown();
		$('#pasteOptionsIndic').html('-');
		pasteOptionsOpen=true;
		
	}
	else
	{
		$('#pasteOptions').slideUp();
		$('#pasteOptionsIndic').html('+');
		pasteOptionsOpen=false;
	}
}

new function($) {
  $.fn.setCursorPosition = function(pos) {
    if ($(this).get(0).setSelectionRange) {
      $(this).get(0).setSelectionRange(pos, pos);
    } else if ($(this).get(0).createTextRange) {
      var range = $(this).get(0).createTextRange();
      range.collapse(true);
      range.moveEnd('character', pos);
      range.moveStart('character', pos);
      range.select();
    }
  }
}(jQuery);

function rteLeftPos(obj)
{
	var curleft = 0;

	if (obj.offsetParent)
	{
		while (obj.offsetParent)
		{
			curleft += obj.offsetLeft;
			obj      = obj.offsetParent;
		}
	}
	else if (obj.x)
	{
		curleft += obj.x;
	}

	return curleft;
}


function rteTopPos(obj)
{
	var curtop = 0;

	if (obj.offsetParent)
	{
		while (obj.offsetParent)
		{ 
			curtop += obj.offsetTop;
			obj     = obj.offsetParent;
		}
	}
	else if (obj.y)
	{
		curtop += obj.y;
	}

	return curtop;
}

function codestrong()
{
	$('#input_text').val($('#input_text').val() + "<strong></strong>");
	var length = "</strong>";
	length = length.length;
	length = $('#input_text').val().length-length;
	$('#input_text').focus();
	$('#input_text').setCursorPosition(length);
}
function codei()
{
	$('#input_text').val($('#input_text').val() + "<u></u>");
	var length = "</u>";
	length = length.length;
	length = $('#input_text').val().length-length;
	$('#input_text').focus();
	$('#input_text').setCursorPosition(length);
}
function codeem()
{
	$('#input_text').val($('#input_text').val() + "<em></em>");
	var length = "</em>";
	length = length.length;
	length = $('#input_text').val().length-length;
	$('#input_text').focus();
	$('#input_text').setCursorPosition(length);
}
function codestrike()
{
	$('#input_text').val($('#input_text').val() + "<strike></strike>");
	var length = "</strike>";
	length = length.length;
	length = $('#input_text').val().length-length;
	$('#input_text').focus();
	$('#input_text').setCursorPosition(length);
}
var rteMenus = Array();
function rteMenu(name, obj)
{
	var menu = $('#rte-menu-'+name).get(0);
	
	if(menu.style.display != 'block')
	{
		for(var i in rteMenus)
		{
			if(rteMenus[i] == true)
			{
				$('#rte-menu-'+i).get(0).style.display = 'none';
			}
		}
		
		menu.style.display = 'block';
		menu.style.position = 'absolute';
		menu.style.left = rteLeftPos(obj) + "px";
		menu.style.top = (rteTopPos(obj) + obj.offsetHeight) + "px";
		if(menu.offsetWidth < obj.offsetWidth)
		{
			menu.style.width = obj.offsetWidth+"px";
		}
		rteMenus[name] = true;
		if(name == 'colors')
		{
			rteSetColors();
		}
	}
	else
	{
		menu.style.display = 'none';
		rteMenus[name] = false;
	}
}
function rteSetColors()
{
	$.each($('#rte-menu-colors td'), function()
	{
		if(this.id.substr(0, 6) == "color-")
		{
			this.colorCode = this.id.substr(6);
			this.onclick = function()
			{
				rteColor(this.colorCode);
			}
		}
	});
}


function rteColor(color)
{
	$('#input_text').val($('#input_text').val() + "<span style='color:"+color+"'></span>");
	menu = $('#rte-menu-colors').get(0);
	menu.style.display='none';
	var length = "</span>";
	length = length.length;
	length = $('#input_text').val().length-length;
	$('#input_text').focus();
	$('#input_text').setCursorPosition(length);
}

function rteSize(size)
{
	$('#input_text').val($('#input_text').val() + "<span style='font-size:1"+size+"px'></span>");
	menu = $('#rte-menu-sizes').get(0);
	menu.style.display='none';
	var length = "</span>";
	length = length.length;
	length = $('#input_text').val().length-length;
	$('#input_text').focus();
	$('#input_text').setCursorPosition(length);
}


function rteLink()
{
	var url = prompt("Escriba la URL del link", '');
	
	if(typeof url =='string')
	{
		var text = prompt("Escribe el TEXTO del link", '');
	
		if(typeof text == 'string')
		{
			$('#input_text').val($('#input_text').val() + "<a href='"+url+"' target='_new'>"+text+"</a>");
		}
	}
}

function rteImage()
{
	var img = prompt("Inserte la URL de la imagen", '');
	if(typeof img == 'string')
	{
		$('#input_text').val($('#input_text').val() + "<img src='"+img+"'  border='0' />");
	}

}

$(document).ready(function(){
   $("#preview").click(function(evento){
	$.post("preview.php", { dato : $('#input_text').val() }, function(data){
		var pastebinPreview = window.open('','pastebinPreview','height=400,width=400');
		var doc = pastebinPreview.document;
		doc.write("<pre>"+data+"</pre>");
		doc.close();
	});
   });
})
$(document).ready(homeInit);