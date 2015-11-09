/*=============================================================
 Authour URL: www.designbootstrap.com

 http://www.designbootstrap.com/

 License: MIT

 http://opensource.org/licenses/MIT

 100% Free To use For Personal And Commercial Use.

 IN EXCHANGE JUST TELL PEOPLE ABOUT THIS WEBSITE

 ========================================================  */

$(document).ready(function () {

    /*====================================
     SCROLLING SCRIPTS
     ======================================*/

    $('.scroll-me a').bind('click', function (event) { //just pass scroll-me in design and start scrolling
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1200, 'easeInOutExpo');
        event.preventDefault();
    });


    /*====================================
     SLIDER SCRIPTS
     ======================================*/


    $('#carousel-slider').carousel({
        interval: 8000 //TIME IN MILLI SECONDS
    });


    /*====================================
     POPUP IMAGE SCRIPTS
     ======================================*/
    $('.fancybox-media').fancybox({
        openEffect: 'elastic',
        closeEffect: 'elastic',
        helpers: {
            title: {
                type: 'inside'
            }
        }
    });


    /*====================================
     FILTER FUNCTIONALITY SCRIPTS
     ======================================*/
    $(window).load(function () {
        var $container = $('.grid');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        $('.categories a').click(function () {
            $('.categories .active').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });

    });


    /*====================================
     WRITE YOUR CUSTOM SCRIPTS BELOW
     ======================================*/


    $(".repertoar-div").click(function () {
        $(this).toggleClass("highlight");
    });

    $("div.alert").not(".alert-important").delay(3000).slideUp(600);

    $(".izaberi").click(function () {
        $(".categories").hide();
        var highlight = $(".highlight");
        if (highlight.length > 0) {
            $(".repertoar-div").not(highlight).hide();
            $(highlight).removeClass("highlight").addClass("chosen");
            var $container = $('.grid');
            $container.isotope({
                filter: '.chosen',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

        }
        else {
            alert("You must first choose some songs!");
        }


    });

});
