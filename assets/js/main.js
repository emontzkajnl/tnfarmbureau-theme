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
        const totalPages = button.data('total');
        const data = {
            action: "loadarchives",
            cat,
            totalPages,
            currentPage: window.current_page
        };
        $.ajax({
            url: params.ajaxurl,
            data: data,
            type: "POST",
            dataType: "JSON",
            success: function(res) {
                if (res) {
                    console.log(res);
                    $('.archive-container').append(res);
                    window.current_page++;
                }
            }
        });
    });
    // county-autocomplete
    function createCountyList() {
        console.log('function running');
       
        $.ajax({
            url: params.ajaxurl,
            data: {
                action: 'createCountyList'
            },
            type: "POST",
            dataType: "JSON",
            success: function(res) {
                console.log('res is ',res);
                let newArray = [];
                res.data.forEach(element => {
                    console.log('el ',element);
                    newArray.push({
                        'label' : element[0],
                        'value' : element[1]
                    })
                });
                $('#county-autocomplete').autocomplete({
                    source: newArray,
                    select: function(event, ui) {
                        event.preventDefault();
                        $(this).val(ui.item.label);
                        window.location.href = ui.item.value;
                      }
                })
            }
        })
    }
    // if (document.body.contains('home')) {
        createCountyList();
    // }
    
})(jQuery);