import axios from "axios";

let form = $('#volunteer-form'),
    table = $('#volunteers-table'),
    date = $('.datepicker');

function submitForm() {
    form.submit(function (event) {
        event.preventDefault();
        let data = $(this).serialize(),
            route = this.action;
        axios.post(route, data)
            .then(() => {
                toastr.success('The form was submitted!');
                document.getElementById('volunteer-form').reset();
            })
            .catch(error => console.log(error));
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