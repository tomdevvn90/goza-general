/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/*!***********************!*\
  !*** ./src/blocks.js ***!
  \***********************/
/*! no exports provided */
/*! all exports used */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("Object.defineProperty(__webpack_exports__, \"__esModule\", { value: true });\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__blocks_global_styles__ = __webpack_require__(/*! ./blocks/global-styles */ 1);\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9ja3MuanM/N2I1YiJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgJy4vYmxvY2tzL2dsb2JhbC1zdHlsZXMnO1xuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vc3JjL2Jsb2Nrcy5qc1xuLy8gbW9kdWxlIGlkID0gMFxuLy8gbW9kdWxlIGNodW5rcyA9IDAiXSwibWFwcGluZ3MiOiJBQUFBO0FBQUE7Iiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///0\n");

/***/ }),
/* 1 */
/*!*******************************************!*\
  !*** ./src/blocks/global-styles/index.js ***!
  \*******************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__styles_style_scss__ = __webpack_require__(/*! ./styles/style.scss */ 2);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__styles_style_scss___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__styles_style_scss__);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__styles_editor_scss__ = __webpack_require__(/*! ./styles/editor.scss */ 3);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__styles_editor_scss___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__styles_editor_scss__);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__core_button__ = __webpack_require__(/*! ./core-button */ 4);\n/**\r\n * Import global styles.\r\n */\n\n//add style global\n\n\n\n//add style button\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9ja3MvZ2xvYmFsLXN0eWxlcy9pbmRleC5qcz8zZmVlIl0sInNvdXJjZXNDb250ZW50IjpbIi8qKlxyXG4gKiBJbXBvcnQgZ2xvYmFsIHN0eWxlcy5cclxuICovXG5cbi8vYWRkIHN0eWxlIGdsb2JhbFxuaW1wb3J0ICcuL3N0eWxlcy9zdHlsZS5zY3NzJztcbmltcG9ydCAnLi9zdHlsZXMvZWRpdG9yLnNjc3MnO1xuXG4vL2FkZCBzdHlsZSBidXR0b25cbmltcG9ydCAnLi9jb3JlLWJ1dHRvbic7XG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9zcmMvYmxvY2tzL2dsb2JhbC1zdHlsZXMvaW5kZXguanNcbi8vIG1vZHVsZSBpZCA9IDFcbi8vIG1vZHVsZSBjaHVua3MgPSAwIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///1\n");

/***/ }),
/* 2 */
/*!****************************************************!*\
  !*** ./src/blocks/global-styles/styles/style.scss ***!
  \****************************************************/
/*! dynamic exports provided */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMi5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9ja3MvZ2xvYmFsLXN0eWxlcy9zdHlsZXMvc3R5bGUuc2Nzcz85MzYwIl0sInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luXG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9zcmMvYmxvY2tzL2dsb2JhbC1zdHlsZXMvc3R5bGVzL3N0eWxlLnNjc3Ncbi8vIG1vZHVsZSBpZCA9IDJcbi8vIG1vZHVsZSBjaHVua3MgPSAwIl0sIm1hcHBpbmdzIjoiQUFBQSIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///2\n");

/***/ }),
/* 3 */
/*!*****************************************************!*\
  !*** ./src/blocks/global-styles/styles/editor.scss ***!
  \*****************************************************/
/*! dynamic exports provided */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMy5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9ja3MvZ2xvYmFsLXN0eWxlcy9zdHlsZXMvZWRpdG9yLnNjc3M/OGZjMCJdLCJzb3VyY2VzQ29udGVudCI6WyIvLyByZW1vdmVkIGJ5IGV4dHJhY3QtdGV4dC13ZWJwYWNrLXBsdWdpblxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vc3JjL2Jsb2Nrcy9nbG9iYWwtc3R5bGVzL3N0eWxlcy9lZGl0b3Iuc2Nzc1xuLy8gbW9kdWxlIGlkID0gM1xuLy8gbW9kdWxlIGNodW5rcyA9IDAiXSwibWFwcGluZ3MiOiJBQUFBIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///3\n");

