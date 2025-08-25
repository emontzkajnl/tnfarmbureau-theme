(function ($) {
    $('.search-toggle').on('click', function(){
        $(this).parent().toggleClass('open');
        if ($(this).parent().hasClass('open')) {
            $('.search-field').focus();
        }
    });
    $('.load-more-archive').on('click', function() {
        const button = $(this);
        const cat = button.data('cat');
        const totalPages = button.data('total_pages');
        const data = {
            action: "loadarchives",
            cat,
            totalPages,
            currentPage: window.current_page
        };
        $.ajax({
            url: visualcomposerstarter.ajax_url,
            data: data,
            type: "POST",
            dataType: "html",
            success: function(res) {
                if (res) {
                    console.log(res);
                    $('.archive-container').append(res);
                    window.current_page++;
                }
            }
        });
    });
})(jQuery);