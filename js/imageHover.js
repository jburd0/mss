$(document).ready(function() {
	$(".mainimgads").hover(
   	function(){
		$(this).animate({width: '105px', height:'105px'}, 200);
	},         
  	function(){
		$(this).animate({width: '100px', height:'100px'}, 200);
	}
	);
});    
