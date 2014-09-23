/**
 * The homepage js.
 */
;(function($){
   
   // Localize the frontpage object. 
    var ob_frontpage = {
       
        init : function(){
           
            var 
                testimonials = $( '.row.testimonials' ),
                testimonial = testimonials.find( '.testimonial' );
   
            // Show or hide the testimonial profile on click
            testimonials.find( '.testimonial .profile' ).on( 'click', function(){
                testimonial.removeClass( 'active' );
                $( this ).parent().addClass( 'active' );
            } );

           
        }
       
    };
    
    // Initialize and run the init function.
    ob_frontpage.init();
      
})(jQuery);