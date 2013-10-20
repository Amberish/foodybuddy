jQuery(document).ready(function($){
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();
	var citySelectorWidth = 0.5 * windowWidth;
	var citySelectorHeight = 0.6* windowHeight;
	var topCitySeletor = -(citySelectorHeight + 40);

	$('#chooseCity').css({'width' : citySelectorWidth, 'height' : citySelectorHeight, 'top' : topCitySeletor});
	$('#nonOpaque').css({'width' : citySelectorWidth, 'height' : citySelectorHeight, 'top' : topCitySeletor});
	$('#searchCity').css({'top':(citySelectorHeight-30)});

	$('#notch').click(function(){

		var topValue = parseInt($('#chooseCity').css('top'));
		if(topValue <= (topCitySeletor+11) && topValue >= topCitySeletor){
			$('#chooseCity').animate({
			'top' : '0px'
			}, 'fast');
			$('#nonOpaque').animate({
				'top' : '0px'
			}, 'fast');
			$(this).animate({
				'top' : -topCitySeletor+'px'
			}, 'fast');	
		}else{
			$('#chooseCity').animate({
			'top' : topCitySeletor+'px'
			}, 'fast');
			$('#nonOpaque').animate({
				'top' : topCitySeletor+'px'
			}, 'fast');
			$(this).animate({
				'top' : 0+'px'
			}, 'fast');
		}		
	});

	$('#notch').mouseover(function(){
		if($('#chooseCity').css('top') == topCitySeletor+'px'){
			$('#chooseCity').animate({
				'top' : (topCitySeletor+10)+'px'
			});
			$('#nonOpaque').animate({
				'top' : (topCitySeletor+10)+'px'
			});
			$(this).animate({
				'top' : '10px'
			});
		}
	});
	$('#notch').mouseout(function(){
		if($('#chooseCity').css('top') == (topCitySeletor+10)+'px'){
			$('#chooseCity').animate({
				'top' : topCitySeletor+'px'
			});
			$('#nonOpaque').animate({
				'top' : topCitySeletor+'px'
			});
			$(this).animate({
				'top' : '0px'
			});
		}
	});
});