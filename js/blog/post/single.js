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
                subscription = $( '.container.content .columns.four .subscription' ),
                subscription = {
                    list : subscription.find( 'ul li' )
                },
                respond = $( '#respond' ), comment_reply = $( '.comment-reply-link' ),
                comment_reply_title = $( '.comment-reply-title' ), social,
                social_share = $( '.social-share' ),
                recommendations = {
                    posts : article_container.find( 'article .recommendations .posts' ),
                    post : article_container.find( 'article .recommendations .post' ),
                    request : {
                        permalink: "http://www.outbrain.com" + window.location.pathname,
                        widgetId: "AR_1"
                    },
                    callback : function( data ) {
                        
                        // Limit the number of recommendations to 4
                        data.doc = data.doc.slice( 0, 4 );
                        
                        // Loop through the recommendations
                        for( var i in data.doc ) {
                            
                            // Create a clone copy of the post container.
                            // Also show this element.
                            var 
                                cloned_article = recommendations.post.clone( false ).css( 'display', 'block' );
                            
                            // Serve 200 x 150 spec
                            // Insert the returned title.
                            // Insert the returned href.
                            // Add the key value as the class name.
                            
                            cloned_article.find( '.image' ).html( '<img src="' + data.doc[i].thumbnail.url + '" width="165" height="165" />' );
                            cloned_article.find( '.content' ).text( data.doc[i].content );
                            cloned_article.attr( { 'href' : data.doc[i].url, 'target' : ( data.doc[i].orig_url.indexOf( 'outbrain.com' ) === -1 ? '_blank' : '_self' ) } );
                            cloned_article.addClass( 'recommendation-' + i );
                            
                            // Add this cloned element to the featured post container.
                            recommendations.posts.append( cloned_article );
                            
                        }
                            
                        recommendations.posts.find( '.post' ).eq(0).remove();
                        
                    }
                };
                
            // Call the Outbrain Widget JS API and load the recommendations
            // through the callback function.
            OBR.extern.callRecs( recommendations.request, recommendations.callback );
        
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
            if( post_options.length > 0 ) {
                subscription.list.each( function(){
                    for( var i = 0; i < post_options.length; i++ ){
                        if( $(this).hasClass( post_options[i].toString() ) ){
                            $(this).addClass( 'show' );
                        }
                    }
                } );
            }
                      
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