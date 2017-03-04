webpackJsonp([2],{

/***/ 38:
/***/ function(module, exports, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_axios__);


var deleteButton = $('.delete-user'),
    form = $('#new-user-form'),
    changeGroup = $('.change-group');

function deleteUser() {
    deleteButton.click(function () {
        var user = $(this).data('id'),
            route = $(this).data('route'),
            row = $(this).closest('tr');
        __WEBPACK_IMPORTED_MODULE_0_axios___default.a.post(route)
            .then(function (response) {
                toastr.success('The user was deleted.');
                row.remove();
            })
            .catch(function (error) {
                console.log(error);
            })
    })
}

function newUser() {
    form.submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize(),
            url = this.action;
        __WEBPACK_IMPORTED_MODULE_0_axios___default.a.post(url, data)
            .then(function (response) {
                console.log(response);
                toastr.success('The user has been created.');
                loader.reload();
            })
            .catch(function (error) {
                console.log(error);
            })
    })
}

function changeRole() {
    changeGroup.on('change', function () {
        console.log('here');
        var group = $(this).val(),
            id = $(this).data('id'),
            route = $(this).data('route');

        __WEBPACK_IMPORTED_MODULE_0_axios___default.a.post(route, {
            group: group
        })
            .then(function (response) {
                toastr.success('The user\'s group has changed');
            })
            .caatch(function (error) {
                console.log(error);
            })
    })
}

deleteUser();
newUser();
changeRole();

/***/ }

},[38]);
//# sourceMappingURL=users.bundle.js.map