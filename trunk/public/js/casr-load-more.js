jQuery(document).on('click', '#casr-load-more', function() {

    var form = jQuery('#casr-search-form');
    var input = form.find('input[name="s"]');
    var query = input.val();
    var content = jQuery('#casr-search-content');
    var button = jQuery('#casr-load-more');

    jQuery('#casr-search-form').on('submit', function() {
        casr_load_more_params.current_page = 1;
    });

        jQuery.ajax({
            type : 'POST',
            url : casr_load_more_params.ajaxurl,
            data : {
                action : 'load_more_posts',
                query : query,
                page : casr_load_more_params.current_page
                },
            beforeSend : function() {
            button.replaceWith(`<img src='${casr_load_more_params.loading_image}' width='70px' height='70px'/>`);
            }, 
            success : function(response) {
                var img = jQuery('#casr-center');
                img.replaceWith('<hr class="casr-hr"/>');
                content.append(response);
                casr_load_more_params.current_page++;
            }
        });

return false;
});