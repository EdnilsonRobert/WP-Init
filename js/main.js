(function($) {
    /**
    * COMPORTAMENTO DO HEADER --------------------------------------------------
    */
    $(window).on('scroll', function() {
        var win_top = $(window).scrollTop();
        ( win_top > 200 ) ? $('.masthead').addClass('reduced') : $('.masthead').removeClass('reduced');
    });

    /**
    * COMPORTAMENTO DO MENU RESPONSIVO -----------------------------------------
    */
    $('.toggle-menu').on('click', function() {
        $(this).toggleClass('button-active');
        $('.main-navigation').toggleClass('visible-menu');
    });

    /**
    * FORM VALIDATION ----------------------------------------------------------
    */
    $('form-contato').validate();

})(jQuery);