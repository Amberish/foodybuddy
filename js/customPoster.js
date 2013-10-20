jQuery(document).ready(function($){
	//events to browse image on clicking div------------------
	$('.posterImage').click(function(e){
		$('#poster').click();
	});

	$('#poster').click(function(e) {
	    e.stopPropagation();
	});
	//---------------------------------------------------------

	//previewing image-----------------------------------------
	function readURL(input) {

	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#posterImage').html("<img id='previewImage' src='" + e.target.result + "'>");	//attr('src', e.target.result);
	            //pace is a plugin for beautiful loading status..	
				Pace.stop();
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#poster").change(function(){
		//pace is a plugin for beautiful loading status..	
		Pace.restart();
	    readURL(this);
	});
	//-----------------------------------------------------------

	//submitting form data---------------------------------------
	var options = { 
        target:        '#rightPanel',   // target element(s) to be updated with server response 
        beforeSubmit:  function(){
        	//pace is a plugin for beautiful loading status..	
			Pace.restart();

        	$('#rightPanel').html("<img id='loadingImg'  src='img/burger.gif'>");
        },  // pre-submit callback 
        success: function(){
        	$('#rightPanel').html("<div id='successMessage' class='well'><img src='img/check.png'> &nbsp;Poster uploaded successfully.</div>");
        	
        	//pace is a plugin for beautiful loading status..	
			Pace.stop();
        },  // post-submit callback 
 		url: "./scripts/createPosterDetails.php",
 		type: "POST",
 		
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 

    // bind to the form's submit event 
    $('form#data').submit(function() { 
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit(options); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 
	//-----------------------------------------------------------
});