/**
 * Blog Single JS
 *
 * The blog post detail js
 * @url: www.outbrain.com/blog/{slug}
 *
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the blog post detail object. 
    var ob_blogsingle = {
       
        init : function(){
           
            var
                container = $( '.container.content .columns.four .container' ),
                subscription = {
                    container : container.find( '.subscription' ),
                    form : container.find( '.subscription form' ),
                    list : container.find( '.subscription ul li' )
                };
        
            // Get the subscription form fields and search through the post_options
            // array fields that were set to be shown..
            subscription.list.each( function(){
                for( var i = 0; i < post_options.length; i++ ){
                    if( $(this).hasClass( post_options[i].toString() ) ){
                        $(this).addClass( 'show' );
                    }
                }
            } );
                                  
        }
       
    };
    
    // Initialize and run the init function.
    ob_blogsingle.init();
      
})(jQuery);