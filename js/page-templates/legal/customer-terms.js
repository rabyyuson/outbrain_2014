/**
 * The Customer Terms JS
 * 
 * The main JS file for the Customers Terms page.
 * @url: www.outbrain.com/legal/customer-terms
 * 
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the press page object. 
    var ob_customertermspage = {
       
        init : function(){
                       
            var 
                content = $( '.row.content' ),
                country_list = content.find( '.country-selector select[name=country-list]' ),
                body_copy = content.find( '.body-copy' ),
                terms = body_copy.find( '.terms' ),
                loader = content.find( '.loader' );
    
            body_copy.find( '.hide' ).hide();
            
            // Change event handler
            country_list.on({
                
                change : function(){
                    
                    var 
                        option_value = '.terms-' + $( this ).val().toString();
                        
                    terms.hide();
                    loader.show();
                    
                    setTimeout( function() {
                        loader.hide();
                        body_copy.find( option_value ).show();
                    }, 800 );
                    
                }
                
            });
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_customertermspage.init();
      
})(jQuery);