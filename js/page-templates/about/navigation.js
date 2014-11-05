/**
 * The Navigation Menu JS for the About page
 *
 * The global navigation menu JS file for the About page.
 * @url: www.outbrain.com/about/{page}
 *
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the navigation menu object. 
    var ob_navigationmenu = {
       
        init : function(){
                       
            var 
                container = $( '.container.about' ),
                sub_nav_first_level = container.find( '.sub-navigation.first-level' ),
                sub_nav_second_level = container.find( '.sub-navigation.second-level' );
            
            // Window scroll event for the sub-navigation menu
            $( window ).scroll( function() {

                var 
                    win = {
                        scroll_top : $( window ).scrollTop(),
                        width : $( window ).width()
                    };
                    
                clearTimeout( $.data( this, 'scrollTimer' ) );
                
                $.data( this, 'scrollTimer', setTimeout(function() {

                    // Show or hide the sub navigation panel
                    if ( win.scroll_top > 485 && win.width > 971 ) {
                      
                        // Hide the first level navigation then show the second level navigation
                        // Add some padding to the discovery section to prevent jumping
                        sub_nav_first_level.removeClass( 'show' ).addClass( 'hide' );
                        sub_nav_second_level.removeClass( 'hide' ).addClass( 'show' );
                        container.find( '.navigation-clip' ).addClass( 'padded' );
                        
                    } else {
                        
                        // Reverse the process found in the first if condition
                        sub_nav_first_level.removeClass( 'hide' ).addClass( 'show' );
                        sub_nav_second_level.removeClass( 'show' ).addClass( 'hide' );
                        container.find( '.navigation-clip' ).removeClass( 'padded' );
                          
                    } 

                }, 10 ) );
                
            } );
            
        }
       
    };
    
    // Initialize and run the init function.
    ob_navigationmenu.init();
      
})(jQuery);