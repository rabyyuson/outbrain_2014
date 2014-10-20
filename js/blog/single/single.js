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
                },
                respond = $( '#respond' ), comment_reply = $( '.comment-reply-link' ),
                comment_reply_title = $( '.comment-reply-title' ), social,
                social_share = $( '.social-share' );
        
            // Get the social like counter
            social = {
                get_count : function(){
                    $.ajax( {
                        dataType : 'json',
                        url : stylesheetDir + '/inc/libraries/social-counter/counter.php',
                        data : { url : document.URL },
                        success : function( data ){
                            social_share.find( '.facebook .count' ).text( data.services.facebook );
                            social_share.find( '.twitter .count' ).text( data.services.twitter );
                            social_share.find( '.googleplus .count' ).text( data.services.googleplus );
                            social_share.find( '.linkedin .count' ).text( data.services.linkedin );
                        }
                    } );
                }
            };
            
            social.get_count();
        
            // Get the subscription form fields and search through the post_options
            // array fields that were set to be shown..
            subscription.list.each( function(){
                for( var i = 0; i < post_options.length; i++ ){
                    if( $(this).hasClass( post_options[i].toString() ) ){
                        $(this).addClass( 'show' );
                    }
                }
            } );
                      
            // Loop through all blockquote and calculate the position based on
            // the text-align value.
            content.find( 'blockquote' ).each( function(){
                var 
                    child = $(this).children( 'p' ), float_position;
                float_position = child.attr('style').split( ' ' );
                $(this).attr( 'class', float_position[1].replace( ';', '' ) );
            } );
            
            // Comment Reply click event handler
            comment_reply.on( 'click', function(){
            
                // Add comment inner class.
                // Check if "replying to" field has not been appended yet
                // append the "replying to {author} message.
                respond.find( '.comment-reply-title, .comment-notes' ).addClass( 'inner' );
                if( respond.find( 'form .replying-to' ).length === 0 ){
                    respond.find( 'form' ).append(
                        $( '<p/>' ).attr( 'class', 'replying-to' ).html( 'Replying to ' + $(this).parents( '.comment' ).find( '.author' ).text() )
                    );
                }

            });

            // Comment Reply Title click event handler
            comment_reply_title.find( 'small a' ).on( 'click', function(){
                
                // Remove the "replying to {author} message
                $(this).parents( '.comment-respond' ).find( '.replying-to' ).remove();
                respond.find( '.comment-reply-title, .comment-notes' ).removeClass( 'inner' );

            });
                                  
        }
       
    };
    
    // Initialize and run the init function.
    ob_blogsingle.init();
      
})(jQuery);