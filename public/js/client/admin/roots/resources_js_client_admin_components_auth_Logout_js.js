"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_client_admin_components_auth_Logout_js"],{

/***/ "./resources/js/client/admin/components/auth/Logout.js":
/*!*************************************************************!*\
  !*** ./resources/js/client/admin/components/auth/Logout.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react-router-dom */ "./node_modules/react-router/esm/react-router.js");
/* harmony import */ var _common_helpers_Routes__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../common/helpers/Routes */ "./resources/js/client/common/helpers/Routes.js");
/* harmony import */ var _redux_ActionCreators__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../redux/ActionCreators */ "./resources/js/client/admin/redux/ActionCreators.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");







var Logout = function Logout() {
  var dispatch = (0,react_redux__WEBPACK_IMPORTED_MODULE_1__.useDispatch)();
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(function () {
    dispatch((0,_redux_ActionCreators__WEBPACK_IMPORTED_MODULE_3__.removeApiToken)());
  }, []);
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(react_router_dom__WEBPACK_IMPORTED_MODULE_5__.Redirect, {
    to: _common_helpers_Routes__WEBPACK_IMPORTED_MODULE_2__["default"].web.admin.login
  });
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Logout);

/***/ })

}]);