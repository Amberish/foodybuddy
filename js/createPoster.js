jQuery(document).ready(function($){
	$('#createPosterContainer ul li a').click(function(){
		url = $(this).attr('value');

		//pace is a plugin for beautiful loading status..	
		Pace.restart();
		$.get('innerContent.php', {url : url}, function(data){
			$('#rightPanel').html(data);	
			switch(url){
				case 'selectPoster':
				$('#rightPanel').css({'width' : ($(window).width() - ($('#leftPanel').width() + 3)), 'height' : ($('#selectPosterContainer').height() + 100) });
				break;

				case 'customPoster':
				$('#rightPanel').css({'width' : ($(window).width() - ($('#leftPanel').width() + 3)), 'height' : ($('#customPoster').height() + 100) });	
				break;
			}		

		}).success(function(){
			//pace is a plugin for beautiful loading status..
			Pace.stop();
		});
	});
});