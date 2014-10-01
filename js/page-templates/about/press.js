
/**
 * The Press Page JS
 * 
 * The main JS file for the Press page.
 * @url: www.outbrain.com/about/press
 * 
 * -----------------------------------------------------------------------------
 */

;(function($){
   
   // Localize the press page object. 
    var ob_presspage = {
       
        init : function(){
                       
            var 
                entries = $( '.container.press .row.listing .entries' ),
                data = {
                    counter : 1, reach : 1, fetch : true,
                    entries_height : function(){
                        return entries.height();
                    }
                }, posts = {};
            
            // Posts Get Data function
            // Load the articles through AJAX request
            // Only perform the operation in this function if we have 
            // succcessfully pulled information from the AJAX request.
            posts.get_data = function( data ){
                    
                if( ( data.reach === data.counter ) && data.fetch ) {
                    $.ajax({
                        url : document.URL + 'page/' + ( data.counter +=  1 ),
                        type : 'GET',
                        success : function( response ){
                            var
                                entry = $( response ).contents().find( '.entry' );
                            entries.append( entry );
                            data.reach += 1;
                            ( ( entry.length > 0 ) ? data.fetch = true : data.fetch = false );
                            
                        }
                    });
                }

            };
                
            // Window scroll event for the sub-navigation menu
            $( window ).scroll( function() {

                var 
                    window_scroll_top = $( window ).scrollTop();
                
                // We use a different timeout data name for this press page since
                // we cannot use "scrollTimer" value used in the global navigation.js file
                clearTimeout( $.data( this, 'pressScrollTimer' ) );
                
                $.data( this, 'pressScrollTimer', setTimeout(function() {

                    // Show or hide the sub navigation panel
                    // If the height of the scrolled height is 70% of the total
                    // entries height, then get the new entry elements and append
                    // it to the entries container.
                    ( window_scroll_top > ( ( data.entries_height() ) * 0.7 ) ? posts.get_data( data ) : false );

                }, 10 ) );
                
            } );
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_presspage.init();
      
})(jQuery);