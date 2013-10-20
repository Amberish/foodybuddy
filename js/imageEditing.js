jQuery(document).ready(function($){
	$('#contentContainer').html("<div id='title'></div>");
	$('#contentContainer').append("<div id='description'></div>");

	var titleSelected = function(){
		//adding class selectedElement to 'title' and removing from other------------
		for(var i = 0; i < $('#contentContainer div').length; i++){
			$($('#contentContainer div')[i]).removeClass('selectedElement');
		}
		$('#title').addClass('selectedElement');
		//---------------------------------------------------------------------------
		var font = $('#title').css('font-family');
		var fontSizeSelected = parseInt($('#title').css('font-size'));
		fontAndFontSize(font, fontSizeSelected);
	}

	$('#titleText').keyup(function(){
		titleSelected();
		var titleText = $(this).val();
		$('#title').html(titleText);
		$('#title').draggable({
			containment : 'parent',
			cursor : 'move',
			start : function(){

			},
			drag : function(){
				
			}, 
			stop : function(){

			}
		}).hover(function(){
			$(this).css({'cursor' : 'move', 'border' : '1px dashed #FFF'});
		}).mouseout(function(){
			$(this).css({'border' : 'none'});
		});
	});

	$('#title').click(function(){
		titleSelected();
	});
	//------------------------------------------------------------------------------

	//description -----------------------------------------------------------------
	var descSelected = function(){
		//adding class selectedElement to 'title' and removing from other------------
		for(var i = 0; i < $('#contentContainer div').length; i++){
			$($('#contentContainer div')[i]).removeClass('selectedElement');
		}
		$('#description').addClass('selectedElement');
		//---------------------------------------------------------------------------

		var font = $('#description').css('font-family');
		var fontSizeSelected = parseInt($('#description').css('font-size'));
		fontAndFontSize(font, fontSizeSelected);
	}

	$('#posterDesc').keyup(function(){
		descSelected();		
		var descText = $(this).val();
		$('#description').html(descText);
		$('#description').draggable({
			containment : 'parent',
			cursor : 'move',
			start : function(){

			},
			drag : function(){
				
			}, 
			stop : function(){

			}
		}).hover(function(){
			$(this).css({'cursor' : 'move', 'border' : '1px dashed #FFF'});
		}).mouseout(function(){
			$(this).css({'border' : 'none'});
		});
	});
	$('#description').click(function(){
		descSelected();
	});
	//---------------------------------------------------------------------

	//Bold and italic toggle---------------------------------------------
	$('#textBold').click(function(){
		boldToggle();
	});
	$('#textItalic').click(function(){
		italicToggle();
	});
	//--------------------------------------------------------------------

	//Text font settings----------------------------------------------
	var textFontEvent = function(){
		$('#selectFontSpan').toggle();
	};
	$('#textFont').on('click', textFontEvent);
	$('#selectFont').click(function(){
		$('#textFont').off('click', textFontEvent);
	});

	$('#selectFont').change(function(){
		$('#selectFontSpan').toggle('fast', function(){
			$('#textFont').click(textFontEvent);	
		});
		//taking substr from location 1 in order to change relative directory position:../fonts/abc.ttf => ./fonts/abc.ttf 
		var fontFamilySelected = $('#selectFont').val();
		var fontFamilyDeselected = $('#contentContainer div').not(".selectedElement").css('font-family');
		$.get('scripts/getFontForPoster.php', {familySelected : fontFamilySelected, familyDeselected : fontFamilyDeselected}, function(data){
			var fonts = $.parseJSON(data);
			$("style").html("@font-face {\n" +
                                    "\tfont-family: \"" + fontFamilySelected + "\";\n" + 
                                    "\tsrc: url(" + fonts[fontFamilySelected] + ");\n" + 
                                "}\n"+
                          "@font-face {\n" +
                                    "\tfont-family: \"" + fontFamilyDeselected + "\";\n" + 
                                    "\tsrc: url(" + fonts[fontFamilyDeselected] + ");\n" + 
	                                "}\n");
			$('.selectedElement').css('font-family', fontFamilySelected);
			$('#contentContainer div').not(".selectedElement").css('font-family', fontFamilyDeselected);
		});
	});
	//-----------------------------------------------------------------

	//text size setting------------------------------------------------
	var toggleTextSize = function(){
		$('#setTextSize').toggle();
	};
	$('#textSize').on('click', toggleTextSize);
	$('#textSizeValue').click(function(){
		$('#textSize').off('click', toggleTextSize);
	});
	$('#textSizeValue').change(function(){
		$('#setTextSize').toggle('fast', function(){
			$('#textSize').click(toggleTextSize);	
		});
		var textSize = $('#textSizeValue').val();
		$('.selectedElement').css({'font-size': textSize+'px', 'line-height': textSize+'px'});
	});
	//------------------------------------------------------------------

	

	//create buton after clicking 'create poster'-----------------------------
	$('#createImageButton').click(function(){
		var titleFontUsed = $('#title').css('font-family');
		var titleFontSize = $('#title').css('font-size');
		var titleX = parseInt($('#title').css('left'));
		var titleY = parseInt($('#title').css('top'));
		var titleColor = ($('#title').css('color')).substr(4, ($('#title').css('color')).length - 5).split(',');
		var titleText = $('#title').text();

		var descFontUsed = $('#description').css('font-family');
		var descFontSize = $('#description').css('font-size');
		var descX = parseInt($('#description').css('left'));
		var descY = parseInt($('#description').css('top'));
		var descColor = ($('#description').css('color')).substr(4, ($('#description').css('color')).length - 5).split(',');
		var descText = $('#description').text();
		var opacity = $('#imgContainer').css('opacity');
		
		var variables = {
			imgFile : "../"+imageLoc,
			titleFontUsed : titleFontUsed,
			titleFontSize : titleFontSize,
			titleX : titleX,
			titleY : titleY,
			titleColor : titleColor,
			titleText : titleText,
			opacity : opacity, 

			descFontUsed : descFontUsed,
			descFontSize : descFontSize,
			descX : descX,
			descY : descY,
			descColor : descColor,
			descText : descText
		};
		//console.log($.param(variables)); //use for converting variables to query string; imgFile=myimage.png&fontUsed=myfont.ttf.. like this
		$.get('scripts/createPoster.php', variables, function(data){
			$('#result').html(data);
			$('#viewImage').click(function(){
				var imgLoc = $(this).attr('value');
				$.fancybox("<img src='"+imgLoc+"'>");
			});
		});
	});
	//-------------------------------------------------------------------------

	//Font and font-size updated for element selected--------------------------
	function fontAndFontSize(font, fontSize){
		var fontOptions = $('#selectFont')[0].options;
		var fontLen = fontOptions.length;
		for(var i = 0; i < fontLen; i++) {
			if($(fontOptions[i]).attr('value') == font){
				fontOptions.selectedIndex = i;
			}
		}

		var sizeOptions = $('#textSizeValue')[0].options;
		var sizeLen = sizeOptions.length;
		for(var i = 0; i < sizeLen; i++) {
			if($(sizeOptions[i]).attr('value') == fontSize){
				sizeOptions.selectedIndex = i;
			}
		}
	}
	//-------------------------------------------------------------------------
});
countItalic = 1;
countBold = 1;
function italicToggle(){
	if(countItalic%2 != 0){
		var innerText = $('.selectedElement').html();
		$('.selectedElement').html('<i>'+innerText+'</i>');
		countItalic++;
	}else{
		var innerText = $('.selectedElement').text();
		$('.selectedElement').html(innerText);
		countItalic++;
	}
}

function boldToggle(){
	if(countBold%2 != 0){
		var innerText = $('.selectedElement').html();
		$('.selectedElement').html('<b>'+innerText+'</b>');
		countBold++;
	}else{
		var innerText = $('.selectedElement').text();
		$('.selectedElement').html(innerText);
		countBold++;
	}
}