/**
 * Blog Sidebar JS
 *
 * The blog sidebar js
 * @url: www.outbrain.com/blog
 *
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the blog sidebar object. 
    var ob_blogsidebar = {
       
        init : function(){
           
            var
                sidebar_container = $( '.container.content .columns.four' ),
                container = sidebar_container.find( '.container' ),
                subscription = {
                    container : container.find( '.subscription' ),
                    form : container.find( '.subscription form' ),
                    list : container.find( '.subscription ul li' )
                };
        
            subscription.list.each( function(){
                if( $(this).find( 'input' ).attr( 'type' ) === 'text' ){
                    $(this).find( 'input' ).attr( 'placeholder', $(this).find( 'label' ).text() );
                }
            } );
            
            // Window scroll event for the sub-navigation menu
            $( window ).scroll( function() {

                var 
                    window_scroll_top = $( window ).scrollTop();
                
                clearTimeout( $.data( this, 'sidebar_scroll_timer' ) );
                
                $.data( this, 'sidebar_scroll_timer', setTimeout(function() {
                    
                    if( window_scroll_top > 105 ){
                        sidebar_container.addClass( 'sticky' );
                    } else {
                        sidebar_container.removeClass( 'sticky' );
                    }

                }, 10 ) );
                
            } );
                                  
        }
       
    };
    
    // Initialize and run the init function.
    ob_blogsidebar.init();
      
})(jQuery);