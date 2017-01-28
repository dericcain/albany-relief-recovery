webpackJsonp([1],{

/***/ 35:
/***/ function(module, exports) {

var deleteButton = $('.delete-user'),
    form = $('#new-user-form'),
    changeGroup = $('.change-group');

function deleteUser() {
    deleteButton.click(function () {
        var user = $(this).data('id'),
            route = $(this).data('route'),
            row = $(this).closest('tr');
        axios.post(route)
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
        axios.post(url, data)
            .then(function (response) {
                console.log(response);
                toastr.success('The user has been created.');
                loader.reload();
            })
            .caatch(function (error) {
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

        axios.post(route, {
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

},[35]);
//# sourceMappingURL=users.bundle.js.map