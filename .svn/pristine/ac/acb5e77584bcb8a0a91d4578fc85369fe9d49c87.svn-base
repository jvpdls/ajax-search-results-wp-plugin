jQuery(document).on( 'submit', '#casr-search-form', function() {

        var form = jQuery(this);
        var input = form.find('input[name="s"]');
        var query = input.val();
        var content = jQuery('#casr-search-content')

            jQuery.ajax({
                type : 'POST',
                url : myAjax.ajaxurl,
                data : {
                    action : 'load_search_results',
                    query : query
                    },
                beforeSend: function() {
                    content.addClass('loading');
                    jQuery('.casr-loader-text').css('display','inline-block');
                },
                success : function( response ) {
                    jQuery('.casr-loader-text').css('display','none');
                    content.css('margin-top', '30px');
                    content.removeClass('loading');
                    content.html( response );
                }
            });

return false;
});