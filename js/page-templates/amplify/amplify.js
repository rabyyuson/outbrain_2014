/**
 * The Amplify Page JS
 * 
 * The main JS file for the Amplify page.
 * @url: www.outbrain.com/amplify
 * 
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the frontpage object. 
    var ob_amplifypage = {
       
        init : function(){
           
            var 
                container = $( '.container.page-template.amplify' ),
                testimonials = container.find( '.row.testimonials' ),
                testimonial = testimonials.find( '.testimonial' ),
                publisher, content,
                sub_nav_first_level = container.find( '.sub-navigation.first-level' ),
                sub_nav_second_level = container.find( '.sub-navigation.second-level' );
            
            // Encapsulate the publisher section
            publisher = {

                // Get the logos and animate it
                logos : function() {
                    
                    // Retrieve the partners listing image
                    var partners = container.find( '.row.publisher-reach .animation img' );

                    // Move the image up
                    partners.animate( {
                        top : '-=1px'
                    }, 1, function() {

                        // When animation is complete get the image position
                        publisher.img_location = -Math.abs( parseInt( partners.attr( 'style' ).match( /[0-9]+/g )[0] ) );

                        // Check if the image is out of the view
                        if( publisher.img_location === -Math.abs( partners.height() - 40 ) ) {

                            // Clone the image and position it accordingly
                            partners.after( partners.clone().removeAttr( 'style' ).css( {
                                top : '60px'
                            } ) );

                            // Remove the last shown image after 2 secs.
                            setTimeout( function() { partners.eq(0).remove(); }, 4000 );

                        }

                    });

                }

            };
            
            // Declare the content navigation for the sub nav links on click event
            content = {
                
                scroll_to : function( where ) {
                    $( 'body, html' ).stop().animate( {
                        scrollTop : where
                    }, 750 );
                }
                
            };
            
            // Rotate the logos every 25 ms.
            setInterval( function() { publisher.logos(); }, 50 );
            
            
            /*******************************************************************
             * Even Handlers
             ******************************************************************/
            
            
            // Show or hide the testimonial profile on click
            testimonials.find( '.testimonial .profile' ).on( 'click', function(){
                testimonial.removeClass( 'active' );
                $( this ).parent().addClass( 'active' );
            } );
            
            // Sub navigation second level click handlers
            container.find( '.sub-navigation .nav-link' ).on( 'click', function() {
                
                switch( $(this).data( 'jump' ) ) {
                    
                    case 'first' :
                        content.scroll_to( 581 );
                        break;
                    case 'second' :
                        content.scroll_to( 1867 );
                        break;
                    case 'third' :
                        content.scroll_to( 2707 );
                        break;
                    default:
                        break;
                    
                }
                
            } );
            
            // Window resize event for the sub-navigation menu
            $( window ).resize( function() {
                
                clearTimeout( $.data( this, 'scrollTimer' ) );

                $.data( this, 'scrollTimer', setTimeout(function() {
                    
                    ( $( window ).width() < 971 ? sub_nav_second_level.removeClass( 'show' ).addClass( 'hide' ) : false );
                    
                }, 100 ) );
                
            } );
            
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
                    if ( win.scroll_top > 580 && win.width > 971 ) {
                      
                        // Hide the first level navigation then show the second level navigation
                        // Add some padding to the content-discover section to prevent jumping
                        sub_nav_first_level.removeClass( 'show' ).addClass( 'hide' );
                        sub_nav_second_level.removeClass( 'hide' ).addClass( 'show' );
                        container.find( '.content-discover' ).addClass( 'padded' );
                        
                    } else {
                        
                        // Reverse the process found in the first if condition
                        sub_nav_first_level.removeClass( 'hide' ).addClass( 'show' );
                        sub_nav_second_level.removeClass( 'show' ).addClass( 'hide' );
                        container.find( '.content-discover' ).removeClass( 'padded' );
                          
                    } 
                    
                    // Move the indicator depending on the window scroll top position
                    if ( win.scroll_top > 580 && win.scroll_top < 1750 ) {
                        
                        // Position the indicator to the first section
                        sub_nav_second_level.find( '.indicator' ).attr( 'data-indicator_position', 'first' );
                    
                    } else if ( win.scroll_top > 1750 && win.scroll_top < 2580 ) {
                    
                        // Position the indicator to the second section
                        sub_nav_second_level.find( '.indicator' ).attr( 'data-indicator_position', 'second' );
                        
                    } else if ( win.scroll_top > 2580 ) {
                    
                        // Position the indicator to the third section
                        sub_nav_second_level.find( '.indicator' ).attr( 'data-indicator_position', 'third' );
                        
                    }

                }, 10 ) );
            
            } );
            
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_amplifypage.init();
      
})(jQuery);