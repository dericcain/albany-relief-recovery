window._ = require('lodash');

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

toastr.options = {
    "closeButton": true,
    "positionClass": "toast-bottom-full-width",
};

require('./loader');