<?php die("Access Denied"); ?>#x#a:2:{s:6:"output";s:0:"";s:6:"result";s:1936:"try{(function(a,c){var b=(function(){var d=c(a.documentElement),f=c(a.body),e;if(d.scrollTop()){return d}else{e=f.scrollTop();if(f.scrollTop(e+1).scrollTop()==e){return d}else{return f.scrollTop(e)}}}());c.fn.smoothScroll=function(d){d=~~d||400;return this.find('a[href*="#s5"]').click(function(f){var g=this.hash,e=c(g);if(location.pathname.replace(/^\//,'')===this.pathname.replace(/^\//,'')&&location.hostname===this.hostname){if(e.length){f.preventDefault();b.stop().animate({scrollTop:e.offset().top},d,function(){location.hash=g})}}}).end()}}(document,jQuery));function initSmoothscroll(){jQuery('html').smoothScroll(700);}
jQuery(document).ready(function(){initSmoothscroll();});var s5_page_scroll_enabled=1;function s5_page_scroll(obj){if(jQuery.browser.mozilla)var target='html';else var target='html body';jQuery(target).stop().animate({scrollTop:jQuery(obj).offset().top},700,function(){location.hash=obj});}
function s5_hide_scroll_to_top_display_none(){if(window.pageYOffset<300){document.getElementById("s5_scrolltopvar").style.display="none";}}
function s5_hide_scroll_to_top_fadein_class(){document.getElementById("s5_scrolltopvar").className="s5_scrolltop_fadein";}
function s5_hide_scroll_to_top(){if(window.pageYOffset>=300){document.getElementById("s5_scrolltopvar").style.display="block";document.getElementById("s5_scrolltopvar").style.visibility="visible";window.setTimeout(s5_hide_scroll_to_top_fadein_class,300);}
else{document.getElementById("s5_scrolltopvar").className="s5_scrolltop_fadeout";window.setTimeout(s5_hide_scroll_to_top_display_none,300);}}
jQuery(document).ready(function(){s5_hide_scroll_to_top();});jQuery(window).resize(s5_hide_scroll_to_top);if(window.addEventListener){window.addEventListener('scroll',s5_hide_scroll_to_top,false);}
else if(window.attachEvent){window.attachEvent('onscroll',s5_hide_scroll_to_top);}}catch(e){console.error('Error in script declaration; Error:'+e.message);};";}