/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/login.js":
/*!*******************************!*\
  !*** ./resources/js/login.js ***!
  \*******************************/
/***/ (() => {

eval("/**\r\n * Variables\r\n */\nvar signupButton = document.getElementById('signup-button'),\n    loginButton = document.getElementById('login-button'),\n    userForms = document.getElementById('user_options-forms');\n/**\r\n* Add event listener to the \"Sign Up\" button\r\n*/\n\nsignupButton.addEventListener('click', function () {\n  userForms.classList.remove('bounceRight');\n  userForms.classList.add('bounceLeft');\n}, false);\n/**\r\n* Add event listener to the \"Login\" button\r\n*/\n\nloginButton.addEventListener('click', function () {\n  userForms.classList.remove('bounceLeft');\n  userForms.classList.add('bounceRight');\n}, false);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJzaWdudXBCdXR0b24iLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwibG9naW5CdXR0b24iLCJ1c2VyRm9ybXMiLCJhZGRFdmVudExpc3RlbmVyIiwiY2xhc3NMaXN0IiwicmVtb3ZlIiwiYWRkIl0sInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9sb2dpbi5qcz81YmNiIl0sInNvdXJjZXNDb250ZW50IjpbIi8qKlxyXG4gKiBWYXJpYWJsZXNcclxuICovXHJcbiBjb25zdCBzaWdudXBCdXR0b24gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnc2lnbnVwLWJ1dHRvbicpLFxyXG4gbG9naW5CdXR0b24gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbG9naW4tYnV0dG9uJyksXHJcbiB1c2VyRm9ybXMgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndXNlcl9vcHRpb25zLWZvcm1zJylcclxuXHJcbi8qKlxyXG4qIEFkZCBldmVudCBsaXN0ZW5lciB0byB0aGUgXCJTaWduIFVwXCIgYnV0dG9uXHJcbiovXHJcbnNpZ251cEJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IHtcclxudXNlckZvcm1zLmNsYXNzTGlzdC5yZW1vdmUoJ2JvdW5jZVJpZ2h0JylcclxudXNlckZvcm1zLmNsYXNzTGlzdC5hZGQoJ2JvdW5jZUxlZnQnKVxyXG59LCBmYWxzZSlcclxuXHJcbi8qKlxyXG4qIEFkZCBldmVudCBsaXN0ZW5lciB0byB0aGUgXCJMb2dpblwiIGJ1dHRvblxyXG4qL1xyXG5sb2dpbkJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IHtcclxudXNlckZvcm1zLmNsYXNzTGlzdC5yZW1vdmUoJ2JvdW5jZUxlZnQnKVxyXG51c2VyRm9ybXMuY2xhc3NMaXN0LmFkZCgnYm91bmNlUmlnaHQnKVxyXG59LCBmYWxzZSkiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNDLElBQU1BLFlBQVksR0FBR0MsUUFBUSxDQUFDQyxjQUFULENBQXdCLGVBQXhCLENBQXJCO0FBQUEsSUFDQUMsV0FBVyxHQUFHRixRQUFRLENBQUNDLGNBQVQsQ0FBd0IsY0FBeEIsQ0FEZDtBQUFBLElBRUFFLFNBQVMsR0FBR0gsUUFBUSxDQUFDQyxjQUFULENBQXdCLG9CQUF4QixDQUZaO0FBSUQ7QUFDQTtBQUNBOztBQUNBRixZQUFZLENBQUNLLGdCQUFiLENBQThCLE9BQTlCLEVBQXVDLFlBQU07RUFDN0NELFNBQVMsQ0FBQ0UsU0FBVixDQUFvQkMsTUFBcEIsQ0FBMkIsYUFBM0I7RUFDQUgsU0FBUyxDQUFDRSxTQUFWLENBQW9CRSxHQUFwQixDQUF3QixZQUF4QjtBQUNDLENBSEQsRUFHRyxLQUhIO0FBS0E7QUFDQTtBQUNBOztBQUNBTCxXQUFXLENBQUNFLGdCQUFaLENBQTZCLE9BQTdCLEVBQXNDLFlBQU07RUFDNUNELFNBQVMsQ0FBQ0UsU0FBVixDQUFvQkMsTUFBcEIsQ0FBMkIsWUFBM0I7RUFDQUgsU0FBUyxDQUFDRSxTQUFWLENBQW9CRSxHQUFwQixDQUF3QixhQUF4QjtBQUNDLENBSEQsRUFHRyxLQUhIIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2xvZ2luLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/login.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/login.js"]();
/******/ 	
/******/ })()
;