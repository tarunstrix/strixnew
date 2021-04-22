jQuery('.silder-section').slick({
  centerMode: true,
  centerPadding: '10px',
  slidesToShow:2,
  autoplay: true,
  autoplaySpeed:1000,
  dots: false,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
jQuery( document ).on('scroll', function(){

		if ( jQuery( document ).scrollTop() > 0 ){
			jQuery( '.header-section-strix' ).addClass( 'sticky' );			   
		} else {
			jQuery( '.header-section-strix' ).removeClass( 'sticky' );			
		}

	});
	jQuery('.testimonial-slide').slick({
  centerMode: true,
  centerPadding: '10px',
  slidesToShow:2,
  autoplay: true,
  autoplaySpeed:1000,
    prevArrow: '<button class="slide-arrow prev-arrow"></button>',
    nextArrow: '<button class="slide-arrow next-arrow"></button>',
   arrows: true,
  dots: false,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
jQuery(".icon-search-strix").click(function(){
  jQuery(".input-field-strix").toggle();
});
 