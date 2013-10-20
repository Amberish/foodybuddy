jQuery(document).ready(function($){
	var hash = $(this)[0]['URL'];
	var url = hash.substr(hash.indexOf('#')+1);
	if(url == 'make_more_fans'){
		url = 'makeMoreFans';
	}
	var pageToFetch = 'innerContent.php';

	//check which field is selected and style that particular link rather than 'home'
	if(url.length < 20 && url.length != 0){
		$('#leftPanel ul a li').removeClass('active');
		var numElements = $('#leftPanel ul a li').length;
		for(var i = 0; i< numElements; i++){
			if($($('#leftPanel ul a')[i]).attr('value') == url){
				$($('#leftPanel ul a li')[i]).addClass('active');
			}
		}
	}
	//for selecting home if page refreshed for no hash value or with no hash at all.
	else{
		$('#leftPanel ul a:nth-child(1) li').addClass('active');
	}

	//Sencing for enter.. if pressed then check text field
	$(document).keypress(function(e) {
		hash = $(this)[0]['URL'];
		url = hash.substr(hash.indexOf('#')+1);
		//Condition so that event fire corresponding to 'home' only..
		if(url == 'home' || url.length == 0 || url.length > 30){
		    if(e.which == 13) {
		       var textValue = $('#homeContent input').val();
		       if(textValue == ''){
		       		alert('Please type something in the text field!');
		       		$('#homeContent input').focus();
		       }else{
		       		//pace is a plugin for beautiful loading status..
		       		Pace.restart();
		       		$.get(pageToFetch, {url : 'pageAfterHome', id : textValue}, function(data){
		       			$('#rightPanel').html(data);
		       			$('#pageAfterHomeUrl').css({'width' : ($('#rightPanel').width()*0.8), 'margin-left' : '8%', 'margin-top' : '20px'});
		       			
		       		}).success(function(){
		       			//pace is a plugin for beautiful loading status..
		       			Pace.stop();
		       		});
		       }
		    }
		    if(e.which == 8 && (url == 'home' || url.length > 20)){
		    	//pace is a plugin for beautiful loading status..
		    	Pace.restart();
		    	$.get(pageToFetch, {url : 'home'}, function(data){
	       			$('#rightPanel').html(data);
	       			$('#homeContent input').focus();
	       		}).success(function(){
	       			//pace is a plugin for beautiful loading status..
	       			Pace.stop();

	       		});
		    }
		}
	});

	//setting rightPanel(main) width
	$('#rightPanel').css({'width' : ($(window).width() - ($('#leftPanel').width() + 3)), 'min-height' : ($(window).height()*0.82) });

	//pace is a plugin for beautiful loading status..
	Pace.restart();
	$.get(pageToFetch, {url : url}, function(data){
		$('#rightPanel').html(data);

		if(url == 'home' || url.length > 20){
			$('#homeContent input').focus();
		}
	}).success(function(){
		//pace is a plugin for beautiful loading status..
		Pace.stop();
		//setting rightPanel(main) width
		$('#rightPanel').css({'width' : ($(window).width() - ($('#leftPanel').width() + 3)), 'min-height' : ($(window).height()*0.82) });

	});

	$('#leftPanel ul a').click(function(){
		$('#leftPanel ul a li').removeClass('active');
		$(this).children('li').addClass('active');
		url = $(this).attr('value'); 

		//pace is a plugin for beautiful loading status..
		Pace.restart();
		$.get(pageToFetch, {url : url}, function(data){
			$('#rightPanel').html(data);

			if(url == 'home' || url.length > 20){
				$('#homeContent input').focus();
			}
			
		}).success(function(){
			//pace is a plugin for beautiful loading status..
			Pace.stop();
			switch(url){
				case "home" :
					$('#rightPanel').css({'width' : ($(window).width() - ($('#leftPanel').width() + 3)), 'height' : ($('#pageAfterHomeUrl').height() + 20) });
					break;
				case "fans" :
					$('#rightPanel').css({'width' : ($(window).width() - ($('#leftPanel').width() + 3)), 'height' : ($('#fansRightPanel').height() + 20) });
					break;
				case "createPoster" :
					$('#rightPanel').css({'width' : ($(window).width() - ($('#leftPanel').width() + 3)), 'height' : ($('#createPoster').height() + 60) });
					break;
				default :
					$('#rightPanel').css({'width' : ($(window).width() - ($('#leftPanel').width() + 3)), 'height' : ($(window).height()*0.82)});
			}
		});
	});
});