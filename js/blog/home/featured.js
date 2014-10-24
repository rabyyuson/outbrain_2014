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
                    request : {
                        permalink: "http://www.outbrain.com/blog",
                        widgetId: "HOP_2"
                    },
                    callback : function( data ){
                        
                        console.log( data.doc )
                        // Loop through the recommendations
                        for( var i in data.doc ){
                            
                            // Create a clone copy of the article container.
                            // Also show this element.
                            var 
                                cloned_article = featured.article.clone( true ).css( 'display', 'block' );
                                
                            // Identify the element's order sequence.
                            if( parseInt( i ) === 0 ){
                                
                                // Check if this is the first element. If it is,
                                // apply 'first' class name and also serve a bigger 
                                // image than the rest.
                                cloned_article.addClass( 'first' );
                                cloned_article.find( '.thumbnail .image' ).html( '<img src="' + data.doc[i].thumbnail.url + '" />' );
                                
                            } else {
                                
                                // If this is not the first element, serve 200 x 150 spec
                                cloned_article.find( '.thumbnail .image' ).html( '<img src="' + data.doc[i].thumbnail.url + '" width="200" height="150" />' );
                                
                            }
                            
                            // All other changes and not order specific.
                            // (1) - Insert the returned title.
                            cloned_article.find( '.information .title' ).text( data.doc[i].content );
                            
                            // Add this cloned element to the featured post container.
                            featured.container.append( cloned_article );
                            console.log(data.doc[i])
                        }

                        featured.article.eq(0).remove();
                        
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