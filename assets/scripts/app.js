jQuery(document).foundation();

jQuery(document).ready( function($){
	// Fix for youtube / vimeo embeds
	var $all_oembed_videos = $("iframe[src*='youtube'], iframe[src*='vimeo']");
	$all_oembed_videos.each(function() {
		$(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
 	});

	// Header stuck / unstuck
 	$(window).scroll(function() {
		if ($(this).scrollTop() > 0){  
		    $('#header').addClass("header--stuck");
		} else {
		    $('#header').removeClass("header--stuck");
		}
	});

 	// Fix last item
 	$('.row .columns:last-child').addClass('end');
});