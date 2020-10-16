$(function () {

    // slider
    var swiper = new Swiper('.swiper-slider', {
        effect: "fade",
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    // menu
    $('.header__mid-openNav').on('click', function () {
        $('.section__menu').addClass('active');
        $('.overplay').addClass('active');
    })

    $('.section__menu-cancel, .overplay').on('click', function () {
        $('.section__menu').removeClass('active');
        $('.overplay').removeClass('active');
    })

    // tools
    $('.header__mid-openWishlist').on('click', function () {
        $('.section__tools.wishlist').addClass('active');
        $('.overplay').addClass('active');
    })

    $('.section__tools-cancel, .overplay').on('click', function () {
        $('.section__tools.wishlist').removeClass('active');
        $('.overplay').removeClass('active');
    })

    $('.header__mid-openCart').on('click', function () {
        $('.section__tools.cart').addClass('active');
        $('.overplay').addClass('active');
    })

    $('.section__tools-cancel, .overplay').on('click', function () {
        $('.section__tools.cart').removeClass('active');
        $('.overplay').removeClass('active');
    })

    // caegories
    var swiper = new Swiper(".swiper-categories", {
        slidesPerView: 5,
        spaceBetween: 30,
        speed: 750,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
            },
            478: {
                slidesPerView: 3,
            },
            576: {
                slidesPerView: 4,
            },
            768: {
                slidesPerView: 5,
            },
            1024: {
                slidesPerView: 5,
            },
        },
    });

    // product
    var swiper = new Swiper(".swiper-product", {
        slidesPerView: 5,
        spaceBetween: 30,
        speed: 750,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
            },
            578: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 5,
            },
        },
    });

    // modal
    $('#dataModal').on('shown.bs.modal', function () {
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 0,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs
            }
        });
    });

    // back to top
    $(window).on('scroll load', function () {
        const body = $('html, body').scrollTop();
        if (body > 150) {
            $('.section__backtotop').addClass('animate__animated animate__zoomIn');
            $('.section__backtotop').removeClass('animate__zoomOut');

            // fixed menu
            $('.header__menu').addClass('animate__animated animate__fadeInDown header__fixed');
        } else {
            $('.section__backtotop').addClass('animate__animated animate__zoomOut');
            $('.section__backtotop').removeClass('animate__zoomIn');

            // fixed menu
            $('.header__menu').removeClass('animate__animated animate__fadeInDown header__fixed');
        }
    });

    $('.section__backtotop').on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 1500);
        return false;
    })

    var galleryThumbs = new Swiper('.gallery-thumbs1', {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top1', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs
        }
    });

    // venobox detail
    $('.venobox').venobox({
        numeratio: true,
        border: '20px'
    });

    //   acordion
    $(".section__catalog-accordion a").click(function (e) {
        e.preventDefault();
        var link = $(this);
        var closest_ul = link.closest("ul");
        var parallel_active_links = closest_ul.find(".active")
        var closest_li = link.closest("li");
        var link_status = closest_li.hasClass("active");
        var count = 0;

        closest_ul.find("ul").slideUp(function () {
            if (++count == closest_ul.find("ul").length)
                parallel_active_links.removeClass("active");
        });

        if (!link_status) {
            closest_li.children("ul").slideDown();
            closest_li.addClass("active");
        }
    })

    // qty + -
    $(".section__cart-btn").on("click", function () {
        var oldValue = $(this).parent().find("input").val();
        if ($(this).text() === "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $(this).parent().find("input").val(newVal);
    });

})
