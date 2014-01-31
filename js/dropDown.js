$(document).ready(function(){
 $("#dropdown, .logout").hover(
        function(){
                $(".logout").stop().slideDown(200);
        },
        function(){
                $(".logout").stop().slideUp(200);
        }
        );

});
