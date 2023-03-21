global.$ = global.jQuery = require('jquery');

import 'slick-carousel';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

(function ($) {
    "use strict";

    const bePostsSlider = () =>{

        const $block = $('.be-post-slider-block');
		if ($block.length === 0) return;

        $block.each(function () {
            let $slider       = $(this).find('.be-post-slider-block-inner'),
                $dataSlider   = $(this).data('slider'),
                $style        = $(this).data('style'),
                $arrowTablet  = true,
                $arrowMobile  = false

            // if($style == 'is-style-default'){
            //     $arrowTablet = false
            // }

            // if($style == 'is-style-2'){
            //     $arrowMobile = true
            // }
            
            let opt_df = {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: false,
				autoplay: true,
				arrows: false,
                adaptiveHeight: true,
                fade: false,
                cssEase: 'linear',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2
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
			$slider.slick(Object.assign({}, opt_df, $dataSlider));
        })
    }


    $(window).on("scroll", function () {

    });

    $(document).ready(function () {
        bePostsSlider()
    })

})(jQuery);