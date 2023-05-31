global.$ = global.jQuery = require('jquery');

(function ($) {
    "use strict";

    const beCountDownEvent = () =>{
        const $ev_cd = $('.be-single-event-inner--count-down')
        if ($ev_cd.length === 0) return;

        $ev_cd.each(function () {
            let $dataCountDown = $(this).data('count-down')
            let $result = $(this).find('#be-count-down')

            if($dataCountDown.length > 0){
                __renderCountDown($dataCountDown, $result)
            }
        })


        function __renderCountDown ($dataCountDown, $result){
            var countDownDate = new Date(`${$dataCountDown}`).getTime();
            const $color_heading = $result.data('color-heading')
            const $color_number  = $result.data('color-number')

            var x = setInterval(function() {
                // Get todays date and time
                var now = new Date().getTime();
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                $result.html("<div class='be-day'>" + days + "<span>Days</span>" + "</div>" + "<div class='be-hours'>" + hours + "<span>Hours</span>" + "</div>"
                + "<div class='be-min'>" + minutes + "<span>Minutes</span>" + "</div>" + "<div class='be-sec'>" + seconds + "<span>Seconds</span>" + "</div>");
              
                if($color_number.length > 0){
                    $result.find('> div').css("color", $color_number)
                }

                if($color_heading.length > 0){
                    $result.find('> div > span').css("color", $color_heading)
                }
                
                if (distance < 0) {
                clearInterval(x);
                    document.getElementById("be-count-down").innerHTML = "EXPIRED";
                    $result.html("<span>EXPIRED</span>");
                }
            }, 1000);
        }
    }   


    $(window).on("scroll", function () {

    });

    $(document).ready(function () {
        // beCountDownEvent()
    })

})(jQuery);
