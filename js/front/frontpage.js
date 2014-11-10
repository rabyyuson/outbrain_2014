/**
 * Homepage JS
 *
 * The homepage/frontpage js
 * @url: www.outbrain.com
 *
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the frontpage object. 
    var ob_frontpage = {
       
        init : function(){
           
            var 
                container = $( '.container.homepage' ), publisher;
   
            // Encapsulate the publisher section
            publisher = {

                // Get the logos and animate it
                logos : function() {
                    
                    // Retrieve the partners listing image
                    var partners = container.find( '.row.discovery-platform .animation img' );

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
            
            // Rotate the logos every 25 ms.
            setInterval( function() { publisher.logos(); }, 50 );

            // Options for the testimonials
            var options = {
                $AutoPlay: false,
                $PauseOnHover: 1,
                $ArrowKeyNavigation: true,
                $SlideWidth: 600,
                $SlideSpacing: 0,
                $DisplayPieces: 2,
                $ParkingPosition: 200,

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,
                    $ChanceToShow: 2,
                    $AutoCenter: 2,
                    $Steps: 1
                }
            };

            // Create the testimonials slider
            new $JssorSlider$( 'carousel', options);
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_frontpage.init();
      
})(jQuery);