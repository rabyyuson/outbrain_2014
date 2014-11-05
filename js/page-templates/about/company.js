/**
 * The Company Page JS
 * 
 * The main JS file for the Company page.
 * @url: www.outbrain.com/about/company
 *
 * -----------------------------------------------------------------------------
 */
;(function($){
   
   // Localize the company object. 
    var ob_company = {
       
        init : function(){
                       
            var 
                container = $( '.container.about' ),
                video = container.find( '.mission .video video' ),
                video_playing = false,
                play_button = container.find( '.mission .video .play' ),
                location = container.find( '.global-offices .location' ),
            
            // Play video function.
            play_video = function( play_button, video ){
                play_button.hide();
                setTimeout(function(){
                    video.get(0).play();
                    video_playing = true;
                }, 50 );
            },
                    
            // Pause video function.
            pause_video = function( play_button, video ){
                play_button.show();
                setTimeout(function(){
                    video.get(0).pause();
                    video_playing = false;
                }, 50 );
            };
            
            
            // Declare event handlers..
            
            video.on({
                click : function(){
                    if( !video_playing ){
                        play_video( play_button, $(this) );
                    } else {
                        pause_video( play_button, $(this) );
                    }
                },
                ended : function(){
                    video.get(0).load();
                    play_button.show();
                    video_playing = false;
                }
            });
            
            play_button.on({
                click : function(){
                    if( !video_playing ){
                        play_video( $(this), video );
                    } else {
                        pause_video( $(this), video );
                    }
                }
            });
            
            // Define the hover event handler for each location.
            location.each(function(){
                var
                    coordinates = {
                        y : $(this).data( 'coordinates-y' ),
                        x : $(this).data( 'coordinates-x' )
                    };
                $(this).css({ 'position' : 'absolute', 'top' : coordinates.y, 'left' : coordinates.x });
                $(this).find( '.information' ).css( 'margin-left', -Math.abs( $(this).find( '.information' ).width() * 1.52 ) + 'px' );
                $(this).prepend( 
                    $( '<div/>' ).attr( 'class', 'dot' ).on({
                        mouseover : function(){
                            $(this).next().addClass( 'show' )
                        },
                        mouseout : function(){
                            $(this).next().removeClass( 'show' )
                        }
                    })
                );
            });
            
        }
       
    };
    
    // Initialize and run the init function.
    ob_company.init();
      
})(jQuery);