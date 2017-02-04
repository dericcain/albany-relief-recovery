require('./bootstrap');

function initToolTip() {
    $('[data-toggle="tooltip"]').tooltip({container: 'body'});
}

function initPopover() {
    $('[data-toggle="popover"]').popover();
}

function init() {
    initToolTip();
    initPopover();
}


init();