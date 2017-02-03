require('./bootstrap');

function initToolTip() {
    $('[data-toggle="tooltip"]').tooltip({container: 'body'});
}

function init() {
    initToolTip();
}

init();