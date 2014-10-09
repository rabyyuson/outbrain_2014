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
                forms = content.find( '.forms' ),
                support = {
                    first_name : forms.find( '.form.support .first_name input[type=text]' ),
                    last_name : forms.find( '.form.support .last_name input[type=text]' ),
                    calculated_name : forms.find( '.form.support .calculated_name input[type=text]' ),
                    form : forms.find( '.form.support form' )
                },
                other = {
                    first_name : forms.find( '.form.other .first_name input[type=text]' ),
                    last_name : forms.find( '.form.other .last_name input[type=text]' ),
                    calculated_name : forms.find( '.form.other .calculated_name input[type=text]' ),
                    form : forms.find( '.form.other form' )
                };
        
            // Form submit event
            // Pre-populate the "Calculated Name" field value with the 
            // concatenated value of "First Name" and "Last Name" upon form
            // submission
            support.form.submit( function(){ support.calculated_name.val( support.first_name.val() + ' ' + support.last_name.val()  ); return; } );
            other.form.submit( function(){ other.calculated_name.val( other.first_name.val() + ' ' + other.last_name.val()  );  return; } );
        
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