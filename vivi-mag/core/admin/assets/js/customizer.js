(function($) {

    wp.customize('background_color', function(value) {
    
        value.bind(function(new_value) {

            var bg_image = $('body').css('background-image');

            if (
                bg_image === 'none' &&
                (
                    new_value === 'ffffff' || 
                    new_value === '#ffffff'
                )
            ) {
                $('body').addClass('is_minimal_layout');
            } else {
                $('body').removeClass('is_minimal_layout');
            }
    
        });
    
    });

    wp.customize('background_image', function(value) {

        value.bind(function(new_value) {

            var bg_color = $('body').css('background-color');

            if (new_value) {
                $('body').removeClass('is_minimal_layout');
            }

            if (
                !new_value && 
                bg_color == 'rgb(255, 255, 255)'
            ) {
                $('body').addClass('is_minimal_layout');
            }

        });
        
    });

})(jQuery);