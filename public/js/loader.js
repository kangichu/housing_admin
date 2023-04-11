(function($) {

    "use strict";

    //Hide Loading Box (Preloader)
    function handlePreloader() {
        if($('.loader-wrap').length){
            $('.loader-wrap').delay(1000).fadeOut(500);
        }
        TweenMax.to($(".loader-wrap .overlay"), 1.2, {
            force3D: true,
            left: "100%",
            ease: Expo.easeInOut,
        });
    }

    /* ==========================================================================
       When document is loading, do
    ========================================================================== */
    
    $(window).on('load', function() {
        handlePreloader();
    });

})(window.jQuery);