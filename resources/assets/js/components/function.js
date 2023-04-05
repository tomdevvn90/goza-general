(function ($) {
    "use strict";


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
    });

})(jQuery);