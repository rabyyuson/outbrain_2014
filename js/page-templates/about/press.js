
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
                more = $( '.container.press .row.listing .entries .more a' ),
                data = {
                    counter : 1,
                    fetch : true
                };

            // Click event handler
            // Load the articles through AJAX request and append it to the entries list
            // Remove the more button if there are no more data to retrieve
            more.on({
                
                click : function(){
                    
                    if( data.fetch ) {
                        more.text( 'Loading Articles...' );
                        $.ajax({
                            url : document.URL + 'page/' + ( data.counter +=  1 ),
                            type : 'GET',
                            success : function( response ){
                                var
                                    entry = $( response ).contents().find( '.entry' );
                                more.parent().before( entry );
                                more.text( 'See More Articles' );
                                if( entry.length > 0 ) {
                                    data.fetch = true;
                                } else {
                                    data.fetch = false;
                                    more.parent().remove();
                                }
                            }
                        });
                    }

                }
                
            });
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_presspage.init();
      
})(jQuery);