/**
 * Header (Blog) JS
 *
 * The global header js for the blog
 * @url: www.outbrain.com/blog
 *
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the header object. 
    var ob_header = {
       
        init : function(){
           
           // Mobile Menu
           
            var mobile_menu = $( '.columns.twelve.mobile-menu' );

            // Show or hide the mobile menu when the hamburger is clicked.
            mobile_menu.find( '.hamburger' ).on( 'click', function(){
                $( this ).toggleClass( 'active' );
                $( this ).parents( '.mobile-menu' ).find( 'nav.second-level' ).toggleClass( 'show' );
            } );

            // Show or hide the second-level navigation links when the .dropdown link is clicked.
            mobile_menu.find( 'nav.second-level a.dropdown' ).on( 'click', function(){
                $( this ).toggleClass( 'opened' );
                $( this ).next().toggleClass( 'show' );
            } );

            // Add a placeholder text for the searchbox
            mobile_menu.find( 'form input[type="text"]' ).attr( 'placeholder', 'Search...' );
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_header.init();
      
})(jQuery);