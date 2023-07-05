
(function ($) {
    "use strict";

    const beTestimonialCarousel = () =>{

        const $block = $('.be-testimonials-block');
		if ($block.length === 0) return;

        $block.each(function () {
            let $carousel     = $(this).find('.be-testimonials-block-carousel'),
                $dataCarousel = $(this).data('carousel'),
                $style        = $(this).data('style'),
                $arrowTablet  = true,
                $arrowMobile  = false

            if($style == 'is-style-default'){
                $arrowTablet = false
            }

            if($style == 'is-style-2'){
                $arrowMobile = true
            }
            
            let opt_df = {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: false,
				autoplay: true,
				arrows: false,
                adaptiveHeight: false,
                fade: false,
                cssEase: 'linear',
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            arrows: $arrowTablet,
                            slidesToShow: 1
                      }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            arrows: $arrowMobile,
                            dots: true
                        }
                    },
                  ]
			};
            console.log($dataCarousel)
			$carousel.slick(Object.assign({}, opt_df, $dataCarousel));
        })
    }

    $(document).ready(function () {
        beTestimonialCarousel()
    })

})(jQuery);