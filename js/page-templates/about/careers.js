/**
 * The Careers Page JS
 * 
 * The main JS file for the Careers page.
 * @url: www.outbrain.com/about/careers
 *
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the careers object. 
    var ob_careers = {
       
        init : function(){
                       
            var 
                container = $( '.container.about' ),
                video_wrapper = container.find( '.meet-team .wrapper' );
            
            // Declare event handlers..
            
            video_wrapper.on({
                click : function(){
                    var
                        video = $(this).find( '.video' ),
                        video_src = video.data( 'src' );
                    if( $(this).find( 'iframe' ).length === 0 ){
                        video.replaceWith( $( '<iframe/>' ).attr({ 'src' : video_src, 'width' : '303', 'height' : '506', 'frameborder' : 0 }).prop( 'allowfullscreen', true ) );
                        $(this).find( '.information' ).hide()
                    }
                    
                }
            });
            
        }
       
    };
    
    // Initialize and run the init function.
    ob_careers.init();
      
})(jQuery);