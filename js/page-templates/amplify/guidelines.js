
/**
 * The Guidelines Page JS
 * 
 * The main JS file for the Guidelines page.
 * @url: www.outbrain.com/amplify/guidelines
 * 
 * -----------------------------------------------------------------------------
 */

;(function($){
   
   // Localize the frontpage object. 
    var ob_guidelinespage = {
       
        init : function(){
            
            var
                accordion = $( '.row.content .accordion' );
                
            // Click event handler
            accordion.find( '.entry' ).on({
                click : function(){
                    ( $(this).hasClass( 'active' ) ? $(this).removeClass( 'active' ) : $(this).addClass( 'active' ) );
                }
            });
            
        }
       
    };
    
    // Initialize and run the init function.
    ob_guidelinespage.init();
      
})(jQuery);