/**
 * Global Footer JS
 *
 * Global third-party javascript libraries
 * @url: www.outbrain.com
 *
 * -----------------------------------------------------------------------------
 */

/********************************************
 * Facebook JS
 ********************************************/

(function(){window._fbds = window._fbds || {};_fbds.pixelId = 810343928991466;var fbds = document.createElement('script');fbds.async = true;fbds.src = '//connect.facebook.net/en_US/fbds.js';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(fbds, s);})();window._fbq = window._fbq || [];window._fbq.push(["track", "PixelInitialized", {}]);

/********************************************
 * Twitter JS
 ********************************************/

twttr.conversion.trackPid('l4hrj');

/********************************************
 * VR Tracking Script
 ********************************************/

var _vrq = _vrq || [];_vrq.push(['id', 570]);_vrq.push(['automate', true]);(function(d, a) {var s = d.createElement(a),x = d.getElementsByTagName(a)[0];s.async = true;s.src = 'http://a.visualrevenue.com/vrs.js';x.parentNode.insertBefore(s, x);})(document, 'script');

/********************************************
 * jQuery Conditional
 ********************************************/

window.jQuery || document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"><\/script>');
window.jQuery || document.write('<script src="' + stylesheetDir + '/assets/js/libs/jquery.tools.min.js"><\/script>')

/********************************************
 * Typekit
 ********************************************/

try{Typekit.load();}catch(e){}

/********************************************
 * Bizo Tracking
 ********************************************/

_bizo_data_partner_id = "4757";(function() {var s = document.getElementsByTagName("script")[0];var b = document.createElement("script");b.type = "text/javascript";b.async = true;b.src = (window.location.protocol === "https:" ? "https://sjs" : "http://js") + ".bizographics.com/insight.min.js";s.parentNode.insertBefore(b, s);})();

/********************************************
 * Heatmap
 ********************************************/

setTimeout(function(){var a=document.createElement("script");var b=document.getElementsByTagName("script")[0];a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0021/6084.js?"+Math.floor(new Date().getTime()/3600000);a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);