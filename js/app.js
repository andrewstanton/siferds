( function( $ ) {
    // Overwrite Bootstrap Gallery
    $(document).on('click', '.eicon-close', function(){
        $('#blueimp-gallery').hide();
        $('body').css({'overflow': ''});
        });
    $(document).on('click', '.elementor-lightbox-item', function(){
        $('#blueimp-gallery').hide();
        $('body').css({'overflow': ''});
        });

} )( jQuery );
