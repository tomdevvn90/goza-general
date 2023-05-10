import counterUp from 'counterup2'

(function ($) {
    "use strict";

    const beCounterBox = () =>{
        const $isCounter = $('.be-counter-up .counter-up');
        if ($isCounter.length === 0) return;

        const callback = entries => {
            entries.forEach( entry => {
                
                const el = entry.target
                if ( entry.isIntersecting && ! el.classList.contains( 'is-visible' ) ) {
                    let $duration = $(el).data('duration') ? $(el).data('duration') : 1000
                    let $delay    = $(el).data('delay') ? $(el).data('delay') : 60
                    
                    counterUp( el, {
                        duration: $duration,
                        delay: $delay,
                    } )

                    el.classList.add( 'is-visible' )
                }
            } )
        }

        const IO = new IntersectionObserver( callback, { threshold: 1 } )

        $isCounter.forEach(function ($value, index) {
            IO.observe( $value )
        });    

    }

    $(window).on("scroll", function () {

    });

    $(document).ready(function () {

    })

    $(window).on("load", function () {
        beCounterBox();
    });

})(jQuery);