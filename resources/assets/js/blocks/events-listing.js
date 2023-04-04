global.$ = global.jQuery = require('jquery');

import 'slick-carousel';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

(function ($) {
    "use strict";

    const beEventsListing = () =>{

        const $block = $('.be-events-listing-block');
		if ($block.length === 0) return;

        const $btnToggle = $block.find('.item-event--icon-toggle');

        $btnToggle.click(function(e){
            e.preventDefault();
            $('.item-event').removeClass('__is-current')
            $('.item-event').find('.item-event--excerpt').hide('slow')
            $(this).parents('.item-event').addClass('__is-current');
            $(this).parents('.item-event').find('.item-event--excerpt').show('slow')
        })
    }


    $(window).on("scroll", function () {

    });

    $(document).ready(function () {
        beEventsListing()
    })

})(jQuery);