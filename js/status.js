$(document).ready(function() {
	$("#status").show().delay(1000).queue(function(n) {
		$(this).fadeOut(); n();
	});
});
