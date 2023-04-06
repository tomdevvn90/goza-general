//lightgallery
import lightGallery from 'lightgallery'; 

(function ($) {
    "use strict";

    const lightGalleryFooter = () => {
        lightGallery(document.getElementById('main-footer-gallery-list'), {
            speed: 500, 
        });
    }

    $(window).on("scroll", function () {

    });

    $(document).ready(function () {

    })

    $(window).on("load", function () {
        //preloader
        const $PRELOADER = $('.goza-preloader');
        $PRELOADER.hide();

        //Back to top
        $("#back-to-top").click(function () {
            $("html, body").animate({ scrollTop: 0 }, 1000);
        });

        lightGalleryFooter();

    });

})(jQuery);