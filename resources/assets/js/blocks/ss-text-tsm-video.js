global.$ = global.jQuery = require('jquery');

import 'slick-carousel';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

(function ($) {
    "use strict";

    const beTestimonialSlider = () =>{

        const $testimonial = $('.be-ss-text-tsm-video .be-ss-text-tsm-video--testimonial-slider');
		if ($testimonial.length === 0) return;

        $testimonial.each(function () {
            $(this).slick({
                slidesToShow: 1,
                infinite:false,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                dots: true
            });
        })
    }


    $(window).on("scroll", function () {

    });

    $(document).ready(function () {
        beTestimonialSlider()
    })

})(jQuery);