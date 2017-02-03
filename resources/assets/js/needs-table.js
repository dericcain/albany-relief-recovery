import axios from "axios";

let table = $('#needs-table'),
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

function updateStatus() {
    changeStatusButton.click(function () {
        let button = $(this);
        let data;
        if (button.hasClass('mark-pending')) {
            data = {pending: true}
        } else if (button.hasClass('mark-complete')) {
            data = {complete: true}
        }
        axios.post(button.data('route'), data)
            .then(response => {
                toastr.success('The need has been updated.');
                loader.reload();
            })
            .catch(error => {
                console.log(error);
            });
    });
}

function initPopover() {
    $('[data-toggle="popover"]').popover();
}

function init() {
    initTable();
    initPopover();
    updateStatus();
}

init();

