$(document).ready(function() {
        $('#adblock img').click(function(evt) {
                 //get path to new image
           var imgPath = $(this).attr('src');
                 //get reference to old image
                 var oldImage = $('#photo img');
                                        
                         //create HTML for new image
                         var newImage = $('<img src="' + imgPath +'">');
                         //make new image invisible
                         newImage.hide();
                         //add to the #photo div
                         $('#photo').prepend(newImage);
                         //fade in new image
                         newImage.fadeIn(200);
                         
                         //fade out old image and remove from DOM
                         oldImage.fadeOut(200,function(){
                     $(this).remove();
                                });
                         
                 $('.adtexth1, .adtexth4').hide();
        }); // end click
                
                $('#gallery a:first').click();
}); // end ready
