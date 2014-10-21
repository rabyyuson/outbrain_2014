/**
 * Author Listing JS
 *
 * The blog author listing js
 * @url: www.outbrain.com/blog/authors
 *
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the blog author listing object. 
    var ob_blogauthorlisting = {
       
        init : function(){
           
            var 
                container = $( '.container.content .columns.eight' ),
                toggle = container.find( '.toggle' ),
                listing = container.find( '.listings .listing' );
        
            // On click event handler
            toggle.find( 'a' ).on( {
                click : function(){
                    toggle.find( 'a' ).removeClass( 'active' );
                    $(this).addClass( 'active' );
                    listing.removeClass( 'active' );
                    listing.eq( $(this).index() ).addClass( 'active' );
                }
            } );
                                  
        }
       
    };
    
    // Initialize and run the init function.
    ob_blogauthorlisting.init();
      
})(jQuery);