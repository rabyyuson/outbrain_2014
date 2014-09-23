
/**
 * The Contact JS
 * 
 * The main JS file for the Contact page.
 * @url: www.outbrain.com/contact/
 * 
 * -----------------------------------------------------------------------------
 */

;(function($){
   
   // Localize the contact page object. 
    var ob_contactpage = {
       
        init : function(){
                       
            var 
                content = $( '.row.content' ),
                form_selector = content.find( '.form-selector select[name=forms]' ),
                forms = content.find( '.forms' );
        
            // Change event handler
            form_selector.on({
                change : function(){
                    if( ( $(this).prop( 'selectedIndex' ) - 1 ) > -1 ){
                        forms.find( '.form' ).hide().eq( $(this).prop( 'selectedIndex' ) - 1 ).show();
                    } else {
                        forms.find( '.form' ).hide();
                    }
                }
            });
                        
            // Get the user's country location
            $.ajax({ 
                url: '//www.telize.com/geoip?callback=?', 
                type: 'POST', 
                dataType: 'jsonp',
                success: function( location ) {
                    forms.find('li.country input[type=text]').val( location.country );
                }
            });
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_contactpage.init();
      
})(jQuery);