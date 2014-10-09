/**
 * Global Header JS
 *
 * Global third-party javascript libraries
 * @url: www.outbrain.com
 *
 * -----------------------------------------------------------------------------
 */

/********************************************
 * Google Tag Manager
 ********************************************/

(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MNMBTC');

/********************************************
 * Google Analytics
 ********************************************/

var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-294746-2']);_gaq.push(['_setDomainName', 'outbrain.com']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();

/********************************************
 * Kissmetrics
 ********************************************/

var _kmq = _kmq || [];var _kmk = _kmk || envItems; function _kms(u){setTimeout(function(){ var d = document, f = d.getElementsByTagName('script')[0],s = d.createElement('script');s.type = 'text/javascript'; s.async = true; s.src = u;f.parentNode.insertBefore(s, f);}, 1);}_kms('//i.kissmetrics.com/i.js');_kms('//doug1izaerwt3.cloudfront.net/' + _kmk + '.1.js');

/********************************************
 * Visual Web Optimizer
 ********************************************/

var _vwo_code=(function(){var account_id=65230,settings_tolerance=2000,library_tolerance=2500,use_existing_jquery=false,f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();