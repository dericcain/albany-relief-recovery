import axios from "axios";

let form = $('#volunteer-form');

function submitForm() {
    form.submit(function (event) {
        event.preventDefault();
        let data = $(this).serialize(),
            route = this.action;
        axios.post(route, data)
            .then(() => {
                toastr.success('The form was submitted!')
            })
            .catch(error => console.log(error));
    })
}

function initDatePicker() {
    $('.datepicker').datepicker();
}

function init() {
    initDatePicker();
    submitForm();
}

init();