$(document).ready(function() {
        $('.admina').click(function() {
                var $this = $(this);
                //hide tabs
                $('.tabs').hide();
                $('.active').removeClass('active');
                $this.addClass('active');
                var tab = $this.attr('href');
                // show panel
                $(tab).show();
                return (false);
        }); // end click
        $('.adminli:first .admina').click();
}); //end ready function
