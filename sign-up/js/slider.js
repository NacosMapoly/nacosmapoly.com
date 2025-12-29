(function($) {
    'use strict';

    $(document).ready(function () {
        $('.graphics-div').backstretch([
            website_url + "/sign-up/images/slide-images/slider_1.jpg",
            website_url + "/sign-up/images/slide-images/slider_2.jpg",
            website_url + "/sign-up/images/slide-images/slider_3.jpg",
        ], {
            duration: 3000,
            fade: 750
        });
    });

})(jQuery);
