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
                article_container = $( '.container.content .columns.eight' ),
                content = article_container.find( 'article .content' ),
                sidebar_container = $( '.sidebar_container.content .columns.four .sidebar_container' ),
                subscription = {
                    sidebar_container : sidebar_container.find( '.subscription' ),
                    form : sidebar_container.find( '.subscription form' ),
                    list : sidebar_container.find( '.subscription ul li' )
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
                      
            content.find( 'blockquote' ).each( function(){
                var 
                    child = $(this).children( 'p' ), float_position;
                float_position = child.attr('style').split( ' ' );
                $(this).attr( 'class', float_position[1].replace( ';', '' ) );
            } );
                                  
        }
       
    };
    
    // Initialize and run the init function.
    ob_blogsingle.init();
      
})(jQuery);