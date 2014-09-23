//! script.js
//! author : Raby Yuson

;(function($){
    
    // If success or error
    if( $('div.success').length === 1 || $('div.error').length === 1 ){
        $('.registration').insertBefore($('.webinar'));
    }
    
    // Declare variables
    var 
        webinar = {
            convertToLocalTimezone : function( startTime, timeZoneName, format ) {
                return moment( startTime ).tz( timeZoneName ).format( format );
            },
            start : $('.date_time .webinar_start_time').attr('value'),
            end : $('.date_time .webinar_end_time').attr('value')
        },
        local = {
            getCurrentDate : function( timezone ) {
                return webinar.convertToLocalTimezone( webinar.start, timezone, 'dddd, MMMM DD, YYYY' )
            },
            getCurrentTime : function( timezone ) {
                return webinar.convertToLocalTimezone( webinar.start, timezone, 'h:mm' ) + ' - ' + webinar.convertToLocalTimezone( webinar.end, timezone, 'h:mmA (z)' )
            }
        };
        
    // Find your timezone link
    $('.ftz').on( 'click', function(){
        $(this).next().removeClass('hide').addClass('show')
    } );
    
    // Timezone <SELECT>
    $('.tz-control').on( 'change', function(){
        
        if( $(this).val() ) {
            
            var 
                webinarLocalTime = $('.webinar_local_time'),
                currentElement = $('.date_time .webinar_local_time .current'),
                newElement = $('.date_time .webinar_local_time .new-time');

            $(this).removeClass('show').addClass('hide');
            currentElement.addClass('hide')

            setTimeout(function(){ currentElement.remove() }, 350 )

            newElement.html( local.getCurrentDate( $(this).val() ) + '<br/>' + local.getCurrentTime( $(this).val() ) ).addClass('current show').removeClass('new-time')

            setTimeout(function(){ 
                webinarLocalTime.append($('<div/>').attr('class','new-time'));
            }, 350 )
            
        }
        
        
    } );
    
})(jQuery);