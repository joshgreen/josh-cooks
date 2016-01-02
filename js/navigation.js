/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */


(function($) {
    // Inside of this function, $() will work as an alias for jQuery()
    // and other libraries also using $ will not be accessible under this shortcut

  $('#header').prepend('<div id="menu-icon"><span class="first"></span><span class="second"></span><span class="third"></span></div>');

  $("#menu-icon").on("click", function(){
    $("nav").slideToggle();
    $(this).toggleClass("active");
});


var headerView = function () {
    var scroll = $(window).scrollTop();
    if (scroll <= 115) {
        $("body").removeClass("compact");
    } else {
        $("body").addClass("compact");
    }
}
headerView();
$(window).scroll(function () {
    headerView();
});

})(jQuery);
