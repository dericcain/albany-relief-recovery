window.loader = {
    /**
     * This method reloads the page. If you need to redirect to another page, add that as a parameter.
     */
    reload(location = false) {
        setTimeout(function () {
            $('#page-loader').fadeIn();
            setTimeout(() => {
                if (location) {
                    window.location.pathname = '/' + location;
                } else {
                    window.location.reload();
                }
            }, 1000)
        }, 1000)
    },

    /**
     * This method will show the loader. If you need custom text, just enter it and it will show.
     */
    on() {
        let $pageLoader = $('#page-loader');
        $pageLoader.fadeIn();
    },

    /**
     * Turns the loader off.
     */
    off() {
        $('#page-loader').fadeOut();
    }
};
