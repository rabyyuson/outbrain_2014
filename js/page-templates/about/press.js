
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
                }, posts = {};
            
            // Posts function
            // Load the articles through AJAX request
            posts.get_data = function( data ){
                    
                if( data.fetch ) {
                    $.ajax({
                        url : document.URL + 'page/' + ( data.counter +=  1 ),
                        type : 'GET',
                        success : function( response ){
                            var
                                entry = $( response ).contents().find( '.entry' );
                            if( entry.length > 0 ) {
                                data.fetch = true;
                            } else {
                                data.fetch = false;
                            }
                            console.log(entry)
                        }
                    });
                }

            };
                
            // Window scroll event for the sub-navigation menu
            $( window ).scroll( function() {

                var 
                    win = {
                        scroll_top : $( window ).scrollTop(),
                        height: $( window ).height()
                    };
                    
                console.log(win.scroll_top)
                console.log(win.height * 0.9)
                    
                $.data( this, 'scrollTimer', setTimeout(function() {

                    // Show or hide the sub navigation panel
                    if ( win.scroll_top > ( win.height * 0.9 ) ) {
                        console.log('here')
                        posts.get_data( data );
                        
                    } else {
                        
                          
                    } 

                }, 10 ) );
                
            } );
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_presspage.init();
      
})(jQuery);