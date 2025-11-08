(function ($) {
    "use strict";
    
    /* Sticky header */
    var fixnav = function () {
        var magineheadermenuheight = $("#magine-header-menu").outerHeight();
        if ($("#magine-header").length) {
            var magineheaderheight = $("#magine-header").outerHeight();
            $(window).bind("scroll", function () {
                if ($(this).scrollTop() > magineheaderheight) {
                    $("#magine-header-menu").addClass("stick");
                    $("body").css('padding-top', magineheadermenuheight);
                } else {
                    $("#magine-header-menu").removeClass("stick");
                    $("body").css('padding-top', 0);
                }
            });
        }
    };
    
    /* BACKGROUND IMAGES */
    var MagineBgImages = function () {
        var magine_img = $('#magine-page-title').data('img'); 
        if(magine_img) {
            $('#magine-page-title').css('background-image', 'url("' + magine_img + '")');
        }
        $('#magine-main-wrapper').find('.card-featured-img').each(function () {
            var magine_post_img = $(this).data('img'); 
            if(magine_post_img) {
                $(this).css('background-image', 'url("' + magine_post_img + '")');
            }
        });
    };
    
    /* BS4 Dropdown */
    var bs4dropdown = function () {
        var ww = document.body.clientWidth;
        var bs4menuevent = '';
        var bs4toggle = $('body').find( '.dropdown-menu a.dropdown-toggle' );
        if (ww <= 991) {
            bs4menuevent = 'click';
        } else {
            bs4menuevent = 'mouseover';
        }
        bs4toggle.unbind('click');
        bs4toggle.unbind('mouseover');
        bs4toggle.bind( bs4menuevent, function ( e ) {
        var $el = $( this );
        var $parent = $( this ).offsetParent( ".dropdown-menu" );
        if ( !$( this ).next().hasClass( 'show' ) ) {
            $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
        }
        var $subMenu = $( this ).next( ".dropdown-menu" );
        $subMenu.toggleClass( 'show' );
        
        $( this ).parent( "li" ).toggleClass( 'show' );

        $( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
            $( '.dropdown-menu .show' ).removeClass( "show" );
        } );
        
         if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
             if (magine_script_vars.magine_language == 'default') {
                 $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() } );
             } else {
                 $el.next().css( { "top": $el[0].offsetTop, "right": $parent.outerWidth() } );
             }
        }

        return false;
    } );
    };

    /* GO TO TOP BUTTON */
    $("#magine-gototop").on('click', function (e) {
        e.preventDefault();
        $("html, body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });
    
    /* FULLSCREEN SEARCH */
    $("#magine-open-search").on('click', function (e) {
        e.preventDefault();
        $("#magine-fullscreen-search").fadeIn(200);
    });
    
    $("#magine-close-search").on('click', function (e) {
        e.preventDefault();
        $("#magine-fullscreen-search").fadeOut(200);
    });
    
    /* CONTACT FORM 7 */
    $("body").find("div.wpcf7-response-output").on('click', function () {
        $(this).fadeOut();
    });
    
    /* EVENTS */  
    $(document).ready(function () {
        if (magine_script_vars.magine_sticky_menu == 'enabled') {
            fixnav();
        }  
        bs4dropdown();
        MagineBgImages();
        $('body').find('select').addClass('custom-select');
        $('.magine-masonry-grid').egemenerdMasonry();
    });
    
    $(window).on('resize orientationchange', function () {
        bs4dropdown();
    });
})(jQuery);