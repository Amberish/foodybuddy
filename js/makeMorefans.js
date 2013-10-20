jQuery(document).ready(function(){
	var url = '';
	$('#rightPanel').css({'width' : ($(window).width() - ($('#leftPanel').width() + 3)), 'height' : ($('#createPoster').height() + 80) });
	$('#makeMoreFans ul li a').click(function(){
		url = $(this).attr('value');
		//pace is a plugin for beautiful loading status..
		Pace.restart();
		$.get('innerContent.php', {url : url}, function(data){
			$('#rightPanel').html(data);
			$('#rightPanel').css({'width' : ($(window).width() - ($('#leftPanel').width() + 3)), 'height' : ($('#createPoster').height() + 80) });
		}).success(function(){
			//pace is a plugin for beautiful loading status..
			Pace.stop();
		});
	});
})