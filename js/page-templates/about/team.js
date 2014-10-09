/**
 * The Team Page JS
 * 
 * The main JS file for the Team page.
 * @url: www.outbrain.com/about/team
 * 
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the team page object. 
    var ob_teampage = {
       
        init : function(){
                       
            var
                section = $( '.row.people .section' ),
                profile = {
                    biography : section.find( 'ul li .biography' )
                };
                
            // Loop through the individual profile biography. 
            profile.biography.each( function( index ){
                
                var
                    element = {
                        self : $(this),
                        height : $(this).outerHeight()
                    };
                    
                // Set the default height of the user's profile biography
                element.self.addClass( 'collapsed' );
                
                // Check if the profile biography is greater than our desired height
                // If this is true, then show a "Read More" toggle link to 
                // expand or collapse the rest of the biography copy.
                if( element.height > 135 ){
                    
                    /**
                     * Create the "Read More" link
                     * Attach a click event handler to the link
                     * @returns DOM element
                     */
                    function add_link( element ){
                        
                        var
                            nodes = {
                                
                                ellipsis : $( '<span/>', { class : 'ellipsis', text : ' ... ' } ),
                                read_more_container : $( '<div/>', { class : 'read-more-container' } ),
                                read_more : $( '<a/>', { href : 'javascript:void(0)', class : 'read-more', text : 'Read More' } )
                                
                            };
                        
                        // Click event handler for the "Read More" link
                        // 
                        // If the link is clicked do the following actions:
                        // - Remove the 'collapsed' class from the biography node
                        // - Add the element's height on the biography node
                        // - Add a "show" class to the biography node
                        // - Add a "show" class to the read_more_container node
                        // - Hide the ellipsis node
                        // - Change the text of the link to "Show Less"
                        //
                        // Else, reverse the process.
                        nodes.read_more.on( {
                            
                            click : function(){
                                
                                if( ! element.self.hasClass( 'show' ) ){
                                    
                                    element.self.removeClass( 'collapsed' ).css( 'height', element.height ).addClass( 'show' );
                                    nodes.read_more_container.addClass( 'show' );
                                    nodes.ellipsis.addClass( 'hide' );
                                    nodes.read_more.text( 'Read Less' );
                                    
                                } else {
                                    
                                    element.self.removeAttr( 'style' ).addClass( 'collapsed' ).removeClass( 'show' );
                                    nodes.read_more_container.removeClass( 'show' );
                                    nodes.ellipsis.removeClass( 'hide' );
                                    nodes.read_more.text( 'Read More' );
                                    
                                }
                            }
                            
                        } );
                        
                        // Generate the link with ellipsis encapsulated within a container
                        return nodes.read_more_container.html( nodes.ellipsis ).append( nodes.read_more );
                        
                    }
                    
                    // Add the "Read More" link                    
                    $(this).after( add_link( element ) );
                    
                }
                
            } );
            
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_teampage.init();
      
})(jQuery);