/***/ }),
/* 4 */
/*!*******************************************************!*\
  !*** ./src/blocks/global-styles/core-button/index.js ***!
  \*******************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__style_scss__ = __webpack_require__(/*! ./style.scss */ 5);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__style_scss___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__style_scss__);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__editor_scss__ = __webpack_require__(/*! ./editor.scss */ 6);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__editor_scss___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__editor_scss__);\n//add style button\n\n\n\nwp.domReady(function () {\n    wp.blocks.registerBlockStyle('core/button', {\n        name: 'btn-goza-general',\n        label: 'General'\n    });\n\n    wp.blocks.registerBlockStyle('core/button', {\n        name: 'btn-goza-water',\n        label: 'Water'\n    });\n\n    wp.blocks.registerBlockStyle('core/button', {\n        name: 'btn-goza-charity',\n        label: 'Charity'\n    });\n\n    wp.blocks.registerBlockStyle('core/button', {\n        name: 'btn-goza-ngo-dark',\n        label: 'Ngo Dark'\n    });\n\n    wp.blocks.registerBlockStyle('core/button', {\n        name: 'btn-goza-water-charity',\n        label: 'Water Charity'\n    });\n\n    wp.blocks.registerBlockStyle('core/button', {\n        name: 'btn-goza-charity-organization',\n        label: 'Charity Organization'\n    });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9ja3MvZ2xvYmFsLXN0eWxlcy9jb3JlLWJ1dHRvbi9pbmRleC5qcz8wYzRlIl0sInNvdXJjZXNDb250ZW50IjpbIi8vYWRkIHN0eWxlIGJ1dHRvblxuaW1wb3J0ICcuL3N0eWxlLnNjc3MnO1xuaW1wb3J0ICcuL2VkaXRvci5zY3NzJztcblxud3AuZG9tUmVhZHkoZnVuY3Rpb24gKCkge1xuICAgIHdwLmJsb2Nrcy5yZWdpc3RlckJsb2NrU3R5bGUoJ2NvcmUvYnV0dG9uJywge1xuICAgICAgICBuYW1lOiAnYnRuLWdvemEtZ2VuZXJhbCcsXG4gICAgICAgIGxhYmVsOiAnR2VuZXJhbCdcbiAgICB9KTtcblxuICAgIHdwLmJsb2Nrcy5yZWdpc3RlckJsb2NrU3R5bGUoJ2NvcmUvYnV0dG9uJywge1xuICAgICAgICBuYW1lOiAnYnRuLWdvemEtd2F0ZXInLFxuICAgICAgICBsYWJlbDogJ1dhdGVyJ1xuICAgIH0pO1xuXG4gICAgd3AuYmxvY2tzLnJlZ2lzdGVyQmxvY2tTdHlsZSgnY29yZS9idXR0b24nLCB7XG4gICAgICAgIG5hbWU6ICdidG4tZ296YS1jaGFyaXR5JyxcbiAgICAgICAgbGFiZWw6ICdDaGFyaXR5J1xuICAgIH0pO1xuXG4gICAgd3AuYmxvY2tzLnJlZ2lzdGVyQmxvY2tTdHlsZSgnY29yZS9idXR0b24nLCB7XG4gICAgICAgIG5hbWU6ICdidG4tZ296YS1uZ28tZGFyaycsXG4gICAgICAgIGxhYmVsOiAnTmdvIERhcmsnXG4gICAgfSk7XG5cbiAgICB3cC5ibG9ja3MucmVnaXN0ZXJCbG9ja1N0eWxlKCdjb3JlL2J1dHRvbicsIHtcbiAgICAgICAgbmFtZTogJ2J0bi1nb3phLXdhdGVyLWNoYXJpdHknLFxuICAgICAgICBsYWJlbDogJ1dhdGVyIENoYXJpdHknXG4gICAgfSk7XG5cbiAgICB3cC5ibG9ja3MucmVnaXN0ZXJCbG9ja1N0eWxlKCdjb3JlL2J1dHRvbicsIHtcbiAgICAgICAgbmFtZTogJ2J0bi1nb3phLWNoYXJpdHktb3JnYW5pemF0aW9uJyxcbiAgICAgICAgbGFiZWw6ICdDaGFyaXR5IE9yZ2FuaXphdGlvbidcbiAgICB9KTtcbn0pO1xuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vc3JjL2Jsb2Nrcy9nbG9iYWwtc3R5bGVzL2NvcmUtYnV0dG9uL2luZGV4LmpzXG4vLyBtb2R1bGUgaWQgPSA0XG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///4\n");

/***/ }),
/* 5 */
/*!*********************************************************!*\
  !*** ./src/blocks/global-styles/core-button/style.scss ***!
  \*********************************************************/
/*! dynamic exports provided */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9ja3MvZ2xvYmFsLXN0eWxlcy9jb3JlLWJ1dHRvbi9zdHlsZS5zY3NzPzBiYzIiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gcmVtb3ZlZCBieSBleHRyYWN0LXRleHQtd2VicGFjay1wbHVnaW5cblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL3NyYy9ibG9ja3MvZ2xvYmFsLXN0eWxlcy9jb3JlLWJ1dHRvbi9zdHlsZS5zY3NzXG4vLyBtb2R1bGUgaWQgPSA1XG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUEiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///5\n");

/***/ }),
/* 6 */
/*!**********************************************************!*\
  !*** ./src/blocks/global-styles/core-button/editor.scss ***!
  \**********************************************************/
/*! dynamic exports provided */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNi5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9ja3MvZ2xvYmFsLXN0eWxlcy9jb3JlLWJ1dHRvbi9lZGl0b3Iuc2Nzcz84ZDk2Il0sInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luXG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9zcmMvYmxvY2tzL2dsb2JhbC1zdHlsZXMvY29yZS1idXR0b24vZWRpdG9yLnNjc3Ncbi8vIG1vZHVsZSBpZCA9IDZcbi8vIG1vZHVsZSBjaHVua3MgPSAwIl0sIm1hcHBpbmdzIjoiQUFBQSIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///6\n");

/***/ })
/******/ ]);