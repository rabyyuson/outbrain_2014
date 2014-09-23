
/**
 * The Offices Page JS
 * 
 * The main JS file for the Press page.
 * @url: www.outbrain.com/about/press
 * 
 * -----------------------------------------------------------------------------
 */

;(function($){
   
   // Localize the offices page object. 
    var ob_officespage = {
       
        init : function(){
                       
            var 
                locations = $( '.row.locations' ),
                navigation = locations.find( '.navigation' ),
                information = locations.find( '.information' ),
                information_list;
        
            // Display the background image based on the selected list item
            information_list = function( index ){
                locations.css( 'background-image', 'url( ' + information.find( 'li' ).eq( index ).find( '.background-image' ).data( 'image_path' ) + ')' );
            };
        
            // Get the first list item and display its background image
            information_list(0);
            
            // Click event handler
            navigation.find( 'a' ).on({
                click : function(){
                    
                    var 
                        selected = $(this).parent().index();
                        
                    // Remove all current class from the list
                    // Add the currently selected list the "current" class
                    navigation.find( 'li' ).removeClass( 'current' );
                    $(this).parent().addClass( 'current' );
                    
                    // Get the selected background image and display it
                    information_list( selected );                  
                    
                    // Hide all information box then move and display the 
                    // information box based on the selected index
                    information.find( 'li' ).hide();
                    information.find( 'li' ).eq( selected ).show();
                    information.css( 'margin-top', ( selected * 34 ) + 'px' );
                }
            });
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_officespage.init();
      
})(jQuery);