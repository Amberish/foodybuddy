jQuery(document).ready(function(){	

	//manupulations for first li-------------------------------------------------------
	$('#fanSearchOptions ul li:nth-child(1) a').click(function(){
		$(this).addClass('btn-primary');
		$('#fanSearchOptions ul').animate({
			'margin-top' : '18%'
		});
		$('#fanSearchOptions ul li:nth-child(2)').css({'visibility' : 'hidden'});
		$('#fanSearchOptions ul li:nth-child(1) span').show();
		$('#fanSearchOptions ul li:nth-child(1) span input').focus();
		$(this).unbind('mouseout');
	});

	$('#fanSearchOptions ul li a').mouseover(function(){
		$(this).addClass('btn-primary');
	});

	$('#fanSearchOptions ul li a').mouseout(function(){
		$(this).removeClass('btn-primary');
	});
	//----------------------------------------------------------------------------------

	//manipulation for second li--------------------------------------------------------
	$('#fanSearchOptions ul li:nth-child(2) a').click(function(){

		//pace is a plugin for beautiful loading status..
		Pace.start();
		$.get('innerContent.php', {url : 'searchAllFans'}, function(data){
			$('#rightPanel').html(data);
			$('#rightPanel').css({'width' : ($(window).width() - ($('#leftPanel').width() + 20)), 'height' : ($('#fansRightPanel').height() + 20) });
		}).success(function(){
			//pace is a plugin for beautiful loading status..
		    Pace.stop();
		});
	});
	//----------------------------------------------------------------------------------

	//if first option selected, then checking for the input-----------------------------
	$(document).keypress(function(e) {
		var url = $(this)[0]['URL'];
		var hash = url.substr(url.indexOf('#')+1);

		if(e.which == 13 && hash == 'search_by_fan_name_or_ID') {
			var nameOrID = $('#fanNameOrID').val();
			if(nameOrID != ""){
				//pace is a plugin for beautiful loading status..
		       	Pace.start();
				$.get('innerContent.php', {url : 'searchFanByNameOrID', nameOrID : nameOrID}, function(data){
					$('#rightPanel').html(data);
				}).success(function(){
					//pace is a plugin for beautiful loading status..
		       		Pace.stop();
				});
			}
		}
	});
	//----------------------------------------------------------------------------------
});