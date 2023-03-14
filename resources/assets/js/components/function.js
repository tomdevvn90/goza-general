global.$ = global.jQuery = require('jquery');

import 'slick-carousel';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

(function ($) {
    "use strict";

    const beTestominialCarousel = () =>{

        const $block = $('.be-testominials-block');
		if ($block.length === 0) return;

        $block.each(function () {
            let $carousel     = $(this).find('.be-testominials-block-carousel')
            let $dataCarousel = $(this).data('carousel')
            
            let opt_df = {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: false,
				autoplay: true,
				arrows: false,
			};
			$carousel.slick(Object.assign({}, opt_df, $dataCarousel));
        })



    }


    $(window).on("scroll", function () {

    });

    $(document).ready(function () {
        beTestominialCarousel()
    })

})(jQuery);