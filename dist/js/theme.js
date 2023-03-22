(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/theme"],{

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

      // if($style == 'is-style-default'){
      //     $arrowTablet = false
      // }

      // if($style == 'is-style-2'){
      //     $arrowMobile = true
      // }

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

/***/ "./resources/assets/js/components/function.js":
/*!****************************************************!*\
  !*** ./resources/assets/js/components/function.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  $(window).on("scroll", function () {});
  $(document).ready(function () {});
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

  $(window).on("load", function () {});
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
/* harmony import */ var _components_function__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_components_function__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var aos__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! aos */ "./node_modules/aos/dist/aos.js");
/* harmony import */ var aos__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(aos__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var aos_dist_aos_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! aos/dist/aos.css */ "./node_modules/aos/dist/aos.css");
/* harmony import */ var aos_dist_aos_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(aos_dist_aos_css__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _blocks_hero__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./blocks/hero */ "./resources/assets/js/blocks/hero.js");
/* harmony import */ var _blocks_hero__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_blocks_hero__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _blocks_testimonials__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./blocks/testimonials */ "./resources/assets/js/blocks/testimonials.js");
/* harmony import */ var _blocks_posts_slider_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./blocks/posts-slider.js */ "./resources/assets/js/blocks/posts-slider.js");




aos__WEBPACK_IMPORTED_MODULE_2___default.a.init({
  duration: 1200,
  once: true,
  disable: 'mobile'
});




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
/*!*******************************************************************************!*\
  !*** multi ./resources/assets/js/theme.js ./resources/assets/scss/theme.scss ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\rimki\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\js\theme.js */"./resources/assets/js/theme.js");
module.exports = __webpack_require__(/*! C:\Users\rimki\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\theme.scss */"./resources/assets/scss/theme.scss");


/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);