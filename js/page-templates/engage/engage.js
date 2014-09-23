
/**
 * The Engage Page JS
 * 
 * The main JS file for the Engage page.
 * @url: www.outbrain.com/engage
 * 
 * -----------------------------------------------------------------------------
 */

;(function($){
   
   // Localize the frontpage object. 
    var ob_engagepage = {
       
        init : function(){
           
            var 
                container = $( '.container.page-template.engage' ), 
                content, iframe, visual_revenue, publisher,
                mobile = {
                    initial : container.find('.publishing-frontier .data .initial' ),
                    data_panel : container.find('.publishing-frontier .data .panels li' ),
                    inner_links : container.find('.publishing-frontier .inner-links a')
                },
                accordion = {
                    initial : container.find('.audience-engagement .data .initial' ),
                    data_panel : container.find('.audience-engagement .data .panels li' ),
                    inner_links : container.find('.audience-engagement a')
                },
                sub_nav_first_level = container.find( '.sub-navigation.first-level' ),
                sub_nav_second_level = container.find( '.sub-navigation.second-level' ),
                carousel = container.find( '.editor-tomorrow .carousel' ),
                slider_video = container.find( '#a-clear-view-of-social-success' ),
                rotating_content = container.find( '.rotating-content' )
            
            
            // Declare the content navigation for the sub nav links on click event
            content = {
                
                scroll_to : function( where ) {
                    $( 'body, html' ).stop().animate( {
                        scrollTop : where
                    }, 750 );
                }
                
            },
                
            // Declare the iframe animations that will happen after the on click event
            iframe = {
                
                load : function( selected, target, event ) {
                    
                    // Check if it is the first time that the user scrolled to this section 
                    if( ! target.initial.data( 'viewed' ) ) {
                        target.initial.data( 'viewed', true ).addClass( 'fade-out' );
                    }
                    
                    var 
                        current_data_panel = target.data_panel.eq( ( selected.parents()[0].nodeName === 'LI' ? selected.parent().index() : selected.parents( '.panel' ).index() ) );

                    if ( event === 'click' ) {

                        // Set the currently clicked link to active for indication
                        target.inner_links.removeClass( 'active' );
                        selected.addClass( 'active' );
                    
                    }
                    
                    // Remove all child iframes from the list and append the selected one
                    target.data_panel.empty();
                    current_data_panel.append( $('<iframe src="'+current_data_panel.attr( 'path' )+'" scrolling="no" frameborder="0" class="show" />' ) );

                }
                
            },
                 
            // Animation effects for the visual revenue slider section
            visual_revenue = {
                
                run_first_slide : function() {
                    
                    // Check if it is the first time that the user scrolled to this section 
                    if( ! carousel.data( 'viewed' ) ) {
                        carousel.data( 'viewed', true );
                        visual_revenue.real_time_recommendations();
                        carousel.carousel( { interval : 15000 } );
                    }
                    
                },
                
                carousel_rotate_content : function( index ) {
                    
                    switch( index ){
                        case 0 : 
                            slider_video[0].load();
                            visual_revenue.real_time_recommendations_reset();
                            visual_revenue.real_time_recommendations();
                            break;
                        case 1 :
                            slider_video[0].load();
                            visual_revenue.instant_headline_image_testing();
                            visual_revenue.instant_headline_image_testing_reset();
                            break;
                        case 2 :
                            slider_video[0].play();
                            visual_revenue.real_time_recommendations_reset();
                            visual_revenue.instant_headline_image_testing_reset();
                            break;
                        default:
                            slider_video[0].load();
                            visual_revenue.real_time_recommendations_reset();
                            visual_revenue.instant_headline_image_testing_reset();
                            break;
                    }

                    rotating_content.find( '.data' ).removeClass( 'active' );
                    rotating_content.find( '.data' ).eq( index ).addClass('active');
                    
                },
                
                real_time_recommendations : function() {
                    
                    $(".feature .recommendations li").eq(0).css({opacity:0,height:0}),$("#news_editor_tools").waypoint(function(){setTimeout(function(){$(".feature .recommendations li").eq(0).animate({height:90},500,function(){$(this).animate({opacity:1},500,function(){setTimeout(function(){$(".feature .recommendations li").eq(0).addClass("active"),$(".feature .monitor .right-col .article").eq(0).addClass("active"),setTimeout(function(){$(".feature .recommendations li").eq(0).removeClass("active"),$(".feature .monitor .right-col .article").eq(0).removeClass("active")},200),setTimeout(function(){$(".feature .recommendations li").eq(0).addClass("active"),$(".feature .monitor .right-col .article").eq(0).addClass("active")},400),$(".feature .blue-line").delay(600).animate({width:"400px"},600,function(){$(".feature .monitor .right-col .article").eq(0).animate({marginLeft:"200px"},800,function(){$(".feature .monitor .header .article").eq(1).addClass("active"),$(".feature .monitor .header .rec-mask").animate({left:"-340px"},600,function(){$(".feature .monitor .right-col .rec-mask").animate({top:"-55px"})})})})},200)})})},200)},{offset:"bottom-in-view",triggerOnce:!0});
                    
                },
                
                real_time_recommendations_reset : function() {
                    
                    var monitor=$(".monitor");$(".blue-line").css("width","0px"),$(".recommendations li").eq(0).css({opacity:"0px",height:"0px"}).removeClass("active"),monitor.find(".header .rec-mask").removeAttr("style"),monitor.find(".right-col .rec-mask").removeAttr("style"),monitor.find(".article").removeClass("active").removeAttr("style");
                    
                },
                
                instant_headline_image_testing : function() {
                    
                    $.typer.options.typeSpeed=30;var loser={article:$(".headline-testing .articles").children().eq(0),bar:$(".headline-testing .ctr-bars").children().eq(0)},winner={article:$(".headline-testing .articles").children().eq(1),bar:$(".headline-testing .ctr-bars").children().eq(1)};$("#p-headline-testing").height($("#p-headline-testing").height()),setTimeout(function(){$(".ctr-bars").hide().find(".editor, .ctr-value, .tooltip").hide(),winner.article.css({position:"relative",top:-winner.article.height()+"px",opacity:0})},1),$("#p-headline-testing").waypoint(function(){var e=function(){winner.article.animate({top:"10px",opacity:1},{easing:"easeOutCubic",complete:function(){$.typer.options.OnDoneTyping=t,$(winner.article.find(".title")).typeTo(winner.article.find(".title").data("headline"))}},600)},t=function(){var e=$(".winner img").height(),t=$("<div />",{style:"height: "+e+"px; overflow: hidden; margin-bottom: 10px;","class":"imageWrapper"});$(".winner img").wrap(t).fadeOut(function(){$(this).attr("src","http://wp.outbrain.com/wp-content/themes/outbrain/static/engage/vr/images/obama-romney.jpg").fadeIn(function(){i()})})},i=function(){$(".ctr-bars").fadeIn(400,function(){loser.bar.find(".fill").animate({width:"40%"},400,"easeOutQuad").animate({width:"55%"},600,"easeInOutQuad").animate({width:"30%"},600,"easeInOutQuad").animate({width:"40%"},600,"easeInOutQuad").animate({width:"60%"},600,"easeInOutQuad").animate({width:"50%"},400,"easeInOutQuad").animate({width:"42%"},400,"easeInQuad"),winner.bar.find(".fill").animate({width:"40%"},400,"easeOutQuad").animate({width:"30%"},600,"easeInOutQuad").animate({width:"40%"},600,"easeInOutQuad").animate({width:"35%"},600,"easeInOutQuad").animate({width:"30%"},600,"easeInOutQuad").animate({width:"60%"},400,"easeInOutQuad").animate({width:"70%"},400,"easeInQuad",a)})},a=function(){$(".tooltip, .fill-loser, .editor, .ctr-value, .circle").fadeIn(300)};setTimeout(e,200)},{offset:"bottom-in-view",triggerOnce:!0});
                    
                },
                
                instant_headline_image_testing_reset : function() {
                    
                    var headline_testing=$("#p-headline-testing");headline_testing.removeAttr("style"),headline_testing.find(".articles .article.winner").removeAttr("style"),headline_testing.find(".articles .article.winner .title").text("Election Day. It's Decision Time"),headline_testing.find(".articles .article.winner div.imageWrapper").replaceWith($('<img src="http://www.outbrain.com/wp-content/themes/outbrain/static/engage/vr/images/news_editor_presidents.png" />')),headline_testing.find(".ctr-bars").removeAttr("style"),headline_testing.find(".ctr-bars div").removeAttr("style");
                    
                }
                
            },
            
            // Encapsulate the publisher section
            publisher = {

                // Get the logos and animate it
                logos : function() {
                    
                    // Retrieve the partners listing image
                    var partners = container.find( '.row.company-keep .animation img' );

                    // Move the image up
                    partners.animate( {
                        top : '-=1px'
                    }, 1, function() {

                        // When animation is complete get the image position
                        publisher.img_location = -Math.abs( parseInt( partners.attr( 'style' ).match( /[0-9]+/g )[0] ) );

                        // Check if the image is out of the view
                        if( publisher.img_location === -Math.abs( partners.height() - 40 ) ) {

                            // Clone the image and position it accordingly
                            partners.after( partners.clone().removeAttr( 'style' ).css( {
                                top : '60px'
                            } ) );

                            // Remove the last shown image.
                            setTimeout( function() { partners.eq(0).remove(); }, 4000 );

                        }

                    });

                }

            };
            
            // Rotate the logos every 25 ms.
            setInterval( function() { publisher.logos(); }, 50 );
            
            /*******************************************************************
             * Event Handlers
             ******************************************************************/
            
            // Sub navigation second level click handlers
            container.find( '.sub-navigation .nav-link' ).on( 'click', function() {
                
                switch( $(this).data( 'jump' ) ) {
                    
                    case 'first' :
                        content.scroll_to( 601 );
                        break;
                    case 'second' :
                        content.scroll_to( 1588 );
                        ( ! mobile.initial.data( 'viewed' ) ? iframe.load( mobile.inner_links.eq(0), mobile, 'scroll' ) : false );
                        break;
                    case 'third' :
                        content.scroll_to( 2527 );
                        ( ! accordion.initial.data( 'viewed' ) ? iframe.load( mobile.inner_links.eq(0), accordion, 'scroll' ) : false );
                        break;
                    case 'fourth' :
                        content.scroll_to( 3305 );
                        ( ! carousel.data( 'viewed' ) ? visual_revenue.run_first_slide() : false );
                        break;
                    default:
                        break;
                    
                }
                
            } );
            
            // Click event handler for the mobile anchor list
            mobile.inner_links.on( {
            
                click : function() {

                    iframe.load( $(this), mobile, 'click' );

                }

            } );
            
            // Click event handler for the accordion panel list
            accordion.inner_links.on( {
            
                click : function() {

                    iframe.load( $(this), accordion, 'click' );

                }

            } );
            
            // Slid event for the slider
            carousel.on( 'slid.bs.carousel', function() {
                
                var 
                    index = parseInt( carousel.find( '.carousel-inner .item.active' ).index() );
                    
                visual_revenue.carousel_rotate_content( index );

            });
            
            // Click event for the slider copies
            rotating_content.find( '.data' ).on({
            
                // Move the carousel to the selected index
                click : function() {

                    carousel.carousel( 'pause' );
                    carousel.carousel( parseInt( $(this).index() ) );

                },

                // Pause the carousel on mouseover event
                mouseenter : function() {

                    carousel.carousel( 'pause' );

                },

                // Resume the carousel cycle on mouseleave event
                mouseleave : function() {

                    carousel.carousel( 'cycle' );

                }

            });
            
            // Window resize event for the sub-navigation menu
            $( window ).resize( function() {
                
                clearTimeout( $.data( this, 'scrollTimer' ) );

                $.data( this, 'scrollTimer', setTimeout(function() {
                    
                    ( $( window ).width() < 971 ? sub_nav_second_level.removeClass( 'show' ).addClass( 'hide' ) : false );
                    
                }, 100 ) );
                
            } );
            
            // Window scroll event for the sub-navigation menu
            $( window ).scroll( function() {

                var 
                    win = {
                        scroll_top : $( window ).scrollTop(),
                        width : $( window ).width()
                    };
                    
                clearTimeout( $.data( this, 'scrollTimer' ) );
                
                $.data( this, 'scrollTimer', setTimeout(function() {

                    // Show or hide the sub navigation panel
                    if ( win.scroll_top > 600 && win.width > 971 ) {
                      
                        // Hide the first level navigation then show the second level navigation
                        // Add some padding to the discovery section to prevent jumping
                        sub_nav_first_level.removeClass( 'show' ).addClass( 'hide' );
                        sub_nav_second_level.removeClass( 'hide' ).addClass( 'show' );
                        container.find( '.discovery' ).addClass( 'padded' );
                        
                    } else {
                        
                        // Reverse the process found in the first if condition
                        sub_nav_first_level.removeClass( 'hide' ).addClass( 'show' );
                        sub_nav_second_level.removeClass( 'show' ).addClass( 'hide' );
                        container.find( '.discovery' ).removeClass( 'padded' );
                          
                    } 
                    
                    // Move the indicator depending on the window scroll top position
                    if ( win.scroll_top > 600 && win.scroll_top < 1490 ) {
                        
                        // Position the indicator to the first section
                        sub_nav_second_level.find( '.indicator' ).attr( 'data-indicator_position', 'first' );
                    
                    } else if ( win.scroll_top > 1490 && win.scroll_top < 2400 ) {
                    
                        // Position the indicator to the second section
                        // Display the first mobile panel if it this is the first time scroll visit
                        sub_nav_second_level.find( '.indicator' ).attr( 'data-indicator_position', 'second' );
                        ( ! mobile.initial.data( 'viewed' ) ? iframe.load( mobile.inner_links.eq(0), mobile, 'scroll' ) : false );
                        
                    } else if ( win.scroll_top > 2400 && win.scroll_top < 3180 ) {
                    
                        // Position the indicator to the third section
                        // Display the first accordion panel if it this is the first time scroll visit
                        sub_nav_second_level.find( '.indicator' ).attr( 'data-indicator_position', 'third' );
                        ( ! accordion.initial.data( 'viewed' ) ? iframe.load( mobile.inner_links.eq(0), accordion, 'scroll' ) : false );
                        
                    } else if ( win.scroll_top > 3180 ) {
                        
                        // Position the indicator to the fourth section
                        // Display the first slider panel if it this is the first time scroll visit
                        sub_nav_second_level.find( '.indicator' ).attr( 'data-indicator_position', 'fourth' );
                        ( ! carousel.data( 'viewed' ) ? visual_revenue.run_first_slide() : false );
                        
                    }

                }, 10 ) );
            
            } );
            
           
        }
       
    };
    
    // Initialize and run the init function.
    ob_engagepage.init();
      
})(jQuery);