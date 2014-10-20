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
                },
                categories = container.find( '.categories' );
        
            // Add the placeholder text pulled from the label
            subscription.list.each( function(){
                if( $(this).find( 'input' ).attr( 'type' ) === 'text' ){
                    $(this).find( 'input' ).attr( 'placeholder', $(this).find( 'label' ).text() );
                }
            } );
            
            // On change event handler for the categories dropdown
            // Get the category link and navigate to it
            categories.find( 'select[id=cat]' ).on( 'change', function(){
                if( parseInt( $(this).val() ) > 0 ){
                    $.ajax({
                        url : document.URL + '?category_id=' + $(this).val(),
                        type: 'GET',
                        success : function( response ){
                            var
                                category_url = $( response ).contents().find( 'input[name=category-url]' );
                            document.location.href = category_url.val();
                        }
                    });
                }
            } );
            
            // Window scroll event for the sub-navigation menu
            $( window ).scroll( function() {

                var 
                    window_scroll_top = $( window ).scrollTop();
                
                clearTimeout( $.data( this, 'sidebar_scroll_timer' ) );
                
                $.data( this, 'sidebar_scroll_timer', setTimeout(function() {
                    
                    ( ( window_scroll_top > 105 ) ? sidebar_container.addClass( 'sticky' ) : sidebar_container.removeClass( 'sticky' ) );

                }, 10 ) );
                
            } );
                                  
        }
       
    };
    
    // Initialize and run the init function.
    ob_blogsidebar.init();
      
})(jQuery);