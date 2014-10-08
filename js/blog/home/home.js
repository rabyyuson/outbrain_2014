/**
 * The blog home js.
 */
;(function($){
   
   // Localize the blog home object. 
    var ob_bloghome = {
       
        init : function(){
           
            var 
                article = $( '.container.content .columns.eight article' ),
                information = article.find( '.information' );
           
            // Loop through the individual information block
            // Use the "read more" url to get the social share count
            information.each( function(){
                
                $.ajax( {
                    dataType : 'json',
                    url : stylesheetDir + '/inc/libraries/social-counter/counter.php',
                    data : { url : $( this ).find( '.content .read-more a' ).attr( 'href' ) },
                    success : function( data ){
                        console.log(data)
                        information.find( '.content .social .count' ).text( data.count + ' Shares' );
                    }
                } );
                
            } );
                                  
        }
       
    };
    
    // Initialize and run the init function.
    ob_bloghome.init();
      
})(jQuery);