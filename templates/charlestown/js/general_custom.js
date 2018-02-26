jQuery(document).ready(function(){

jQuery( "#a-site-logo" ).hover(
  function() {

        jQuery('#site-logo').css('transform',"scale(1.05)");
    });
jQuery( "#a-site-logo" ).mouseout(function() {
    jQuery('#site-logo').css('transform',"scale(1)");
});
jQuery('.fadein_img').fadeInScroll();
       jQuery(window).scroll( function(){

});
})

// jQuery(function() {
//     jQuery(window).scroll( function(){


//         jQuery('.fadein_img').each( function(i){

//             var bottom_of_object = jQuery(this).position().top + jQuery(this).outerHeight();
//             var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

//              Adjust the "200" to either have a delay or that the content starts fading a bit before you reach it
//             bottom_of_window = bottom_of_window + 200;

//             if( bottom_of_window > bottom_of_object ){

//                 jQuery(this).animate({'opacity':'1'},1000);

//             }
//         });

//     });
// });