(function ($) {
    $('.search-toggle').on('click', function(){
        $(this).parent().toggleClass('open');
        if ($(this).parent().hasClass('open')) {
            $('.search-field').focus();
        }
    });
})(jQuery);