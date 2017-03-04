webpackJsonp([1],{

/***/ 39:
/***/ function(module, exports, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_axios__);


var form = $('#volunteer-form'),
    table = $('#volunteers-table'),
    date = $('.datepicker');

function submitForm() {
    form.submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize(),
            route = this.action;
        __WEBPACK_IMPORTED_MODULE_0_axios___default.a.post(route, data)
            .then(function () {
                toastr.success('The form was submitted!');
                document.getElementById('volunteer-form').reset();
                loader.reload();
            })
            .catch(function (error) { return console.log(error); });
    })
}

function initDatePicker() {
    if (!date.length > 0) {
        return false
    }
    date.datepicker();
}

function initTable() {
    if (!table.length > 0) {
        return false;
    }
    table.DataTable({
        autoWidth: false,
        pageLength: 25,
        colReorder: true,
        language: {
            lengthMenu: '_MENU_',
            search: "_INPUT_",
            searchPlaceholder: 'Search for anything in the table...'
        },
        "sDom": 'Rfrtlip'
    });
}

function init() {
    initDatePicker();
    submitForm();
    initTable();
}

init();

/***/ }

},[39]);
//# sourceMappingURL=volunteers.bundle.js.map