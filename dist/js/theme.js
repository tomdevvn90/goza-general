(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/theme"],{

/***/ "./resources/assets/js/blocks/events-listing.js":
/*!******************************************************!*\
  !*** ./resources/assets/js/blocks/events-listing.js ***!
  \******************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(global, jQuery) {/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! slick-carousel */ "./node_modules/slick-carousel/slick/slick.js");
/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(slick_carousel__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var slick_carousel_slick_slick_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! slick-carousel/slick/slick.css */ "./node_modules/slick-carousel/slick/slick.css");
/* harmony import */ var slick_carousel_slick_slick_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(slick_carousel_slick_slick_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var slick_carousel_slick_slick_theme_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! slick-carousel/slick/slick-theme.css */ "./node_modules/slick-carousel/slick/slick-theme.css");
/* harmony import */ var slick_carousel_slick_slick_theme_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(slick_carousel_slick_slick_theme_css__WEBPACK_IMPORTED_MODULE_2__);
global.$ = global.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");



(function ($) {
  "use strict";

  var beEventsListing = function beEventsListing() {
    var $block = $('.be-events-listing-block');
    if ($block.length === 0) return;
    var $tplDefault = $('.be-events-listing-block.is-style-default');
    if ($tplDefault.length > 0) {
      $tplDefault.find('.item-event').first().removeClass('__hide');
      $tplDefault.find('.item-event').first().find('.item-event--excerpt').show('1000');
      $(document).on('click', '.item-event.__hide .item-event--icon-toggle', function (e) {
        e.preventDefault();
        $('.item-event').addClass('__hide');
        $('.item-event').find('.item-event--excerpt').hide('1000');
        $(this).parents('.item-event').removeClass('__hide');
        $(this).parents('.item-event').find('.item-event--excerpt').show('1000');
      });
    }
  };
  $(window).on("scroll", function () {});
  $(document).ready(function () {
    beEventsListing();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../../node_modules/webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js"), __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/gives-slider.js":
/*!****************************************************!*\
  !*** ./resources/assets/js/blocks/gives-slider.js ***!
  \****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(global, jQuery) {/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! slick-carousel */ "./node_modules/slick-carousel/slick/slick.js");
/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(slick_carousel__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var slick_carousel_slick_slick_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! slick-carousel/slick/slick.css */ "./node_modules/slick-carousel/slick/slick.css");
/* harmony import */ var slick_carousel_slick_slick_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(slick_carousel_slick_slick_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var slick_carousel_slick_slick_theme_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! slick-carousel/slick/slick-theme.css */ "./node_modules/slick-carousel/slick/slick-theme.css");
/* harmony import */ var slick_carousel_slick_slick_theme_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(slick_carousel_slick_slick_theme_css__WEBPACK_IMPORTED_MODULE_2__);
global.$ = global.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");



(function ($) {
  "use strict";

  var beGivesSlider = function beGivesSlider() {
    var $block = $('.be-give-slider-block');
    if ($block.length === 0) return;
    $block.each(function () {
      var $slider = $(this).find('.be-give-slider-block-inner'),
        $dataSlider = $(this).data('slider'),
        $style = $(this).data('style'),
        $arrowTablet = true,
        $arrowMobile = false;
      var opt_df = {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        adaptiveHeight: true,
        fade: false,
        cssEase: 'linear',
        responsive: [{
          breakpoint: 1200,
          settings: {
            arrows: $arrowTablet,
            slidesToShow: 2
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            arrows: $arrowMobile,
            dots: true
          }
        }]
      };
      $slider.slick(Object.assign({}, opt_df, $dataSlider));
    });
  };
  $(window).on("scroll", function () {});
  $(document).ready(function () {
    beGivesSlider();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../../node_modules/webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js"), __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/hero.js":
/*!********************************************!*\
  !*** ./resources/assets/js/blocks/hero.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "./resources/assets/js/blocks/posts-slider.js":
/*!****************************************************!*\
  !*** ./resources/assets/js/blocks/posts-slider.js ***!
  \****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(global, jQuery) {/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! slick-carousel */ "./node_modules/slick-carousel/slick/slick.js");
/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(slick_carousel__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var slick_carousel_slick_slick_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! slick-carousel/slick/slick.css */ "./node_modules/slick-carousel/slick/slick.css");
/* harmony import */ var slick_carousel_slick_slick_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(slick_carousel_slick_slick_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var slick_carousel_slick_slick_theme_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! slick-carousel/slick/slick-theme.css */ "./node_modules/slick-carousel/slick/slick-theme.css");
/* harmony import */ var slick_carousel_slick_slick_theme_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(slick_carousel_slick_slick_theme_css__WEBPACK_IMPORTED_MODULE_2__);
global.$ = global.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");



(function ($) {
  "use strict";

  var bePostsSlider = function bePostsSlider() {
    var $block = $('.be-post-slider-block');
    if ($block.length === 0) return;
    $block.each(function () {
      var $slider = $(this).find('.be-post-slider-block-inner'),
        $dataSlider = $(this).data('slider'),
        $style = $(this).data('style'),
        $arrowTablet = true,
        $arrowMobile = false;
      var opt_df = {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        adaptiveHeight: true,
        fade: false,
        cssEase: 'linear',
        responsive: [{
          breakpoint: 1200,
          settings: {
            arrows: $arrowTablet,
            slidesToShow: 2
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            arrows: $arrowMobile,
            dots: true
          }
        }]
      };
      $slider.slick(Object.assign({}, opt_df, $dataSlider));
    });
  };
  $(window).on("scroll", function () {});
  $(document).ready(function () {
    bePostsSlider();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../../node_modules/webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js"), __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/ss-upcoming-event-video.js":
/*!***************************************************************!*\
  !*** ./resources/assets/js/blocks/ss-upcoming-event-video.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global, jQuery) {global.$ = global.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
(function ($) {
  "use strict";

  var beHanldeEvent = function beHanldeEvent() {
    var $block = $('.be-ss-upcoming-event-video--content-event-list-inner');
    if ($block.length === 0) return;
    $block.find('.item-event').first().removeClass('__hide');
    $block.find('.item-event').first().find('.item-event--excerpt').show('1000');
    $(document).on('click', '.item-event.__hide .item-event--icon-toggle', function (e) {
      e.preventDefault();
      $('.item-event').addClass('__hide');
      $('.item-event').find('.item-event--excerpt').hide('1000');
      $(this).parents('.item-event').removeClass('__hide');
      $(this).parents('.item-event').find('.item-event--excerpt').show('1000');
    });
  };
  $(window).on("scroll", function () {});
  $(document).ready(function () {
    beHanldeEvent();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../../node_modules/webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js"), __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/testimonials.js":
/*!****************************************************!*\
  !*** ./resources/assets/js/blocks/testimonials.js ***!
  \****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(global, jQuery) {/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! slick-carousel */ "./node_modules/slick-carousel/slick/slick.js");
/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(slick_carousel__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var slick_carousel_slick_slick_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! slick-carousel/slick/slick.css */ "./node_modules/slick-carousel/slick/slick.css");
/* harmony import */ var slick_carousel_slick_slick_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(slick_carousel_slick_slick_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var slick_carousel_slick_slick_theme_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! slick-carousel/slick/slick-theme.css */ "./node_modules/slick-carousel/slick/slick-theme.css");
/* harmony import */ var slick_carousel_slick_slick_theme_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(slick_carousel_slick_slick_theme_css__WEBPACK_IMPORTED_MODULE_2__);
global.$ = global.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");



(function ($) {
  "use strict";

  var beTestominialCarousel = function beTestominialCarousel() {
    var $block = $('.be-testominials-block');
    if ($block.length === 0) return;
    $block.each(function () {
      var $carousel = $(this).find('.be-testominials-block-carousel'),
        $dataCarousel = $(this).data('carousel'),
        $style = $(this).data('style'),
        $arrowTablet = true,
        $arrowMobile = false;
      if ($style == 'is-style-default') {
        $arrowTablet = false;
      }
      if ($style == 'is-style-2') {
        $arrowMobile = true;
      }
      var opt_df = {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        adaptiveHeight: true,
        fade: false,
        cssEase: 'linear',
        responsive: [{
          breakpoint: 992,
          settings: {
            arrows: $arrowTablet,
            slidesToShow: 1
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            arrows: $arrowMobile,
            dots: true
          }
        }]
      };
      $carousel.slick(Object.assign({}, opt_df, $dataCarousel));
    });
  };
  $(window).on("scroll", function () {});
  $(document).ready(function () {
    beTestominialCarousel();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../../node_modules/webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js"), __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/video-popup-actions.js":
/*!***********************************************************!*\
  !*** ./resources/assets/js/blocks/video-popup-actions.js ***!
  \***********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var lightgallery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lightgallery */ "./node_modules/lightgallery/lightgallery.es5.js");
/* harmony import */ var lightgallery_plugins_video__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lightgallery/plugins/video */ "./node_modules/lightgallery/plugins/video/lg-video.es5.js");


Object(lightgallery__WEBPACK_IMPORTED_MODULE_0__["default"])(document.getElementById('block-video-action'), {
  plugins: [lightgallery_plugins_video__WEBPACK_IMPORTED_MODULE_1__["default"]]
});

/***/ }),

/***/ "./resources/assets/js/components/function.js":
/*!****************************************************!*\
  !*** ./resources/assets/js/components/function.js ***!
  \****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(jQuery) {/* harmony import */ var lightgallery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lightgallery */ "./node_modules/lightgallery/lightgallery.es5.js");
/* harmony import */ var lightgallery_plugins_video__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lightgallery/plugins/video */ "./node_modules/lightgallery/plugins/video/lg-video.es5.js");
/* harmony import */ var lightgallery_plugins_autoplay__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lightgallery/plugins/autoplay */ "./node_modules/lightgallery/plugins/autoplay/lg-autoplay.es5.js");
/* harmony import */ var counterup2__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! counterup2 */ "./node_modules/counterup2/dist/index.js");
/* harmony import */ var counterup2__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(counterup2__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var lightgallery_plugins_thumbnail__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! lightgallery/plugins/thumbnail */ "./node_modules/lightgallery/plugins/thumbnail/lg-thumbnail.es5.js");
/* harmony import */ var lightgallery_plugins_zoom__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! lightgallery/plugins/zoom */ "./node_modules/lightgallery/plugins/zoom/lg-zoom.es5.js");
//lightgallery






(function ($) {
  "use strict";

  var lightGalleryFooter = function lightGalleryFooter() {
    Object(lightgallery__WEBPACK_IMPORTED_MODULE_0__["default"])(document.getElementById('main-footer-gallery-list'), {
      speed: 500
    });
  };
  var beProgressbar = function beProgressbar() {
    var $isProgressbar = $('[data-progressbar]');
    if ($isProgressbar.length === 0) return;
    $isProgressbar.each(function () {
      var $value = $(this).data('progressbar') / 100,
        $idProgressbar = $(this).attr('id'),
        ProgressBar = __webpack_require__(/*! progressbar.js */ "./node_modules/progressbar.js/src/main.js"),
        $heading = $(this).data('heading') ? $(this).data('heading') : '',
        $duration = $(this).data('duration'),
        $trailcolor = $(this).data('trailcolor'),
        $strokecolor = $(this).data('strokecolor');
      if ($value && $idProgressbar) {
        var circle = new ProgressBar.Circle("#".concat($idProgressbar), {
          strokeWidth: 8,
          trailWidth: 8,
          trailColor: $trailcolor,
          easing: 'easeInOut',
          duration: $duration,
          text: {
            autoStyleContainer: false
          },
          from: {
            color: $strokecolor,
            width: 8
          },
          to: {
            color: $strokecolor,
            width: 8
          },
          // Set default step function for all animate calls
          step: function step(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);
            var value = Math.round(circle.value() * 100);
            if (value === 0) {
              circle.setText('');
            } else {
              circle.setText("<span> ".concat(value, "<sup>%</sup> </span> <p> ").concat($heading, " </p>"));
            }
          }
        });
        circle.animate($value);
      }
    });
  };
  var beCounter = function beCounter() {
    var $isCounter = document.querySelectorAll('[data-counter]');
    if ($isCounter.length === 0) return;
    var callback = function callback(entries) {
      entries.forEach(function (entry) {
        var el = entry.target;
        if (entry.isIntersecting && !el.classList.contains('is-visible')) {
          var $duration = $(el).data('duration') ? $(el).data('duration') : 1000;
          var $delay = $(el).data('delay') ? $(el).data('delay') : 60;
          counterup2__WEBPACK_IMPORTED_MODULE_3___default()(el, {
            duration: $duration,
            delay: $delay
          });
          el.classList.add('is-visible');
        }
      });
    };
    var IO = new IntersectionObserver(callback, {
      threshold: 1
    });
    $isCounter.forEach(function ($value, index) {
      IO.observe($value);
    });
  };
  var bePopupsVideo = function bePopupsVideo() {
    var $popupVideo = $('.be-popup-video');
    if ($popupVideo.length === 0) return;
    $popupVideo.each(function () {
      var $idPopupVd = $(this).attr('id');
      Object(lightgallery__WEBPACK_IMPORTED_MODULE_0__["default"])(document.getElementById("".concat($idPopupVd)), {
        plugins: [lightgallery_plugins_video__WEBPACK_IMPORTED_MODULE_1__["default"], lightgallery_plugins_autoplay__WEBPACK_IMPORTED_MODULE_2__["default"]],
        autoplay: true,
        speed: 500,
        videojs: true,
        videojsOptions: {
          muted: true
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
          color: 'A90707'
        }
      });
    });
  };
  var gozaSearch = function gozaSearch() {
    $(document).on('click', '.goza-header-search', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var MODAL_SEARCH = $('#goza-modal-search');
      MODAL_SEARCH.addClass('is-show');
    });
    $(document).on('click', '.goza-search-close', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var MODAL_SEARCH = $('#goza-modal-search');
      MODAL_SEARCH.removeClass('is-show');
    });
  };
  var beLightGallery = function beLightGallery() {
    var $lightGallery = $('[data-light-gallery]');
    if ($lightGallery.length === 0) return;
    $lightGallery.each(function () {
      var $id = $(this).attr('id');
      Object(lightgallery__WEBPACK_IMPORTED_MODULE_0__["default"])(document.getElementById("".concat($id)), {
        speed: 500,
        plugins: [lightgallery_plugins_zoom__WEBPACK_IMPORTED_MODULE_5__["default"], lightgallery_plugins_thumbnail__WEBPACK_IMPORTED_MODULE_4__["default"]]
      });
    });
  };
  $(window).on("scroll", function () {});
  $(document).ready(function () {});
  $(window).on("load", function () {
    //preloader
    var $PRELOADER = $('.goza-preloader');
    $PRELOADER.hide();

    //Back to top
    $("#back-to-top").click(function () {
      $("html, body").animate({
        scrollTop: 0
      }, 1000);
    });

    //Gallery on footer
    lightGalleryFooter();

    //search
    gozaSearch();
    bePopupsVideo();
    beCounter();
    beProgressbar();
    beLightGallery();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/components/navigation.js":
/*!******************************************************!*\
  !*** ./resources/assets/js/components/navigation.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global, jQuery) {global.$ = global.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
(function ($) {
  "use strict";

  //Toggle Menu
  var gozaToggleMenu = function gozaToggleMenu() {
    $('.nav-link.dropdown-toggle').append('<span class="handle-sub"></span>');
    $(document).on('click', '.handle-sub', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var el = $(this).closest('.menu-item');
      $(el).toggleClass('li-active');
      $(el).children('.sub-menu.dropdown-menu').slideToggle();
      $(el).find('.handle-sub').toggleClass('active');
    });
    var MENU_HAMBERGER = $('#goza-hamberger'),
      $body = $('body'),
      MENU_CLOSE = $('.off-canvas-menu-closed');
    MENU_HAMBERGER.click(function () {
      $body.addClass('--menu-open');
    });
    MENU_CLOSE.click(function () {
      $body.removeClass('--menu-open');
    });
  };
  $(window).on("load", function () {
    gozaToggleMenu();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../../node_modules/webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js"), __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/theme.js":
/*!**************************************!*\
  !*** ./resources/assets/js/theme.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_navigation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/navigation */ "./resources/assets/js/components/navigation.js");
/* harmony import */ var _components_navigation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_components_navigation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_function__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/function */ "./resources/assets/js/components/function.js");
/* harmony import */ var aos__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! aos */ "./node_modules/aos/dist/aos.js");
/* harmony import */ var aos__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(aos__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var aos_dist_aos_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! aos/dist/aos.css */ "./node_modules/aos/dist/aos.css");
/* harmony import */ var aos_dist_aos_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(aos_dist_aos_css__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _blocks_hero__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./blocks/hero */ "./resources/assets/js/blocks/hero.js");
/* harmony import */ var _blocks_hero__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_blocks_hero__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _blocks_testimonials__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./blocks/testimonials */ "./resources/assets/js/blocks/testimonials.js");
/* harmony import */ var _blocks_posts_slider__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./blocks/posts-slider */ "./resources/assets/js/blocks/posts-slider.js");
/* harmony import */ var _blocks_events_listing__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./blocks/events-listing */ "./resources/assets/js/blocks/events-listing.js");
/* harmony import */ var _blocks_gives_slider__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./blocks/gives-slider */ "./resources/assets/js/blocks/gives-slider.js");
/* harmony import */ var _blocks_video_popup_actions__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./blocks/video-popup-actions */ "./resources/assets/js/blocks/video-popup-actions.js");
/* harmony import */ var _blocks_ss_upcoming_event_video__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./blocks/ss-upcoming-event-video */ "./resources/assets/js/blocks/ss-upcoming-event-video.js");
/* harmony import */ var _blocks_ss_upcoming_event_video__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_blocks_ss_upcoming_event_video__WEBPACK_IMPORTED_MODULE_10__);




aos__WEBPACK_IMPORTED_MODULE_2___default.a.init({
  duration: 1200,
  once: true,
  disable: 'mobile'
});








/***/ }),

/***/ "./resources/assets/scss/editor/editor.scss":
/*!**************************************************!*\
  !*** ./resources/assets/scss/editor/editor.scss ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/theme.scss":
/*!******************************************!*\
  !*** ./resources/assets/scss/theme.scss ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!**************************************************************************************************************************!*\
  !*** multi ./resources/assets/js/theme.js ./resources/assets/scss/theme.scss ./resources/assets/scss/editor/editor.scss ***!
  \**************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\BeplusJob\goza-theme\resources\assets\js\theme.js */"./resources/assets/js/theme.js");
__webpack_require__(/*! D:\BeplusJob\goza-theme\resources\assets\scss\theme.scss */"./resources/assets/scss/theme.scss");
module.exports = __webpack_require__(/*! D:\BeplusJob\goza-theme\resources\assets\scss\editor\editor.scss */"./resources/assets/scss/editor/editor.scss");


/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);