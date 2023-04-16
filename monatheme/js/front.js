jQuery(document).ready(function($) {
    $('.mona-bton-show-content').on('click', function (e) {
        $(this).siblings('.mona-content').show();
     });
    // $(document).on('click', '.btn-call-login', function(e) {
    //     e.preventDefault();
    //     $this = $(this);
    //     var mess = $this.attr('mess');
    //     Swal.fire({
    //         title: mona_ajax_url.requiresLogin,
    //         html: `<div class="wrap-button-sm aos-init aos-animate mess-single-course">
    //                     <div class="mess-login-desc">
    //                         <p>` + mess + `</p>
    //                     </div>
    //                     <a href="` + mona_ajax_url.loginURL + `" class="main-btn text-upper">` + mona_ajax_url.loginName + `</a>
    //                 </div>`,
    //         showConfirmButton: false,
    //     });
    // });

    /**
     * Add sroll
     */
    // $('html, body').animate({
    //     scrollTop: $("#advisory_buy").offset().top
    // }, 1000);

    $(document).bind('contextmenu', function(e) {

        return false;

    });

    // $(document).keydown(function (event) {
    //     if (event.keyCode == 123) { // Prevent F12

    //         return false;

    //     } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl + Shift + I

    //         return false;

    //     }else if (event.ctrlKey && (event.keyCode == 67 || event.keyCode == 85 )) { // Prevent Ctrl+C , Ctrl+U

    //         return false;

    //     }


    // });

});