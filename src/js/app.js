(function($) {
    function determinePaymentUrl() {
        if ( membershipPaymentUrls ) {
            var memberType = $('#member-type').val();

            if (memberType == 'Benefactor') {
                return membershipPaymentUrls['benefactor'];
            }

            var isGrandparent = $('#is-grandparent input').is(':checked');

            // console.log( memberType, isGrandparent );

            if (memberType == 'CKM Member') {
                if (isGrandparent) {
                    return membershipPaymentUrls['ckm_grandparent'];
                } else {
                    return membershipPaymentUrls['ckm_family'];
                }
            } else if (memberType == 'CKDZ Member') {
                if (isGrandparent) {
                    return membershipPaymentUrls['dz_grandparent'];
                } else {
                    return membershipPaymentUrls['dz_family'];
                }
            }
        }

        return membershipPaymentUrls['default'];
    }

  document.addEventListener( 'wpcf7mailsent', function( event ) {
    if(event.detail.contactFormId == '319') {
        // console.log( determinePaymentUrl() );
      window.open( determinePaymentUrl() );
    }
  }, false );

    $( '#member-type, #is-grandparent input' ).blur( function() {
        var payOnlineButton = $( 'body.page-id-176 .block-buttons .nav-item:first-child a' ).attr( 'href', determinePaymentUrl() );
    } );

    $( 'body.page-id-176 .block-buttons .nav-item:first-child a' ).attr( 'href', determinePaymentUrl() );

  /** Dropdown on hover */
/*$(".navbar .nav-link.dropdown-toggle").hover( function () {
    // Open up the dropdown
    $(this).removeAttr('data-toggle'); // remove the data-toggle attribute so we can click and follow link
    $(this).parent().addClass('show'); // add the class show to the li parent
    $(this).next().addClass('show'); // add the class show to the dropdown div sibling
}, function () {
    // on mouseout check to see if hovering over the dropdown or the link still
    var isDropdownHovered = $(this).next().filter(":hover").length; // check the dropdown for hover - returns true of false
    var isThisHovered = $(this).filter(":hover").length;  // check the top level item for hover
    if(isDropdownHovered || isThisHovered) {
        // still hovering over the link or the dropdown
    } else {
        // no longer hovering over either - lets remove the 'show' classes
        $(this).attr('data-toggle', 'dropdown'); // put back the data-toggle attr
        $(this).parent().removeClass('show');
        $(this).next().removeClass('show');
    }
});
// Check the dropdown on hover
$(".navbar .dropdown-menu").hover( function () {
}, function() {
    var isDropdownHovered = $(this).prev().filter(":hover").length; // check the dropdown for hover - returns true of false
    var isThisHovered= $(this).filter(":hover").length;  // check the top level item for hover
    if(isDropdownHovered || isThisHovered) {
        // do nothing - hovering over the dropdown of the top level link
    } else {
        // get rid of the classes showing it
        $(this).parent().removeClass('show');
        $(this).removeClass('show');
    }
});*/

$('.navbar .dropdown').hover(function() {
//  $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown("fast");
  $(this).find('.dropdown-menu').first().stop(true, true).delay(250).addClass("show");
}, function() {
//  $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp("fast");
  $(this).find('.dropdown-menu').first().stop(true, true).delay(100).removeClass("show");
});

$('.navbar .dropdown > a').click(function() {
  location.href = this.href;
});

/*****************
 *  Hero Swiper  *
 *****************/

if ($('.home-hero .swiper-container .swiper-slide').length > 1) {
var mySwiper = new Swiper(".home-hero .swiper-container", {
  loop: true,
  slidesPerView: 1,
  centeredSlides: true,
  pagination: {
     el: $(".home-hero .swiper-pagination"),
     clickable: true
   },
   autoplay: {
    delay: 7000,
  },
  watchOverflow: true
});
}

/*****************
 *  Light Brite  *
 *****************/
 var lightColors = ['white','blue','red','yellow'];

$('.lights .light').each(function(){
  var addColor = Math.round(Math.random());
  if (addColor) {
    var color = Math.floor((Math.random() * 4) + 1) - 1;
    $(this).addClass(lightColors[color]);
    $(this).attr( "data-color", color );
  }
});
$('.lights .light').click(function(){
  oldColor = $(this).attr("data-color");
  $(this).removeClass(lightColors[oldColor]);
  var newColor = parseInt(oldColor, 10) + 1;
  if (newColor > 3) {newColor = 0;}
  $(this).addClass(lightColors[newColor]);
  $(this).attr( "data-color", newColor );
});

$('.home-about h2').click(function(){
  $('.lights .light').each(function(){
    oldColor = $(this).attr("data-color");
    $(this).removeClass(lightColors[oldColor]);
    $(this).attr( "data-color", 0 );
  });
});


/**********************
 *   Swiper Sliders   *
 **********************/

// Gallery Slider - Swiper
// Cycles through each slider to allow multiple sliders per page
$(".block-gallery").each(function(){
  var options = {};
  var thisSwiper = $(this).find(".swiper-container");
  // Checks the slider has more than one slide. If it doesn't, pagination is disabled for that slider.
  if ( $(this).find(".swiper-slide").length > 1 ) {
    options = {
      loop: false,
      slidesPerView: 3,
      spaceBetween: 20,
      centeredSlides: false,
      watchOverflow: true,
        navigation: {
          nextEl: $(this).find(".swiper-button-next"),
          prevEl: $(this).find(".swiper-button-prev"),
        },
        pagination: {
          el: $(this).find(".swiper-pagination"),
          clickable: true,
          dynamicBullets: true
        },
        breakpoints: {
         676: {
           slidesPerView: 2,
           spaceBetween: 10
         },
         991: {
           slidesPerView: 2,
           spaceBetween: 20
         }
        }
    }
  } else {
    options = {
        loop: false,
        autoplay: false,
    }
    $(this).find(".swiper-button-next").remove();
    $(this).find(".swiper-button-prev").remove();
    $(this).find(".swiper-pagination").remove();
  }
  var swiper = new Swiper(thisSwiper, options);
});

/**********************
*  Lightbox Gallery  *
**********************/
$('#lightgallery').lightGallery({
selector: '.item'
});

/**********************
*  Accordion Buttons  *
**********************/
$('.accordion-show').on('click', function(e) {
     var target = $(this).data("target");
     $('#'+target+' .collapse').collapse('show');
 })
 $('.accordion-hide').on('click', function(e) {
   var target = $(this).data("target");
   $('#'+target+' .collapse').collapse('hide');
 })

})(jQuery);
