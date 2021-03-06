/**
 * Blog Home JS
 *
 * The blog home js
 * @url: www.outbrain.com/blog
 *
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the blog home object. 
    var ob_bloghome = {
       
        init : function(){
           
            var 
                listing = $( '.container.content .blog-posts' ),
                article = listing.find( 'article' ),
                information = article.find( '.information' ),
                data = {
                    counter : 1, reach : 1, fetch : true, infinite : true,
                    entries_height : function(){
                        return listing.height();
                    }
                }, posts = {}, showMorePosts,
                pagination = listing.find( '.pagination' ),
                loading = listing.find( '.loading' ),
                footer = $( 'footer.container.home' );
            
            // Retrieve the share count data
            window.promise = function( link ){
                
                // Asynchronously retrieve the count share data based on the passed url link
                return $.ajax( {
                    dataType : 'json',
                    url : stylesheetDir + '/inc/libraries/social-counter/counter.php',
                    data : { url : link }
                } );
                
            };
            
            // Loop through the individual information block
            // Use the "read more" url to get the social share count
            information.each( function(){
                
                // Pass in the read more link on each post to calculate the share count.
                // Pull the ajax promise data and perform operations on the data
                var
                    promise = window.promise( $( this ).find( '.content .read-more a' ).attr( 'href' ) );
                    
                // Attach the done function to retrieve the data from the promise
                promise.done( function( data ){
                    information.find( '.content .social .count' ).text( data.count + ' Shares' );
                } );

            } );
            
            // Show More Posts
            // Enable the inifinite scroll again
            // Hide the show more posts button and the footer
            showMorePosts = function(){
                
                listing.find( '.show-more-posts' ).text( 'Fetching Posts...' );
                data.infinite = true;
                posts.get_data( data );
                setTimeout( function(){
                    listing.find( '.show-more-posts' ).remove();
                    footer.hide();
                }, 950 );
                
            };
            
            // Posts Get Data function
            // Load the articles through AJAX request
            // Only perform the operation in this function if we have 
            // succcessfully pulled information from the AJAX request.
            posts.get_data = function( data ){
                    
                if( ( data.reach === data.counter ) && ( data.fetch ) && ( data.reach === 1 || data.infinite ) ) {
                    
                    // Show the loading marker
                    loading.addClass( 'show' );
                    
                    // Get the posts
                    $.ajax({
                        url : document.URL + 'page/' + ( data.counter +=  1 ),
                        type : 'GET',
                        success : function( response ){
                                
                            var
                                entry = $( response ).contents().find( 'article' );
                                
                            // After 250 ms. remove the loading marker and get
                            // the posts and display it.
                            setTimeout( function(){ 
                                
                                loading.removeClass( 'show' );
                                listing.append( entry );
                                data.reach += 1;
                                ( ( entry.length > 0 ) ? data.fetch = true : data.fetch = false );
                                
                                if( data.reach % 5 === 0 ) {
                                    
                                    // Restrict the infinite scroll
                                    // Only enable it if the user clicks on the 
                                    // Show More Posts button
                                    data.infinite = false;

                                    // Add a "Show More Posts" button at the end of the
                                    // blog post listing.
                                    listing.append( 
                                        $( '<a/>' )
                                            .attr({ 'href' : 'javascript:void(0)', 'class' : 'show-more-posts' })
                                            .text( 'Show More Posts' )
                                            .on({ click : showMorePosts })
                                    );

                                    // Display the show more post button and also the footer
                                    footer.show();

                                }
                                
                            }, 250 );
                            
                        },
                        error : function() {
                            
                            // After 250 ms. remove the loading marker
                            // Show the footer
                            setTimeout( function(){ 

                                loading.removeClass( 'show' );

                            }, 250 );
                            
                            // Show the footer
                            footer.show();
                            
                        }
                    });
                    
                }

            };
                
            // Window scroll event for the sub-navigation menu
            $( window ).scroll( function() {

                var 
                    window_scroll_top = $( window ).scrollTop();
                
                clearTimeout( $.data( this, 'scroll_timer' ) );
                
                $.data( this, 'scroll_timer', setTimeout(function() {
                    
                    // Show or hide the sub navigation panel
                    // If there is pagination and if the height of the scrolled 
                    // height is 70% of the total entries height, then get the 
                    // new entry elements and append it to the entries container.
                    ( window_scroll_top > ( ( data.entries_height() ) - 1500 ) && pagination.length ? posts.get_data( data ) : false );

                }, 10 ) );
                
            } );
                                  
        }
       
    };
    
    // Initialize and run the init function.
    ob_bloghome.init();
      
})(jQuery);