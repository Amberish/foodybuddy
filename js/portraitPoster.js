$('#rightPanel').ready(function(){
	//$('#rightPanel').css({'width' : ($(window).width() - ($('#leftPanel').width() + 3)), 'height' : ($('#selectPosterContainer').height() + 100) });	
	$('.potraitPoster').click(function(){
		imageLoc = $(this).parent().find('img').attr('src');
		//taking default font size of any div, to set "title" div size
		$("style").html("@font-face {\n" +
                                    "\tfont-family: \"myFont\";\n" + 
                                    "\tsrc: url(fonts/tahoma.ttf);\n" + 
                                "}\n");
		size = $('#selectPosterContainer').css('font-size');
		$('#fancyboxData').html("<img src='img/loading_with_text.gif' style='margin-left:380px; margin-top:180px'>");
		$.get('./scripts/fancyboxContentForPoster.php', {imageLoc : imageLoc, fontSize : size}, function(data){
			$('#fancyboxData').html(data);
			$('#h-slider').slider({
			    range: "min",
			    min: 0,
			    max: 1.0,
			    value: 1,
			    step: 0.0001,
			    slide: function (event, ui) {
			        $('#imgContainer').css('opacity', ui.value);
			    }
			});
			$('#colorPicker').ColorPicker({
				color: '#FFF',
				onShow: function (colpkr) {
					$(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					$('.selectedElement').css('color', '#' + hex);
				}
			});			
		});
		$('.potraitPoster').fancybox({
			'hideOnContentClick': true,
			wrapCSS    : 'fancybox-custom',
			closeClick : false,

			openEffect : 'none',

			helpers : {
				title : {
					type : 'inside'
				},
				overlay : {
					css : {
						'background' : 'rgba(0,0,0,0.85)'
					}
				}
			},

			afterLoad : function(){
				
			}
		});
	});
});
