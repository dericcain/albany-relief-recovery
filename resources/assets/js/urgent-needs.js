import axios from "axios";

let form = $('#urgent-needs-form');

function submitNeed() {
    form.submit(function (event) {
        event.preventDefault();
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
    document.getElementById('urgent-needs-form').reset();
}

function init() {
    submitNeed();
}

init();

