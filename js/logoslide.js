$(document).ready(function(){
	$("#logoslide").hover(
		function(){
			$(this).stop().animate({top: '210'});
		},
		function() {
			$(this).stop().animate({top: '3'});
		}
	);
});

