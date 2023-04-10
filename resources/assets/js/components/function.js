//lightgallery
import lightGallery from 'lightgallery'; 
import lgVideo from 'lightgallery/plugins/video';
import lgAutoplay from 'lightgallery/plugins/autoplay'

(function ($) {
    "use strict";

    const lightGalleryFooter = () => {
        lightGallery(document.getElementById('main-footer-gallery-list'), {
            speed: 500, 
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
        bePopupsVideo()

    });

})(jQuery);