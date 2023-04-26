//lightgallery
import lightGallery from 'lightgallery'; 
import lgVideo from 'lightgallery/plugins/video';
import lgAutoplay from 'lightgallery/plugins/autoplay'
import counterUp from 'counterup2'

import lgThumbnail from 'lightgallery/plugins/thumbnail'
import lgZoom from 'lightgallery/plugins/zoom'

(function ($) {
    "use strict";

    const lightGalleryFooter = () => {
        lightGallery(document.getElementById('main-footer-gallery-list'), {
            speed: 500, 
        });
    }

    const beProgressbar = () =>{
        const $isProgressbar = $('[data-progressbar]');
        if ($isProgressbar.length === 0) return;

        $isProgressbar.each(function() {
            let $value         = $(this).data('progressbar') / 100,
                $idProgressbar = $(this).attr('id'),
                ProgressBar    = require('progressbar.js'),
                $heading       = $(this).data('heading') ? $(this).data('heading') : '',
                $duration      = $(this).data('duration'),
                $trailcolor    = $(this).data('trailcolor'),
                $strokecolor   = $(this).data('strokecolor')
            
            if($value && $idProgressbar){
                let circle = new ProgressBar.Circle(`#${$idProgressbar}`, {
                    
                    strokeWidth: 8, 
                    trailWidth: 8,
                    trailColor: $trailcolor,
                    easing: 'easeInOut',
                    duration: $duration,
                    text: {
                        autoStyleContainer: false
                    },
                    from: { color: $strokecolor, width: 8},
                    to:   { color: $strokecolor, width: 8 },
                    // Set default step function for all animate calls
                    step: function(state, circle) {
                        circle.path.setAttribute('stroke', state.color);
                        circle.path.setAttribute('stroke-width', state.width);

                        var value = Math.round(circle.value() * 100);
                        if (value === 0) {
                            circle.setText('');
                        } else {
                            circle.setText(`<span> ${value}<sup>%</sup> </span> <p> ${$heading} </p>`);
                          
                        }
                    }
                });

                circle.animate($value); 
            }
        })
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

    const beLightGallery = () =>{
        const $lightGallery = $('[data-light-gallery]');
        if ($lightGallery.length === 0) return;
       
        $lightGallery.each(function() {
            let $id = $(this).attr('id');
           
            lightGallery(document.getElementById(`${$id}`), {
                speed: 500, 
                plugins: [lgZoom, lgThumbnail]
            });
        })
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
        beProgressbar()
        beLightGallery()
    });

})(jQuery);