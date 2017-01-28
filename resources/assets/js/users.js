let deleteButton = $('.delete-user'),
    form = $('#new-user-form'),
    changeGroup = $('.change-group');

function deleteUser() {
    deleteButton.click(function () {
        let user = $(this).data('id'),
            route = $(this).data('route'),
            row = $(this).closest('tr');
        axios.post(route)
            .then(response => {
                toastr.success('The user was deleted.');
                row.remove();
            })
            .catch(error => {
                console.log(error);
            })
    })
}

function newUser() {
    form.submit(function (event) {
        event.preventDefault();
        let data = $(this).serialize(),
            url = this.action;
        axios.post(url, data)
            .then(response => {
                console.log(response);
                toastr.success('The user has been created.');
                loader.reload();
            })
            .caatch(error => {
                console.log(error);
            })
    })
}

function changeRole() {
    changeGroup.on('change', function () {
        console.log('here');
        let group = $(this).val(),
            id = $(this).data('id'),
            route = $(this).data('route');

        axios.post(route, {
            group: group
        })
            .then(response => {
                toastr.success('The user\'s group has changed');
            })
            .caatch(error => {
                console.log(error);
            })
    })
}

deleteUser();
newUser();
changeRole();