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
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

// checks for #starts_time id in DOM 
if (Boolean($('#starts_time').length)) {
   // get value in span which is the diff bettween the current time 
   //and when the task was created and sets the starting seconds to it.
   var s = $('#starts_time').attr('value');
   // start timer  
   var timer = window.setInterval(time, 1000);
}

// counts up seconds and makes a time format for #timer span
function time() {
   s++;
   var h = pad(Math.floor(s / 60 / 60 % 60)),
       m = pad(Math.floor(s / 60 % 60)),
       sec = pad(Math.floor(s % 60)),
       timer = h + ":" + m + ":" + sec;
   console.log('test');
   $('#starts_time').html(timer);
}

// adds left 0 padding if number is single digit
function pad(d) {
   return d < 10 ? '0' + d.toString() : d.toString();
}

$('#fader').on("input", function (val) {
   $('#volume').html(val.target.value);
   $('#fader').attr('value', val.target.value);
});

// Autocomplete list for TASK input, list in TasksController
$('#task_name').autocomplete({
   minLength: 0,
   source: autocompleteTasks,
   focus: function focus(event, ui) {
      $("#task_name").val(ui.item.label);
      return false;
   }
});

// Autocomplete list for client input, list in ClientController
$('#clientDrop').autocomplete({
   minLength: 0,
   source: autocompleteClients,
   focus: function focus(event, ui) {
      $("#clientDrop").val(ui.item.value);
      return false;
   },
   select: function select(event, ui) {
      $("#client_id").val(ui.item.id);
   }
});

// Drops down list on focus of Client inbox
$('#clientDrop').on("focus", function (event, ui) {
   event.stopPropagation();
   $(this).trigger(jQuery.Event("keydown"));
   // Since I know keydown opens the menu, might as well fire a keydown event to the element
});

$("input[name=check]").click(function (e) {
   e.preventDefault();
   $(this).trigger("change");
});

$("input[name=check]").change(function () {
   var searchIDs = $("input:checkbox:checked").map(function () {
      return $(this).val();
   }).toArray();
   console.log(searchIDs);
});

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);