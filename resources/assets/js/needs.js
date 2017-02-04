import axios from "axios";

let form = $('#needs-form');

function submitNeed() {
    form.submit(function (event) {
        event.preventDefault();
        if (!$(this).parsley().isValid()) {
            return false
        }
        axios.post(this.action, $(this).serialize())
            .then(response => {
                toastr.success('You\'re form was submitted!');
                resetForm();
            })
            .catch(error => {
                console.log(error);
            });
    });
}

function resetForm() {
    document.getElementById('needs-form').reset();
}

function init() {
    submitNeed();
}

init();

