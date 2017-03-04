webpackJsonp([3],{

/***/ 37:
/***/ function(module, exports, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_axios__);


var form = $('#urgent-needs-form');

function submitNeed() {
    form.submit(function (event) {
        event.preventDefault();
        __WEBPACK_IMPORTED_MODULE_0_axios___default.a.post(this.action, $(this).serialize())
            .then(function (response) {
                toastr.success('You\'re form was submitted!');
                resetForm();
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}

function resetForm() {
    document.getElementById('urgent-needs-form').reset();
}

function init() {
    submitNeed();
}

init();



/***/ }

},[37]);
//# sourceMappingURL=urgent-needs.bundle.js.map