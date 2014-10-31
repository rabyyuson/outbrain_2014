/**
 * Download JS
 *
 * The download js
 * @url: www.outbrain.com/downloads/{slug}
 *
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the download object. 
    var ob_download = {
       
        init : function(){
           
            var
                header = $( 'header.container' ),
                sidebar_container = $( '.columns.four' ),
                container = sidebar_container.find( 'form' ),
                subscription = {
                    list : container.find( '.gform_fields li' )
                };
                
            // If we have a back_url link value, let's use that for the 
            // "Back to Blog" href value.
            if( back_url.length ){
                header.find( '.back' ).attr( 'href', back_url );
            }
        
            // Add the placeholder text pulled from the label
            // Adjust the color of the selected item on change.
            // Get the subscription form fields and search through the post_options
            // array fields that were set to be shown..
            subscription.list.each( function(){
                if( $(this).find( 'input' ).attr( 'type' ) === 'text' ){
                    $(this).find( 'input' ).attr( 'placeholder', $(this).find( 'label' ).text() );
                }
                $(this).find( 'select' ).on({
                    change : function(){
                        $(this).css( 'color', '#000' );
                    }
                });
                for( var i = 0; i < post_options.length; i++ ){
                    if( $(this).hasClass( post_options[i].toString() ) ){
                        $(this).addClass( 'show' );
                    }
                }
            } );
            
        }
       
    };
    
    // Initialize and run the init function.
    ob_download.init();
      
})(jQuery);