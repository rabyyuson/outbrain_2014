/**
 * Archives Listing JS
 *
 * The blog archives listing js
 * @url: www.outbrain.com/blog/{archives}
 *
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the blog archives listing object. 
    var ob_blogarchiveslisting = {
       
        init : function(){
           
            var 
                container = $( '.container.content' ),
                navigation = container.find( '.columns.three' );
        
            // On click event handler
            navigation.find( 'h4' ).on( {
                click : function(){
                    navigation.find( 'ul' ).removeClass( 'show' );
                    $(this).next().addClass( 'show' );
                }
            } );
                                  
        }
       
    };
    
    // Initialize and run the init function.
    ob_blogarchiveslisting.init();
      
})(jQuery);