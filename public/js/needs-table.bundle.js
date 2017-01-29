webpackJsonp([3],{

/***/ 33:
/***/ function(module, exports, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_axios__);


var table = $('#needs-table'),
    changeStatusButton = $('.change-status');

function initTable() {
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

function initToolTip() {
    $('[data-toggle="tooltip"]').tooltip({container: 'body'});
}

function updateStatus() {
    changeStatusButton.click(function () {
        var button = $(this);
        var data;
        if (button.hasClass('mark-pending')) {
            data = {pending: true}
        } else if (button.hasClass('mark-complete')) {
            data = {complete: true}
        }
        __WEBPACK_IMPORTED_MODULE_0_axios___default.a.post(button.data('route'), data)
            .then(function (response) {
                toastr.success('The need has been updated.');
                loader.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}

function initPopover() {
    $('[data-toggle="popover"]').popover();
}

function init() {
    initTable();
    initToolTip();
    initPopover();
    updateStatus();
}

init();



/***/ }

},[33]);
//# sourceMappingURL=needs-table.bundle.js.map