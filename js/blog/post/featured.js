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
                months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
                featured = {
                    container: listing.find( '.featured-posts' ),
                    article : listing.find( '.featured-posts article' ),
                    social : [],
                    request : {
                        permalink: "http://www.outbrain.com/blog",
                        widgetId: "HOP_2"
                    },
                    callback : function( data ){
                        
                        // Remove the loading text
                        featured.container.find( '.loading' ).remove();
                        
                        // Loop through the recommendations
                        for( var i in data.doc ){
                            
                            // Create a clone copy of the article container.
                            // Also show this element.
                            var 
                                cloned_article = featured.article.clone( false ).css( 'display', 'block' ), counter = -1,
                                date = data.doc[i].publish_date.split('-'),
                                day = date[2].split(' ')[0],
                                social = {
                                    facebook : "https://www.facebook.com/dialog/share?app_id=665869746843573&display=page&href=" + data.doc[i].orig_url + "&redirect_uri=" + data.doc[i].orig_url,
                                    twitter : "https://twitter.com/share?url=" + data.doc[i].orig_url + "&text=" + data.doc[i].content + "&via=Outbrain",
                                    google_plus : "https://plus.google.com/share?url=" + data.doc[i].orig_url,
                                    linkedin : "http://www.linkedin.com/shareArticle?url=" + data.doc[i].orig_url + "&title=" + data.doc[i].content + ""
                                };
                                
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
                            // - First Item: Insert the author name and url.
                            // - First Item: Insert the post date.
                            // - First Item: Insert the post content.
                            // - Add the key value as the class name.
                            // - Add social links to all networks.
                            cloned_article.find( '.information .title a' ).text( data.doc[i].content );
                            cloned_article.find( '.information .title a, .information .content a' ).attr( { 'href' : data.doc[i].url } );
                            cloned_article.find( '.information .meta .author a' ).attr( 'href', data.doc[i].author.split('|')[2] ).text( data.doc[i].author.split('|')[0] );
                            cloned_article.find( '.information .meta time' ).text( months[ date[1] - 1 ] + ' ' + day + ', ' + date[0] );
                            cloned_article.find( '.information .content .excerpt' ).text( data.doc[i].desc );
                            cloned_article.addClass( 'recommendation-' + i );
                            cloned_article.find( '.social .facebook a' ).attr( 'href', social.facebook );
                            cloned_article.find( '.social .twitter a' ).attr( 'href', social.twitter );
                            cloned_article.find( '.social .google_plus a' ).attr( 'href', social.google_plus );
                            cloned_article.find( '.social .linkedin a' ).attr( 'href', social.linkedin );
                            
                            // Add this cloned element to the featured post container.
                            featured.container.append( cloned_article );
                            
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
                
                        // Remove the first template article from the featured list.
                        featured.article.eq(0).remove();

                    }
                };
            
            // Call the Outbrain Widget JS API and load the recommendations
            // through the callback function.
            OBR.extern.callRecs( featured.request, featured.callback );
            
        }
       
    };
    
    // Initialize and run the init function.
    ob_bloghomefeatured.init();
      
})(jQuery);