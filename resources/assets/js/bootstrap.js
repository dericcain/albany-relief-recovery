import axios from "axios";

window._ = require('lodash');

axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

toastr.options = {
    "closeButton": true,
    "positionClass": "toast-bottom-full-width",
    'showMethod': 'slideDown',
    'hideMethod': 'slideUp',
};

require('./loader');