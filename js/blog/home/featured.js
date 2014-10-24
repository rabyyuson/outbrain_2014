/**
 * Blog Home Featured JS
 *
 * The blog home featured js
 * @url: www.outbrain.com/blog
 *
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the blog home featured object. 
    var ob_bloghomefeatured = {
       
        init : function(){
           
            var 
                listing = $( '.container.content .blog-posts' ),
                featured = {
                    container: listing.find( '.featured-posts' ),
                    article : listing.find( '.featured-posts article' ),
                    social : [],
                    request : {
                        permalink: "http://www.outbrain.com/blog",
                        widgetId: "HOP_2"
                    },
                    callback : function( data ){
                        
                        // Loop through the recommendations
                        for( var i in data.doc ){
                            
                            // Create a clone copy of the article container.
                            // Also show this element.
                            var 
                                cloned_article = featured.article.clone( true ).css( 'display', 'block' ), counter = -1;
                                
                            // Identify the element's order sequence.
                            if( parseInt( i ) === 0 ){
                                
                                // Check if this is the first element.
                                // Apply 'first' class name and also serve a bigger 
                                // image than the rest.
                                cloned_article.find( '.thumbnail .image' ).html( '<img src="' + data.doc[i].thumbnail.url + '" />' );
                                
                            } else {
                                
                                // If this is not the first element, serve 200 x 150 spec
                                cloned_article.find( '.thumbnail .image' ).html( '<img src="' + data.doc[i].thumbnail.url + '" width="200" height="150" />' );
                                
                            }
                            
                            // All other changes and not order specific.
                            // - Insert the returned title.
                            // - Insert the returned href.
                            // - Add the key value as the class name.
                            cloned_article.find( '.information .title a' ).text( data.doc[i].content );
                            cloned_article.find( '.information .title a, .information .content a' ).attr( { 'href' : data.doc[i].url } );
                            cloned_article.addClass( 'recommendation-' + i );
                                
                            // Add this cloned element to the featured post container.
                            featured.container.append( cloned_article );
                
                            // Remove the first template article from the featured list.
                            featured.article.eq(0).remove();
                            
                            // Pass in the original url of each recommendation to calculate the share count.
                            // Pull the ajax promise data and perform operations on the data

                            var
                                promise = window.promise( data.doc[i].orig_url );

                            // Attach the done function to retrieve the data from the promise.
                            // Iterate through the featured articles and add the share count.
                            promise.done( function( data ){
                                $( featured.container[0].children[ counter += 1 ] ).find( '.thumbnail .social .count' ).text( data.count + ' Shares' );
                            } );
                
                        }

                    }
                };
            
            // Call the Outbrain Widget JS API and load the recommendations
            // through the callback function.
            OBR.extern.callRecs(featured.request, featured.callback);
            
        }
       
    };
    
    // Initialize and run the init function.
    ob_bloghomefeatured.init();
      
})(jQuery);