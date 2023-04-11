//lightgallery
import lightGallery from 'lightgallery'; 
import lgVideo from 'lightgallery/plugins/video';
import lgAutoplay from 'lightgallery/plugins/autoplay'
import counterUp from 'counterup2'

(function ($) {
    "use strict";

    const lightGalleryFooter = () => {
        lightGallery(document.getElementById('main-footer-gallery-list'), {
            speed: 500, 
        });
    }

    const beCounter = () =>{
        const $isCounter = document.querySelectorAll('[data-counter]');
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

    const bePopupsVideo = () =>{
        const $popupVideo = $('.be-popup-video');
        if ($popupVideo.length === 0) return;

        $popupVideo.each(function() {
            let $idPopupVd = $(this).attr('id')

            lightGallery(document.getElementById(`${$idPopupVd}`), {
                plugins: [lgVideo, lgAutoplay],
                autoplay: true,
                speed: 500,
                videojs: true,
                videojsOptions: {
                    muted: true,
                },
                loadYoutubeThumbnail: true,
                youtubeThumbSize: 'default',
                loadVimeoThumbnail: true,
                vimeoThumbSize: 'thumbnail_medium',
                youtubePlayerParams: {
                    modestbranding: 1,
                    showinfo: 0,
                    rel: 0,
                    controls: 1,
                    autoplay: 1,
                    mute: 1 
                },
                vimeoPlayerParams: {
                    byline: 0,
                    portrait: 0,
                    color: 'A90707',
                }
            });
        })
    }

    const gozaSearch = () => {
        $(document).on('click', '.goza-header-search', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const MODAL_SEARCH = $('#goza-modal-search');
            MODAL_SEARCH.addClass('is-show');
        });

        $(document).on('click', '.goza-search-close', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const MODAL_SEARCH = $('#goza-modal-search');
            MODAL_SEARCH.removeClass('is-show');
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

        //Gallery on footer
        lightGalleryFooter();

        //search
        gozaSearch();

        bePopupsVideo()
        beCounter()
    });

})(jQuery);