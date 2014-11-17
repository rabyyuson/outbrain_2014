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
                hero = {
                    image : container.find( '.row.hero' ),
                    load_first : false,
                    load_second : true
                },
                video_wrapper = container.find( '.meet-team .wrapper' );
            
            // Video on click event handler..
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
            
            // Window scroll event for the sub-navigation menu
            $( window ).scroll( function() {

                var 
                    win = {
                        scroll_top : $( window ).scrollTop()
                    };
                    
                clearTimeout( $.data( this, 'scrollTimerCareers' ) );
                
                $.data( this, 'scrollTimerCareers', setTimeout(function() {

                    console.log(win.scroll_top)

                    // Toggle the hero background image.
                    if ( win.scroll_top > 485 ) {
                      
                        if( hero.load_first ){
                            hero.image.css( 'background-image', hero.image.css('background-image').replace( 'hero2.jpg', 'hero1.jpg' ) );
                        } else if( hero.load_second ) {
                            hero.image.css( 'background-image', hero.image.css('background-image').replace( 'hero1.jpg', 'hero2.jpg' ) );
                        }
                        
                    } else if( win.scroll_top === 0 ) {
                        
                        if( hero.load_first ){
                            hero.load_first = false;
                            hero.load_second = true;
                        } else {
                            hero.load_second = false;
                            hero.load_first = true;
                        }
                        
                    } 

                }, 10 ) );
                
            } );
            
        }
       
    };
    
    // Initialize and run the init function.
    ob_careers.init();
      
})(jQuery);