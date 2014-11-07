
/**
 * The Customer Terms JS
 * 
 * The main JS file for the Customers Terms page.
 * @url: www.outbrain.com/legal/customer-terms
 * 
 * -----------------------------------------------------------------------------
 */

;(function($){
   
   // Localize the press page object. 
    var ob_customertermspage = {
       
        init : function(){
                       
            console.log('I AM HERE!')
                       
            var 
                content = $( '.row.content' ),
                termsDropDown = content.find( '.terms-dropdown select[name=country-dropdown]' ),
                text = content.find( '.text' ),
                ajaxLoader = content.find( '.ajaxloader' );
                text.find( '.hide' ).hide();
            termsDropDown.on({
                change : function(){
                    
                    var 
                        optionVal = $(this).val();
                    text.hide();
                    ajaxLoader.show();
                    
                    setTimeout(function(){
                        ajaxLoader.hide();
                        text.find( '.terms-' + optionVal.toString() ).show();
                    },800);
                }
            });
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_customertermspage.init();
      
})(jQuery);