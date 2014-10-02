
/**
 * The Team Page JS
 * 
 * The main JS file for the Team page.
 * @url: www.outbrain.com/about/team
 * 
 * -----------------------------------------------------------------------------
 */

;(function($){
   
   // Localize the team page object. 
    var ob_teampage = {
       
        init : function(){
                       
            var
                section = $( '.row.people .section' ),
                profile = {
                    biography : section.find( 'ul li .biography' )
                };
                
            // Loop through the individual profile biography. 
            profile.biography.each( function( index ){
                
                var
                    element = {
                        self : $(this),
                        height : $(this).outerHeight()
                    };
                    
                // Set the default height of the user's profile biography
                element.self.css( 'height', 135 );
                
                // Check if the profile biography is greater than our desired height
                // If this is true, then show a "Read More" toggle button to 
                // expand or collapse the rest of the bio copy.
                if( element.height > 135 ){
                    
                    $(this).after( addButton() );
                    
                    function addButton(){
                        return '<div class="read-more">Read More</div>';
                    }
                    
                }
                
            } );
            
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_teampage.init();
      
})(jQuery);